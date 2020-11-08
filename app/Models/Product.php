<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Swap\Laravel\Facades\Swap;

class Product extends Model
{
    protected $fillable = ['name', 'price'];
    use HasFactory;
    public function buyProductOffer()
    {
        return $this->hasMany(Offer::class, 'buy_product');
    }

    public function offerPorductOffer()
    {
        return $this->hasMany(Offer::class, 'offer_product');
    }
    public function getPriceAttribute($price)
    {
        $currency = request()->header('currency', 'USD');
        if ($currency != 'USD') {

            $rate = Swap::latest('USD/' . $currency);
            $price *= $rate->getValue(); //5*19GP
            return $price;
        }
    }
}
