@extends('master')


@section('content')

<h1>Create new category</h1>

@if(session()->has('success'))
<p class="alert alert-success">
    {{session()->get('success')}}
</p>
@endif



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('category.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Category Name </label>
        <input name="Cname" placeholder="Enter Category Name" type="text" class="form-control" id="exampleFormControlInput1" aria-describedby="emailHelp" >

    </div>



    <button type="submit" class="btn btn-success">Submit</button>
</form>

@endsection