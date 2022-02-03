@extends('master')
@section('content')
<h1>My Asset List</h1>
@if(session()->has('success'))
<p class="alert alert-success">
    {{session()->get('success')}}
</p>
@endif
<form action="{{route('myAsset.list')}}" method="GET">
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
        <th scope="col">Asset Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      
      </tr>
    </thead>
    <tbody>
      @foreach($requests as $key=>$request)
      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$request->asset->name}}</td>
        <td>{{$request->quantity}}</td>
        <td> {{$request->status}} </td>
        <td>
            @if($request->status =='damage')
            @else
            <a href="{{route('admin.asset.damage',$request->id)}}"class="btn btn-danger">Damage</a>
            @endif
        </td>
        
      </tr>
      @endforeach
    </tbody>
    </table>
</div>


@endsection