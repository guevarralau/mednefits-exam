@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (Session::has('status'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {!! session('status') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Tasks <a href="{{route('task.create')}}" class="btn btn-sm btn-success float-right">Add task</a></div>
                    <div class="card-body d-flex justify-content-around flex-wrap">
                        @forelse($tasks as $task)
                            <div class="card my-2 mx-4" style="width: 20rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{$task->name}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Assigned to  {{auth()->user()->name}}</h6>
                                 <div class="d-flex flex-column">
                                     <a href="{{route('task.show',['task' => $task->id])}}" class="btn btn-primary my-1">View Task</a>
                                     <a href="{{route('task.edit',['task' => $task->id])}}" class="btn btn-warning my-1">Edit Task</a>
                                     <form method="POST" action="{{route('task.delete',['task' => $task->id])}}" >
                                         {{ csrf_field() }}
                                         {{ method_field('DELETE') }}
                                         <button type="submit" class="btn btn-danger my-1" style="width:100%">Delete Task</button>
                                     </form>
                                 </div>
                                </div>
                            </div>
                        @empty
                           <div class="d-flex justify-content-center flex-column">
                               <h3>No task Yet add Task here</h3>
                               <a class="btn btn-success btn-lg my-3" href="{{route('task.create')}}"> Create Task</a>
                           </div>
                        @endforelse
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
