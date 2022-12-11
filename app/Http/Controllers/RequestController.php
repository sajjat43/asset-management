<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\RequestAsset;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RequestDetails;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\RequestController;

class RequestController extends Controller
{
//Checkout--------
    public function checkout()
    {
        // insert order data into order table- user_id, total
        $carts= session()->get('cart');

        if($carts)
        {
            
            $request=RequestAsset::create([
                'user_id'=>auth()->user()->id,
                
                
            ]);

            // insert details into order details table
            foreach ($carts as $cart)
            {
            //    dd($cart);

                RequestDetails::create([
                    'user_id'=>auth()->user()->id,
                    'request_id'=>$request->id,
                    'asset_id'=>$cart['asset_id'],
                    // 'asset_name'=>$cart['asset_name'],
                    'quantity'=>$cart['asset_qty'],
                    
                ]);

            }
            session()->forget('cart');
            return redirect()->back()->with('message','Request Placed Successfully.');
        }
        return redirect()->back()->with('message','No Data found in cart.');


    }
    
//Checkout-----------
    public function requestList(Request $request)
    {
        // $key=null;
        // if(request()->search){
        //     $key=request()->search;
        //     $requests = RequestAsset::  where('name','LIKE','%'.$key.'%')
           
        //         ->orWhere('status','LIKE','%'.$key.'%')
        //         ->get();
        //     return view('request.request_list',compact('requests','key'));
        // }
        // $a=User::all();
        $requests = RequestAsset::with('user')->get();
        // dd($requests);
        return view('request.request_list',compact('requests'));
    }
//invoice--------
    public function invoice($id)
{
$requests= RequestAsset::with('user','details')->where('id',$id)->first();
// dd($requests);

return view('request.invoice',compact('requests'));
}
//Cancel_request----------
    public function requestCancel($id)
    {
        //find the data
        $request=RequestDetails::find($id);
       $request->update([
           'status'=>'cancel'
           
       ]);

       return redirect()->back();
    }
//Approve_request---------------
    public function requestApprove($id){
        $request = RequestDetails::find($id);
        if($request->quantity < $request->asset->quantity){
           $approved = $request->update([
                'status'=>'approved'
            ]);
            if($approved){
                $request->asset->update([
                    'quantity' => $request->asset->quantity - $request->quantity
                ]);  
            }
            return redirect()->back()->with('success','Approved');
        }else{
            return redirect()->back()->with('error','Quantity is not available');  
        }      
    }

//Reject_request-------------------
    public function rejectList(Request $request)
    {
        if(auth()->user()->role=='admin')
        {
            $requests=RequestDetails::where('status','cancel')->orderBy('id','desc')->get();
        }else{
            $requests=RequestDetails::where('status','cancel')->orderBy('id','desc')
            ->where('request_id',auth()->user()->id)->get();
        }
        return view('request.rejectlist',compact('requests'));
    }
//Transfer_list----------
    public function transferList(Request $request)
    {
        if(auth()->user()->role=='admin')
        {
            $requests=RequestDetails::where('status','approved')->orderBy('id','desc')->get();
        }else{
            $requests=RequestDetails::where('status','approved')->orderBy('id','desc')
            ->where('request_id',auth()->user()->id)->get();
        }       
        return view('request.transferhistory',compact('requests'));
    }

//Asset_request_history--------------
    public function assetRequestHistory(Request $request)
    {
        if(auth()->user()->role=='admin')
        {
            $requests=RequestAsset::all();
        }else{
            $requests=RequestAsset::where('user_id',auth()->user()->id)->get();
        }    
        return view('request.assetRequestHistory',compact('requests'));
    }
//View_request_asset--------------
    public function viewRequestAsset($id)
{
$requests= RequestAsset::with('user','details')->where('id',$id)->first();

return view('request.viewRequestAsset',compact('requests'));
}
//Damage_asset----------
public function damage($id){
    $request=RequestDetails::find($id)->update([
        'status'=>'damage'
    ]);
    return redirect()->back();
}
//Damage_list------------
public function damageList(Request $request)

    { 
        if(auth()->user()->role=='admin')
        {
            $requests=RequestDetails::where('status','damage')->orderBy('id','desc')->get();
        
        }
        
        // $request->validate([
        //     'from' => 'required',
        //     'to' => 'required|date|after_or_equal:from',
        // ]);

        // $from = Carbon::parse($reques t->from);
        // $to = Carbon::parse($request->to)->addDay();
        // $request=RequestDetails::whereBetween('created_at',[$from,$to])->get();
        return view('request.damage_asset',compact('requests'));
    }
    
    
}
