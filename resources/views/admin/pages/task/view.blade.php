@extends('master')


@section('content')
@if(session()->has('success'))
        <p class="alert alert-success">
          {{session()->get('success')}}
        </p>
    @endif
    
    @if ($errors->any())
    <div class="alert alert-warning" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>
            {{$error}}
          </li>   
        @endforeach
      </ul>
    </div>
    @endif
    <h1>Task List</h1>

    <a class="btn btn-success" href="{{route('create.task')}}">Create Task</a>
    

   <div  id="divToPrint">
    <table class="table">
      <thead>
      <tr>
          <th scope="col">Id</th>
          <th scope="col">Employee Name</th>
          
          <th scope="col">Task</th>
          
          <th scope="col">Submission Date</th>
          <th scope="col">Status</th>
          
          <th scope="col">Action</th>
      </tr>
      </thead>
      <tbody>
      @foreach($task as $key=>$data)
          <tr>
              <th scope="row">{{$key+1}}</th>
              <td>{{$data->user->name}}</td>
              <td>{{$data->task}}</td>
              <td>{{$data->date}}</td>
              <td>{{$data->status}} ({{$data->update_date}})</td>
            
              
              <td>
                  <a class="btn btn-danger" href="{{route('task.delete',$data->id)}}">Delete</a>
              </td>
          </tr>
      @endforeach
      </tbody>
  </table>
   </div>
    <input class="btn btn-primary text-right"  type="button" onClick="PrintDiv('divToPrint');" value="Print">
@endsection


<script language="javascript">
  function PrintDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
  }
</script>