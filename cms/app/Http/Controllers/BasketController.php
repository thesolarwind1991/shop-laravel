<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket() {
        $OrderId = session('orderId');
        $order = null;
        if (!is_null($OrderId)) {
            $order = Order::find($OrderId);
        }
        return view('cart', compact('order'));
    }

    public function basketConfirm(Request $request) {
       $orderId = session('orderId');
       if (is_null($orderId)) {
           return redirect()->route('index');
       }

       $order = Order::find($orderId);
       $email = Auth::check() ? Auth::user()->email : $request->email;

       $success = $order->saveOrder($request->name, $request->phone, $email);

       if ($success) {
           session()->flash('success', 'Ваш заказ принят в обработку!');
       } else {
           session()->flash('warning', 'Ошибка обработки заказа!');
       }

       //dd($request->all());
        return redirect()->route('index');
    }

    public function basketPlace() {
        $OrderId = session('orderId');
        if (is_null($OrderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($OrderId);

        return view('checkout', compact('order'));
    }

    public function basketAdd_($productId) {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }

        if (Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }

        $product = Product::find($productId);

        session()->flash('success', 'Добавлен товар '.$product->name);

        return $order;
    }

    public function basketAddCart($productId)
    {
        $order = $this->basketAdd_($productId);
        return redirect()->route('cart');
    }

    public function basketAdd($productId) {
        $this->basketAdd_($productId);
        return back()->withInput();
    }

    public function basketRemove($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('cart');
        }
        $order = Order::find($orderId);

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->detach($productId);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        $product = Product::find($productId);

        session()->flash('warning', 'Удален товар '.$product->name);



        return redirect()->route('cart');
    }


}
