@extends('master')
@section('content')
    <div class="Conatiner">
        <h1>Manage Task</h1>
        <hr>
        <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Create New Task</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{route('create.task')}}" class="btn btn-success">Click here for create new Task</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">View task</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{route('task.view')}}" class="btn btn-success">Click here for view Task</a>
                </div>
              </div>
            </div>
           
          </div>
    </div>
@endsection