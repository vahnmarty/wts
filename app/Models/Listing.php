<?php

namespace App\Models;

use App\Enums\ListingType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Listing extends Model
{
    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
        'listing_type' => ListingType::class
    ];

    use HasUuids;

    public function uniqueIds()
    {
        return ['uuid'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeSearch($query, $keyword){
        return $query->where('title', 'LIKE', '%' . $keyword . '%')
            ->orWhere('description', 'LIKE', '%' . $keyword . '%');
    }

    public function getPrice()
    {
        if($this->price_type == 'FIXED'){
            return $this->start_price;
        }

        if($this->price_type == 'RANGE'){
            return $this->min_price . ' - ' . $this->max_price;
        }
    }

    public function getHost()
    {
        if($this->listing_type == ListingType::SELL){
            return 'Seller';
        }

        return 'Buyer';
    }

    public function getAction()
    {
        if($this->listing_type == ListingType::SELL){
            return 'Buy';
        }

        if($this->listing_type == ListingType::BUY){
            return 'Sell';
        }

        return $this->listing_type;
    }

    public function isPrivate()
    {
        return $this->privacy == 'Private';
    }

    public function isPublic()
    {
        return $this->privacy == 'Public';
    }

}
