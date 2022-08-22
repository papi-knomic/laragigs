<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Post;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //show all listings
    public function  index()
    {
        return view('listings.index', [
            'listings' => Listing::all()
        ]);
    }

    //show single listings
    public function show( Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function getListings()
    {
       return Listing::all();
    }

    function getListing( Listing $listing )
    {
        return $listing;
    }
}
