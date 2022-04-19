@extends('master')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
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
<img style="border-radius: 4px;" width="500px;" src="{{url('/uploads/assets/'.$asset->image)}}" alt="asset">
    <form action="{{route('asset.update',$asset->id)}}" method="post" enctype="multipart/form-data">
      @method('POST')
      @csrf
      <div class= "form-group">
        <label for="exampleFormControlInput1">asset Code</label>
        <input value="{{$asset->id}}" type="number" name="id" class="form-control" id="exampleFormControlInput1" placeholder="Asset Code">
      </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Asset Name</label>
          <input value="{{$asset->name}}" type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter Asset Name">
        </div>
        {{-- <div class="form-group">
          <label for="exampleFormControlInput1">Asset Category</label>
          <input value="{{$asset->cname}}" type="te" name="Category" class="form-control" id="exampleFormControlInput1" placeholder="Asset category">
        </div> --}}
        <div class="form-group">
          <label for="exampleFormControlSelect1">asset Category</label>
          <select name="Cname" class="form-control" id="exampleFormControlSelect1">
   
            <option value="{{$asset->Cname}}">{{$asset->Cname}}</option>
        
          </select>
        </div>
       
        <div class="form-group">
          <label for="exampleFormControlInput1">Asset Quantity</label>
          <input value="{{$asset->quantity}}" type="number" name="quantity" class="form-control" id="exampleFormControlInput1" placeholder="Asset quantity">
        </div>
        
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Asset Details</label>
          
          <input value="{{$asset->details}}" type="text" name="details" class="form-control" id="exampleFormControlInput1" placeholder="details">
        </div>
        <div class="mb-3">
          <label for="inputImage"><h5> Asset Image</h5></label>
          <input value="{{url('/uploads/assets/'.$asset->image)}}" type="file" name='asset_image' class="form-control-file" id="inputImage">
      </div>
        <button type="submit" class="btn btn-primary">submit</button>
      </form>
    </html>
@endsection