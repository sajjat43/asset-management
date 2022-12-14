@extends('master')
@section('content')
<h1>Request List</h1>
@if(session()->has('success'))
<p class="alert alert-success">
    {{session()->get('success')}}
</p>
@endif
<form action="{{route('request.list')}}" method="GET">

</form>
<style>
  th{
    text-align: left;
  }
</style>
<div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">User Name</th>
        <th scope="col">Request Time</th>
        <th scope="col">Status</th>
       
      </tr>
    </thead>
    <tbody>
      @foreach($requests as $key=>$request)
   
      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$request->user->name}}</td> 
        <td>{{$request->created_at}}</td> 
       
        <td>
        
            <a href="{{route('request.invoice',$request->id)}}" class="btn btn-success">View</a>
        </td>
      </tr>
      @endforeach
    </tbody>
    </table>
</div>


@endsection