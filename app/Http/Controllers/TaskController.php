<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Task;

class TaskController extends Controller
{
    public function taskpage(){
        return view('admin.pages.task.task');
    }


    public function taskCreate(){
        $task=User::where('role','user')->get();
        // dd($task);
        return view('admin.pages.task.taskCreate',compact('task'));
    }
    public function taskStore (Request $request){
        
        Task::create([
            'user_id'=>$request->user_id,
            'task'=> $request->task,
            'date'=> $request->date,

        ]);
        return redirect()->route('task.view');
    }

 public function taskView(){
    $task=Task::all();
    return view('admin.pages.task.view',compact('task'));
 }
 public function taskDelete($id){
    Task::find($id)->delete();
    return redirect()->back()->with('success', 'task has beeen Deleted Successfully');
 }


 public function myTask(){
    $task=Task::where('user_id',auth()->user()->id)->get();
    return view('admin.pages.task.mytask',compact('task'));
 }
public function TaskStatus($id)
{
    $task = Task::find($id);
   $task->update([
        'status' => 'Done',
        'update_date'=>Carbon::now(),
    ]);
    return redirect()->back()->with('success', 'task Status Change');
}
}
