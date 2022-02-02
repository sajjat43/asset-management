@extends('master')
@section('content')
<div class="container">
    <h1>Report</h1>
    <hr>


    <form action="{{route('admin.report.search')}}" method="POST">
@csrf
        <div class="container" style="display:flex;">
            <div class="form-group col-4">
              <label for="from" style="font-size:20px;"><b>From</label></b>
              <input type="date" class="form-control" id="fromdate" value="{{request()->from}}" name="from" placeholder="From">
            </div>

            <div class="form-group col-4">
                <label for="to" style="font-size:20px;"><b>To</label></b>
                <input type="date" class="form-control" value="{{request()->to}}" id="to" name="to" placeholder="To">
            </div>

            <div class="form-group col-4 mt-4">

                    <button type="submit" class="btn btn-success">Search</button><br><br>
            </div>
        </div>



      </form>

      <div class="container">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              {{-- <th scope="col">User ID</th> --}}
              <th scope="col">Request ID</th>
              <th scope="col">Asset ID</th>
              <th scope="col">User Name</th>
              <th scope="col">Asset Name</th>
              <th scope="col">quantity</th>
              <th scope="col">Status</th>
             
            </tr>
          </thead>
          <tbody>
            @foreach($request as $key=>$item)
          {{-- @dd($request); --}}
            <tr>
              <th scope="row">{{$key+1}}</th>
              {{-- <td>{{$item->user_id}}</td>  --}}
              <td>{{$item->request_id}}</td>
              <td>{{$item->asset_id}}</td>
              <td>{{$item->request->user->name}}</td>
              <td>{{$item->asset->name}}</td>
              <td>{{$item->quantity}}</td>
              <td>{{$item->status}}</td>
             
              {{-- <td>
              
                  <a href="{{route('request.invoice',$item->id)}}" class="btn btn-success">View</a>
              </td> --}}
            </tr>
            @endforeach
          </tbody>
          </table>
      </div>

    @endsection