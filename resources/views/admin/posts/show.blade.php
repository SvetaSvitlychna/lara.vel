@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Show Post
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            
                            
                            <th>Post id</th>
                            <th>Image</th>
                            <th>Title</th>                            
                            <th>Content</th>
                            <th>Voites</th>
                            <th>Category id</th>
                            <th>created at</th>
                        </tr>
                    </thead>
                    <tbody>
                                          
                            <td>{{ $post->id}}</td>
                            <td>{{$post->cover}}</td>
                            <td>{{ $post->title}}</td>
                            <td>{{ $post->content}}</td>
                            <td>{{ $post->votes}}</td>
                            <td>{{ $post->category_id}}</td>
                            <td>{{ $post->created_at}}</td>
                    </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Back to list
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection