@extends('master')
@section('content')
    <div class="Conatiner">
        <h1>Manage Asset</h1>
        <hr>
        <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Create New Asset</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{route('create.asset')}}" class="btn btn-success">Click here for create new asset</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">View asset</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{route('asset.list')}}" class="btn btn-success">Click here for view stock asset</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Create Category for asset</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{route('asset.category')}}" class="btn btn-success">Click here for add category for asset</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">View Category for asset</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{route('category.list')}}" class="btn btn-success">Click here for view category for asset</a>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection