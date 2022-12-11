@extends('master')
@section('content')


    <div>
        <!-- <h1>Fill up this form for create new T</h1> -->
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
        <form action="{{route('task.store')}}" method="POST" enctype="multipart/form-data" >
          @csrf
          <div class="form-group">
          <label for="exampleFormControlSelect1">Employee name</label>
          
          <select required   name="user_id" class="form-control" id="exampleFormControlSelect1">
          <option value="">Select Employee</option>
            @foreach ($task as $data)
            <option value="{{$data->id}}">{{$data->name}}</option>
         @endforeach
          </select>
        </div>
         
                <div class="row">
                  <div class="col">
                    <label for="inputEmail4">Task </label>
                    <input required type="text" name="task" class="form-control" placeholder="give task ">
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <label for="inputEmail4">Submission Date </label>
                    
                    <input required type="date" id="date" name="date"  class="form-control"/>
                  </div>
                </div>
         
            
            <button type="submit" class="btn btn-success mt-4">Send</button>
          </form>
    </div>

<script>
  $(function(){
  var dtToday = new Date();
  
  var month = dtToday.getMonth() + 1;
  var day = dtToday.getDate();
  var year = dtToday.getFullYear();
  if(month < 10)
      month = '0' + month.toString();
  if(day < 10)
      day = '0' + day.toString();
  
  var minDate= year + '-' + month + '-' + day;
  
  $('#date').attr('min', minDate);
});
</script>

@endsection