@extends('master')
@section('content')
<div id="divToPrint">
    <div class="container-xl">
            <div class="card" style="width: 30rem; margin-left: 25%;">
                <div class="card-body">
                  <h5 class="card-title">Employee Details</h5>
                  <img src="{{url('/uploads/users/'. $user->image)}}" style="border-radius:4px" height="200px" width="200px" alt="employee image">
                  <p><b>Employee Name: {{$user->name}}</b></p>
                  <p><b>Employee Email: {{$user->email}}</b></p>
                  <p><b>Employee Address: {{$user->address}}</b></p>
                  <p><b>Employee Number: {{$user->mnumber}}</b></p>
                </div>
              </div>
    </div>
  </div>
  <input class="btn btn-primary" type="button" onClick="PrintDiv('divToPrint');" value="Print">
@endsection
<script language="javascript">
  function PrintDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
  }
</script>