<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Models\RequestDetails;
use App\Http\Controllers\AdminController;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function ManageEmployee()
    {
        return view('admin.pages.manage_employee');
    }
    public function ManageAsset()
    {
        return view('admin.pages.manage_asset');
    }
    public function ManageRequest()
    {
        return view('admin.pages.manage_request');
    }
    // ------report-----

    public function Report(){
        $request=RequestDetails::all();
        return view('admin.pages.report',compact('request'));
    }
    public function ViewReport(Request $request){

        // $RequestAsset=[];
        // if(request()->has('fromdate'))
        // {
        //     $from_date=request()->fromdate;
        //     $to_date=request()->todate;


        // $reports=Report::where('status','1')
        // ->whereDate('created_at','>=',$from_date)
        // ->whereDate('created_at','<=',$to_date)
        // ->get();
        // }


        // return view('admin.pages.report');
            $request->validate([
                'from' => 'required',
                'to' => 'required|date|after_or_equal:from',
            ]);

            $from = Carbon::parse($request->from);
            $to = Carbon::parse($request->to)->addDay();
    
            $request=RequestDetails::whereBetween('created_at',[$from,$to])->get();
       
    
    
            return view('admin.pages.report',compact('request'));
    
        }
    }


