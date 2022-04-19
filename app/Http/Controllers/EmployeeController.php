<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Mail\MyTestMail;
use Illuminate\Http\Request;
use App\Models\RequestDetails;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\EmployeeController;

class EmployeeController extends Controller

{
   
    //Create_employee----------
    public function CreateEmployee()
    {
        return view('employee.create_employee');
    }

    //Employee_list-----------
    public function EmployeeList()
    {
        $key=null;
        if(request()->search){
            $key=request()->search;
            $employeelist = User::  where('name','LIKE','%'.$key.'%')
           
                ->orWhere('mnumber','LIKE','%'.$key.'%')
                ->get();
            return view('employee.search_employee_list',compact('employeelist','key'));
        }
        $user = User::all();
        return view ('employee.employee_list', compact('user'));
    }
  //Employee_store---------
    public function userstore(Request $request)
    {

      
        // dd($request->all());
        $request->validate([ 
            'name'=>'required',
            'email'=>'required',
            'password'=> 'required',
            'address'=>'required',
            'category'=>'required',
            'city'=> 'required',
            'mnumber'=>'required',

           
        ]);

         
        $image_name='';
        //step 1: check image exist in this request.
        if($request->hasFile('image'))
         // step 2: generate file name
        {
            $image_name=date('Ymdhis').'.'. $request->file('image')->getClientOriginalExtension();
        
             //step 3 : store into project directory
            $request->file('image')->storeAs('/uploads/users',$image_name);
        }
        // dd($request->all());
        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=>bcrypt( $request->password),
            'address'=>$request->address,
            'category'=> $request->category,
            'city'=> $request->city,
            'mnumber'=> $request->mnumber,
            'image'=>$image_name,
        ]);
        // Mail server
        $details=[
            'title'=>'Mail From Matha Vanga Admin',
            'body'=>'This is testing mail for disturbing you',
            'credntials'=>'Email:'.$request->email.' and Password:'.$request->password
        ];
        Mail::to($request->email)->send(new MyTestMail($details));
        return redirect()->back()->with('success', 'Employee Created Successfully');
}
//For_single_employee_view
        public function viewemployee($employee_id)
        {
            $user= User::find($employee_id);
            return view('employee.employee_view',compact('user'));

        }
//Delete_employee------------
        public function deleteemployee($employee_id)
        {
            User::find($employee_id)->delete();
            return redirect()->back()->with('sucecess', 'Employee has beeen Deleted Successfully');
        }
//Employee_update--------
        public function employee_update(Request $request,$user_id)
        {
            $image_name=null;
            //step 1: check image exist in this request.
            if($request->hasFile('image'))
             // step 2: generate file name
            {
                $image_name=date('Ymdhis').'.'. $request->file('image')->getClientOriginalExtension();
            
                 //step 3 : store into project directory
                $request->file('image')->storeAs('/uploads/users',$image_name);
            }
         
          $a =  User::find($user_id)->update([
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=>bcrypt( $request->password),
                'address'=>$request->address,
                // 'category'=> $request->category,
                'city'=> $request->city,
                'mnumber'=> $request->mnumber,
                'image'=>$image_name,
            ]);

          
            return redirect()->route('employee.list')->with('success', 'Employee updated Successfully');
    }
    public function employee_edit($user_id)
    {
    
$user=User::find($user_id);
return view('employee.employee_update', compact('user'));
    }
//Employee_profile----------
    public function employeeProfile()
        {
            
            $user= User::where('id',auth()->user()->id)->first();
            return view('employee.employeeProfile',compact('user'));

        }
        public function myAsset(Request $request)
    {
     
            $requests=RequestDetails::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        
      
        return view('employee.myAsset',compact('requests'));
    }

    //My_asset_view-----------
    // public function myAsset(Request $request)
    // {
        
    //     // $requests=RequestDetails::where('user_id',auth()->user()->id)->orwhere('status','approved')->orWhere('status','damage')->orderBy('id','desc')->get();
    //     if(auth()->user()->role=='user')
    //     {
    //         $requests=RequestDetails::where('status','approved')->orWhere('status','damage')->orderBy('id','desc')->get();
    //         // dd($request); 
    //     }else{
    //         $requests=RequestDetails::where('status','approved')->orWhere('status','damage')->orderBy('id','desc')
    //         ->where('request_id',auth()->user_id()->id)->get();
    //     }
    //     return view('employee.myAsset',compact('requests'));
    // }
}