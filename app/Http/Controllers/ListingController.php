<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listings
    public function  index()
    {
        return view('listings.index', [
            'listings' => $this->getListings()
        ]);
    }

    //show single listings
    public function show( Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //show create form
    public function create()
    {
        return view('listings.create');
    }

    //show edit form

    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    //api for get listings
    public function getListings()
    {
//        dd(request('tag'));
       return Listing::latest()->filter(request(['tag', 'search']))->paginate(6);
    }

    // get single listing
    function getListing( Listing $listing )
    {
        return $listing;
    }

    //store listing
    public  function storeListing(Request $request){
        $formfields = $request->validate([
            'title' => 'required',
            'company' => [ 'required', Rule::unique('listings', 'company') ],
            'location' => 'required',
            'email' => [ 'required', 'email' ],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')){
            $formfields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formfields['user_id'] = auth()->id();

        Listing::create($formfields);

        return redirect('/')->with('message', 'Listing created successfully');
    }

    public  function updateListing(Request $request, Listing $listing){
        //make sure logged in user is owner
        if ( $listing->user_id != auth()->id() ){
            abort(403, 'Unauthorized action');
        }
        $formfields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email' => [ 'required', 'email' ],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')){
            $formfields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formfields);

        return back()->with('message', 'Listing updated successfully');
    }

    //delete listing
    public function deleteListing(Listing $listing){
        //make sure logged in user is owner
        if ( $listing->user_id != auth()->id() ){
            abort(403, 'Unauthorized action');
        }

        $listing->delete();

        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
