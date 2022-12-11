<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Asset;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Models\RequestDetails;
// use App\Http\Controllers\AdminController;

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
            $request->validate([
                'from' => 'required',
                'to' => 'required|date|after_or_equal:from',
            ]);

            $from = Carbon::parse($request->from);
            $to = Carbon::parse($request->to)->addDay();
    
            $request=RequestDetails::whereBetween('created_at',[$from,$to])->get();
            return view('admin.pages.report',compact('request'));
        }

    //Dashboard----
        public function Dashboard()
        {
            $count['Employee']=User::all()->count();
        $count['Asset']=Asset::all()->count();
        $count['Damage Asset']=RequestDetails::where('status','damage')->count();
        $count['Distributed Asset']=RequestDetails::where('status','approved')->count();

        return view('admin.fixed.Dashboard',compact('count'));
        }
        // Mail Server
        

}



