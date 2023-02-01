<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFilterRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(ProductFilterRequest $request) {
        $categories = Category::all();
        //$products = Product::all();
        //$productsQuery = Product::query();
          $productsQuery = Product::with('category');
        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }
        /*
        foreach (['hit', 'new', 'recommend'] as $field) {
            if ($request->has($field)) {
                $productsQuery->where($field, 1);
            }
        }
        */
        foreach (['hit', 'new', 'recommend'] as $field) {
            if ($request->has($field)) {
               $productsQuery->$field();
            }
        }

        $products = $productsQuery->paginate(6)->withPath("?".$request->getQueryString());

        return view('shop', compact('categories', 'products'));
    }

    public function category($category){
        $categories = Category::all();
        if ($category == 'all') {
            //$catname1 = (object)array('name' => 'Все');
            $catname = Category::all();
            //$catname = (object) array_merge((array)$catname1, (array)$catname2);
        } else {
            //$catname = DB::table('categories')->where('code', $category)->first();
            $catname = Category::where('code', $category)->first();
        }
        return view('category', compact('categories', 'catname'));
    }

    public function product($id){
        if (empty($id)) $id = 1;
        $product = Product::withTrashed()->where('id', $id)->first();
        return view('product', compact( 'id', 'product'));
    }
}
