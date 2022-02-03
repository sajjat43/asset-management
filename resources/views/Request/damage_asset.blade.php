@extends('master')
@section('content')
<h1>Damage List</h1>
@if(session()->has('success'))
<p class="alert alert-success">
    {{session()->get('success')}}
</p>
@endif
<form action="{{route('damage.list')}} " method="GET">
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
        <th scope="col">Asset Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Status</th>
      
      </tr>
    </thead>
    <tbody>
      @foreach($requests as $key=>$request)
      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$request->request->user->name}}</td>
        <td>{{$request->asset->name}}</td>
        <td>{{$request->quantity}}</td>
        
        <td> {{$request->status}} </td>
        
      </tr>
      @endforeach
    </tbody>
    </table>
</div>


@endsection