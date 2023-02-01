<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Order extends Model
{
    protected $fillable = ['user_id', 'currency_id'];

    use HasFactory;
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function getFullPrice() {
        $sum = 0;
        foreach ($this->products()->withTrashed()->get() as $product) {
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }

    public function scopeActive($query) {
        return $query->where('status', 1);
    }

    public function saveOrder($name, $phone) {
      if ($this->status == 0) {
          $order_ = session('order');
          $this->name = $name;
          $this->phone = $phone;
          $this->status = 1;
          $this->save();
          session()->forget('orderId');
          return true;
      } else return false;
    }

}
