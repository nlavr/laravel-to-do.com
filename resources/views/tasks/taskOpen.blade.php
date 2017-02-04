@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Task <a href="{{ url('/tasks/')}}" class="btn btn-default btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></div>

                <div class="panel-body">
                    @if (!empty($task))
                        <table class="table">    
                            <tbody>
                                <tr>
                                    <td>Title</td>
                                    <td>{{$task->title}}</td>
                                </tr>
                                <tr>
                                    <td>Content</td>
                                    <td>{{$task->content}}</td>
                                </tr>
                                <tr>
                                    <td>Created</td>
                                    <td>{{$task->created_at}}</td>
                                </tr>
                                <tr>
                                    <td>Last update</td>
                                    <td>{{$task->updated_at}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" >
                                        <a href="{{ url('/tasks/edit/'. $task->id) }}" class="btn btn-default btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="{{ url('/tasks/delete/'. $task->id)}}" class="btn btn-default btn-sm dete-confirm-box"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        <a href="{{ url('/tasks/republish/'. $task->id)}}" class="btn btn-default btn-sm"><i class="fa fa-repeat" aria-hidden="true"></i></a>
                                        <a href="{{ url('/tasks/done/'. $task->id)}}" class="btn btn-default btn-sm"><i class="fa fa-check" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        I don't have any records!
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
