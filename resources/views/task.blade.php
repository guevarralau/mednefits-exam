@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">View Task <a href="{{route('task.index')}}" class="btn btn-primary btn-sm float-right"> Back to Task List</a></div>
                    <div class="card-body d-flex justify-content-center">
                            <div class="card my-2 mx-4" style="width: 30rem;">
                                <div class="card-body">
                                    <h2 class="card-title">{{$task->name}}</h2>
                                    <h3 class="card-subtitle mb-2 text-muted ml-3"> - Assigned to  {{auth()->user()->name}}</h3>
                                </div>
                            </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
