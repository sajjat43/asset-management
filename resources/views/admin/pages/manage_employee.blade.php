@extends('master')
@section('content')
    <div class="Conatiner">
        <h1>Manage Employee</h1>
        <hr>
        <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Create New Employee</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{route('create.employee')}}" class="btn btn-success">Click here for create new employee</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">View Employee</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{route('employee.list')}}" class="btn btn-success">Click here for view employee</a>
                </div>
              </div>
            </div>
           
          </div>
    </div>
@endsection