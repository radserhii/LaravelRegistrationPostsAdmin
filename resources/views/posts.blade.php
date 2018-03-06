@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="postlist">
            @foreach($posts as $post)
                <div class="panel">
                    <div class="panel-heading">
                        <div class="text-center">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h3 class="pull-left">{{$post->title}}</h3>
                                </div>
                                <div class="col-sm-3">
                                    <h4 class="pull-right">
                                        <small><em>{{$post->created_at}}</em></small>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        {{$post->text}}
                    </div>
                    <br>
                    <div class="panel-footer">
                        <span class="label label-default"><b>Author:</b> {{$post->user->name}}</span><br>
                        <span class="label label-default"><b>Author email:</b> {{$post->user->email}}</span>
                    </div>
                </div>
                <br>
                @auth
                    @if(Auth::user()->isAdmin == 1)
                        <a href="{{asset('delpost/' . $post->id)}}" class="btn btn-danger">Delete</a>
                        <a href="{{asset('uppost/' . $post->id)}}" class="btn btn-primary">Update</a>
                        <br><br>
                    @endif
                @endauth
            @endforeach
        </div>
    </div>
@endsection
