@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Task</div>

                <div class="panel-body">
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form method="post" action="/tasks/edit" >
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input value="{{ $task->id ? $task->title : old('title') }}" name="title" type="text" value="" class="form-control" id="title" placeholder="Enter task title">
                        </div>
                        <div class="form-group">
                            <label for="title">Content</label>
                            <textarea  name="content" class="form-control" id="content" placeholder="Enter task content">{{ $task->id ? $task->content : old('content') }}</textarea>
                        </div>
                        <a href="{{url('/tasks')}}" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Task</button>
                        
                        <input type="hidden" name="id" value="{{$task->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
