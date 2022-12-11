@extends('master')


@section('content')

    <h1>My Task List</h1>

    


    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <!-- <th scope="col">Employee Name</th> -->
            
            <th scope="col">Task</th>
            <th scope="col">date</th>
            <th scope="col">Last Date</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($task as $key=>$data)
            <tr>
                <th scope="row">{{$key+1}}</th>
               
                <td>{{$data->task}}</td>
                <td>{{$data->created_at}}</td>
                <td>{{$data->date}}</td>
                <td>

                @if ($data->status == 'Incomplete')
                     <a href="{{route('my.task.status',$data->id)}}"
                                            class="btn btn-success">Complete</a>
              
               @else
                {{$data->status}}
               
               @endif
                </td>
              
                
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
