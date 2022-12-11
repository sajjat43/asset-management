@extends('master')
@section('content')
<h1>Distribution History</h1>
@if(session()->has('success'))
<p class="alert alert-success">
    {{session()->get('success')}}
</p>
@endif
<form action="{{route('transfer.list')}}" method="GET">
{{-- <div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
  <input value="" type="text" placeholder="Search" name="search" class="form-control">
</div>
<div class="col-md-4">
  <button type="submit" class="btn btn-success">Search</button>
</div>
</div> --}}
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
        {{-- <td>{{$request->asset_id}}</td> --}}
        <td>{{$request->quantity}}</td>
        
        <td> {{$request->status}} </td>
        
      </tr>
      @endforeach
    </tbody>
    </table>
</div>


@endsection