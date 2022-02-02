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

    <form action="{{route('asset.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class= "form-group">
        <label for="exampleFormControlInput1">Asset Code</label>
        <input type="number" name="id" class="form-control" id="exampleFormControlInput1" placeholder="asset Code">
      </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">asset Name</label>
          <input type="name" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter asset Name">
        </div>
        
        <div class="form-group">
          <label for="exampleFormControlSelect1">asset Category</label>
          <select name="Cname" class="form-control" id="exampleFormControlSelect1">
            @foreach ($categories as $category)
            <option value="{{$category->Cname}}">{{$category->Cname}}</option>
         @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">asset Quantity</label>
          <input type="number" name="quantity" class="form-control" id="exampleFormControlInput1" placeholder="asset quantity">
        </div>
      
        <div class="form-group">
          <label for="exampleFormControlTextarea1">asset Details</label>
          <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">asset Image</label>
          <input name="asset_image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
        <button type="submit" class="btn btn-primary">Create New asset</button>
      </form>
    </html>
@endsection