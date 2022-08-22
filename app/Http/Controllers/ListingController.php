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

        Listing::create($formfields);

        return redirect('/')->with('message', 'Listing created successfully');
    }
}
