@extends('master')
@section('content')

<h1>Asset List</h1>
    @if(session()->has('success'))
        <p class="alert alert-success">
            {{session()->get('success')}}
        </p>
    @endif

    <form action="{{route('asset.list')}}" method="GET">
      <div class="input-group rounded mt-3 mb-2">
          <input type="search" class="form-control rounded" name="search" placeholder="Search" aria-label="Search"
                 aria-describedby="search-addon" />
          <span class="input-group-text border-0" id="search-addon">
            <button type="submit" class="btn btn-success">Search</button>
</span>
      </div>
  </form>

  
<table class="table">
  <thead>
    <tr>
      <th> ID</th>
      <th> Name</th>
      <th> Category</th>
      <th> Quantity</th>
   
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
      <th>{{ $asset->quantity}}</th>
      
      <th>{{ $asset->details}}</th>
      <td><img src="{{url('/uploads/assets/'. $asset->image)}}" style="border-radius: 4px;" width= "100px;" alt="asset image"> </td>
      
      <td>
        <a href="{{route('view.asset',  $asset->id)}}"class="btn btn-info">View</a>
        <a href="{{route('asset.edit', $asset->id)}}"class="btn btn-success">Update</a>
        <a href="{{route('delete.asset',  $asset->id)}}"class="btn btn-danger">Delete</a> 
        </td>
    </tr>
    @endforeach
  </tbody>
  </table>
@endsection