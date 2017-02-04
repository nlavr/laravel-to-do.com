@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-body">
                        <div class="flex-center position-ref full-height">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <h1>We are happy to see you again!</h1>
                                        <div class="panel panel-default">

                                            <div class="panel-body">

                                                <h2>TOP 5 users</h2>
                                                <table class="table users-top">
                                                    <thead>
                                                        <tr>
                                                            <th>Nr.</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Tasks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($users as $key =>  $user)
                                                        <tr >
                                                            <td align="center" >{{$key+1}}</td>
                                                            <td>{{$user->name}}</td>
                                                            <td>{{$user->email}}</td>
                                                            <td align="center" >{{$user->tasksCount}}</td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td colspan="4" align="center">No users here yet!</td>
                                                        </tr>
                                                        @endforelse

                                                    </tbody>
                                                </table>
                                            </div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection