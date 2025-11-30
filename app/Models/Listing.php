<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Listing extends Model
{
    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime'
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

}
