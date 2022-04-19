@extends('master')
@section('content') 
  <div class="container">
    <h1>Damage Report</h1>
    <form action="{{route('damage.list.search')}}" method="POST">
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
              <td>{{$item->request->user->name}}</td>
              <td>{{$item->asset->name}}</td>
              <td>{{$item->quantity}}</td>
              <td>{{$item->status}}</td>
            </tr>
            @endforeach
          </tbody>
          </table>
      </div>
    </div>
   </div>
   @endsection




   