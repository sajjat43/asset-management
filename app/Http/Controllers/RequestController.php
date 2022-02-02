<?php

namespace App\Http\Controllers;

use App\Models\RequestAsset;
use App\Models\RequestDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RequestController;

class RequestController extends Controller
{
    
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
        $requests = RequestAsset::with('user')->get();
        return view('request.request_list',compact('requests'));
    }
    public function invoice($id)
{
$requests= RequestAsset::with('user','details')->where('id',$id)->first();

return view('request.invoice',compact('requests'));
}
    public function requestCancel($id)
    {
        //find the data
        $request=RequestDetails::find($id);
       $request->update([
           'status'=>'cancel'
           
       ]);

       return redirect()->back();
    }
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
    public function viewRequestAsset($id)
{
$requests= RequestAsset::with('user','details')->where('id',$id)->first();

return view('request.viewRequestAsset',compact('requests'));
}

}