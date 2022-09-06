<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Validation\Rule;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title' ,
        'company',
        'location',
        'email',
        'website',
        'logo',
        'tags',
        'description',
        'user_id'
    ];

    public function scopeFilter( $query, array $filters)
    {
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%')
                ->orWhere('location', 'like', '%' . request('search') . '%');
        }
    }

    //relationship to user
    public function user() : BelongsTo
    {
       return $this->belongsTo(User::class, 'user_id');
    }
}
