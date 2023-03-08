<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Log;

class CartController extends Controller
{
    public function cartList()
    {
        try {
        $Categories = Category::whereNull('parent_id')->get();
        $subCategories = Category::wherenotNull('parent_id')->get()->take(3); ;

        return view('frontend.cart', compact('Categories','subCategories'));
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    }
    }


    /**
     * add item to Cart
     *
     * @return response()
     */
     function addToCart($id,Request $request)
    {
        try {
        $product = Item::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id]))
        {
            $cart[$id]['quantity']++;
        }
        else
        {
            if($product->price != Null)
            {
                $price = $product->price ;
            }
            else
            {
                $price = $product->new_price ;
            }

            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "description" => $product->description,
                "quantity" => 1,
                "price" => $price,
                "image" => $product->main_screen_image
            ];
        }

              session()->put('cart', $cart);
              if($request->ajax())
              {
              $view = view('frontend.cart_side',compact('cart'))->with('cartadd','Your card Number Not Courrect')->render();
              return response()->json(['html'=>$view]);
              }
            } catch (\Exception $ex) {
                $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
                
            }
    }

    /**
     * Update Number Item From Cart
     *
     * @return response()
     */
  function update(Request $request)
    {
        try {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');

            if($request->ajax())
            {
              $view = view('frontend.cart_side',compact('cart'))->render();
              return response()->json(['html'=>$view]);
            }

        }
        } catch (\Exception $ex) {
            $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
            
        }
    }

    /**
     * Remove Item From Cart
     *
     * @return response()
     */
     function remove(Request $request)
    {
        try {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
            if($request->ajax())
            {
              $view = view('frontend.cart_side',compact('cart'))->render();
              return response()->json(['html'=>$view]);
            }
        }
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    }


    }
}
    
