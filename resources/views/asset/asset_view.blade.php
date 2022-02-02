@extends('master')
@section('content')
    <div class="container-xl">
            <div class="card" style="width: 30rem; margin-left: 25%;">
                <div class="card-body">
                  <h5 class="card-title">Asset Details</h5>
                  <img src="{{url('/uploads/assets/'.$assetlist->image)}}" style="border-radius:4px" height="200px" width="200px" alt="asset image">
                  <p><b>asset Name: {{$assetlist->name}}</b></p>
                  <p><b>asset category: {{$assetlist->Cname}}</b></p>
                  <p><b>asset details: {{$assetlist->details}}</b></p>
                </div>
                @if(auth()->user()->role=='user')
                <a href="{{route('new.cart',$assetlist->id)}}" class="btn btn-success">add to cart</a> 
                @endif
              </div>
    </div>
@endsection