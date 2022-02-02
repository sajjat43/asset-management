@extends('master')
@section('content')


    <div>
        <h1>Fill up this form for create new employee</h1>
        <hr>
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
        <form action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data" >
          @csrf
                <div class="row">
                  <div class="col">
                    <label for="inputEmail4">Name</label>
                    <input type="text" name="name" class="form-control" placeholder=" Employee Name">
                  </div>
                </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
              </div>
              <div class="form-group col-md-6">
                <label for="inputAddress">Address</label>
                <input type="text" name="address" class="form-control" id="inputAddress" >
              </div>
              <div class="form-group col-md-6">
                <label for="inputCategory">Designation</label>
                <input type="text" name="category" class="form-control" id="inputCategory">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" name="city" class="form-control" id="inputCity">
              </div>
              <div class="form-group">
                <label for="inputPassword6">Mobile Number</label>
                <input type="number" name="mnumber" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline">
                <small id="passwordHelpInline" class="">
                </small>
              </div>    
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">employee Image</label>
              <input name="image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
            
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
    </div>
@endsection