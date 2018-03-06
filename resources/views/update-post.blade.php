@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Post</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{route('update_post')}}" method="post">
                            @csrf
                            <p><b>Post owner: </b>{{$post->user->name}}</p>
                            <p><b>Post created: </b>{{$post->created_at}}</p>
                            <p><b>Post updated: </b>{{$post->updated_at}}</p>
                            <input type="hidden" name="id" value="{{$post->id}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" class="form-control" value="{{$post->title}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Text</label>
                                <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="10">{{$post->text}}</textarea>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="is_published" class="form-check-input" id="exampleCheck1" checked>
                                <label class="form-check-label" for="exampleCheck1">Is Published?</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
