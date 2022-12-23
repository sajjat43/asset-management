<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\RequestAsset;
use Illuminate\Http\Request;
use App\Models\RequestDetails;
use Illuminate\Routing\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function asset_cart()
    {
        $assetlist = asset::with('Category')->get();
        return view ('request.assetlist', compact('assetlist'));
       
    }
    // add to cart--------------------------------------------------
    // 
    
    // new cart ---------------------------------------------------------------------------
    public function Cart($id)
    {
        $asset = Asset::find($id);

        $alreadyRequested = RequestDetails::where('asset_id',$id)->first();
     

        // if ($alreadyRequested) {
        //     return redirect()->back()->with('error', 'Already you have this asset');
        // }

        if (!$asset) {
            return redirect()->back()->with('error', 'no asset found');
        }


        $cartExist = session()->get('cart');

        if (!$cartExist) {
            

            $CartData = [
                $id => [
                
                    'asset_id' => $id,
                    'asset_name' => $asset->name,
                    'asset_qty' => 1,
                ]
            ];
            session()->put('cart', $CartData);
            return redirect()->back()->with('success', 'asset add');
        }
        
        if (!isset($cartExist[$id])) {
          
            $cartExist[$id] = [

                'asset_id' => $id,
                'asset_name' => $asset->name,      
                'asset_qty' => 1,

            ];
            session()->put('cart', $cartExist);
            return redirect()->back()->with('success', 'asset add');
        }

        
        $cartExist[$id]['asset_qty'] = $cartExist[$id]['asset_qty'] + 1;

        session()->put('cart', $cartExist);
        return redirect()->back()->with('success', 'asset add');
    }
    public function getCart()

    {
        $carts = session()->get('cart');
        return view('request.cart', compact('carts'));
    }

    //Clear_cart--------
    public function clearcart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'cart cleared successfully');
    }
    

}


