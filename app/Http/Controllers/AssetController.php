<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\AssetController;

class AssetController extends Controller
{
    public function CreateAsset()
    {
        $categories=Category::all();
        return view('asset.create_asset',compact('categories'));
    }
    public function Search_AssetList()
    {
        $key=null;
        if(request()->search){
            $key=request()->search;
            $assetlist = Asset::  where('name','LIKE','%'.$key.'%')
           
                ->orWhere('category','LIKE','%'.$key.'%')
                ->get();
            return view('asset.asset_list',compact('assetlist','key'));
        }
        
        $assetlist = asset::with('Category')->get();
        return view ('asset.asset_list', compact('assetlist'));
     
    }
  
    
    public function viewasset($asset_id)
    {
        $assetlist = asset::find($asset_id);
        return view('asset.asset_view',compact('assetlist'));
    }

    
    public function AssetStore(Request $request)
    {
        // dd($request->all());
        //for image upload
        $image_name=null;
        //step 1: check image exist in this request.
        if($request->hasFile('asset_image'))
         // step 2: generate file name
        {
            $image_name=date('Ymdhis').'.'. $request->file('asset_image')->getClientOriginalExtension();
             //step 3 : store into project directory
            $request->file('asset_image')->storeAs('/uploads/assets',$image_name);
        }
        //  dd($request->all());
        $request->validate([
            'id'=>'required',
            'name'=>'required',
            'Cname'=>'required',
            'quantity'=>'required' ,
            'details'=> 'required',
            
        ]);
        Asset::create([
            //'id'=>$request->id,
            'name'=> $request->name,
            'Cname'=> $request->Cname,
            'quantity'=> $request->quantity,
            
            'details'=> $request->details,
            'image'=>$image_name
           
        ]);
        return redirect()->back()->with('success', 'Asset Created Successfully');
    }
   
    public function deleteasset($asset_id)
    {
        Asset::find($asset_id)->delete();
        return redirect()->back()->with('sucecess', 'asset has beeen Deleted Successfully');
    }
  

    public function Asset_update(Request $request,$asset_id)
    {
        $image_name=null;
        //step 1: check image exist in this request.
        if($request->hasFile('asset_image'))
         // step 2: generate file name
        {
            $image_name=date('Ymdhis').'.'. $request->file('asset_image')->getClientOriginalExtension();
             //step 3 : store into project directory
            $request->file('asset_image')->storeAs('/uploads/assets',$image_name);
        }
        //  dd($request->all());
       
        
        Asset::find($asset_id)->update([
            //'id'=>$request->id,
            'name'=> $request->name,
            // 'Cname'=> $request->Cname,
            'quantity'=> $request->quantity,
            
            'details'=> $request->details,
            'image'=>$image_name
           
        ]);
        return redirect()->route('asset.list')->with('success', 'Asset Updated Successfully');
        
    }
    public function asset_edit($asset_id)
        {
    $asset=Asset::find($asset_id);
   return view('asset.asset_update', compact('asset'));
        }

}
