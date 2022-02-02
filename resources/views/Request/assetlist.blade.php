@extends('master')
@section('content')

<h1>Asset List</h1>
    @if(session()->has('success'))
        <p class="alert alert-success">
            {{session()->get('success')}}
        </p>
    @endif
<form action="{{route('asset.cart')}}" method="GET">
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
  
<table class="table">
  <thead>
    <tr>
      <th> ID</th>
      <th> Name</th>
      <th> Category</th>
      
     
      <th> Details</th>
      
      <th> Asset_image</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($assetlist as $asset)
    <tr>
      <th>{{ $asset->id}}</th>
      <th>{{ $asset->name}}</th>
      <th>{{$asset->Cname}}</th>
      
      
      <th>{{ $asset->details}}</th>
      <td><img src="{{url('/uploads/assets/'. $asset->image)}}" style="border-radius: 4px;" width= "100px;" alt="asset image"> </td>
      
      <td>
        <a href="{{route('view.asset',  $asset->id)}}"class="btn btn-info">View</a>
       
        <a href="{{route('new.cart',$asset->id)}}" class="btn btn-success">add to cart</a> 
     
        </td>
    </tr>
    @endforeach
  </tbody>
  </table>
@endsection