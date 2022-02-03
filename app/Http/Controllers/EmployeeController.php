<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use App\Models\RequestDetails;
use App\Http\Controllers\EmployeeController;

class EmployeeController extends Controller

{
   

    public function CreateEmployee()
    {
        return view('employee.create_employee');
    }
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
        return redirect()->back()->with('success', 'Employee Created Successfully');
}
        public function viewemployee($employee_id)
        {
            $user= User::find($employee_id);
            return view('employee.employee_view',compact('user'));

        }
        public function deleteemployee($employee_id)
        {
            User::find($employee_id)->delete();
            return redirect()->back()->with('sucecess', 'Employee has beeen Deleted Successfully');
        }
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
} 