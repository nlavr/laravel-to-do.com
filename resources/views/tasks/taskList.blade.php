@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tasks
                    <a href="{{ url('/tasks/edit') }}" class="btn btn-default btn-sm" ><i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> Title</th>
                                <th>Content</th>
                                <th>Edit/Remove/Republish/Done </th>
                            </tr>
                        </thead>    
                        <tbody>
                            @forelse ($tasks as $task)
                                <tr class="{{ $task->done ? 'success' : '' }}" >
                                    <td><a href="{{ url('/tasks/open/'. $task->id) }}">{{$task->title}}</a></td>
                                    <td>{{$task->content}}</td>
                                    <td align="right">
                                        <a href="{{ url('/tasks/edit/'. $task->id) }}" class="btn btn-default btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="{{ url('/tasks/delete/'. $task->id)}}" class="btn btn-default btn-sm dete-confirm-box"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <a href="{{ url('/tasks/republish/'. $task->id)}}" class="btn btn-default btn-sm"><i class="fa fa-repeat" aria-hidden="true"></i></a>
                                        <a href="{{ url('/tasks/done/'. $task->id)}}" class="btn btn-default btn-sm"><i class="fa fa-check" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" align="center">You don have tasks yet!</td>
                                </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
