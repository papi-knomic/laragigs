<?php

namespace App\Models;

class Listing
{
    public static function all() : array
    {
        return [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'NVFNJDGRBJBGJRNGJGNRGJVJFVJF'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'NVFNJDGRBJBGJRNGJGNRGJVJFVJF'
            ],
        ];
    }

    public  static function find($id)
    {
        $listings = self::all();

        foreach ( $listings as $listing ){
            if ( $listing['id'] == $id ){
                return $listing;
            }
        }
    }

}
