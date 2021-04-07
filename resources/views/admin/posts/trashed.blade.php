@extends('layouts.admin')
@section('content')
    
<div style="margin-bottom: 10px;" class="raw">
    <div class="col-lg-12">
        
        <a class="btn btn-info float-right" href="{{route('posts.index')}}">Go Back</a>
    </div>
</div>
<div class="card">
    <div class="card-header"> 
        Posts list

    </div>
    <div class="card-body">
        {{$posts->links()}}
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th width="10px">#</th>
                        <th>Title</th>
                        <th>Deleted At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $key => $post)
                    <tr data-entry-id="{{ $post->id }}">
                        <td></td>
                        <td>{{ $post->id ?? ''}}</td>
                        <td>{{ $post->title ?? ''}}</td>
                        <td>{{ $post->deleted_at ?? ''}}</td>
                        <td>
                            <form method='POST' action="{{route('posts.restore', $post->id)}}" 
                                style="display:inline;-block;">
                            @csrf
                            <input type='submit' class="btn btn-xs btn-primary" value="Restore">
                            </form>
                            <form method='POST' action="{{route('posts.force', $post->id)}}" 
                                style="display:inline;-block;">
                            @csrf
                            @method('DELETE')
                          
                            <input type='submit' class="btn btn-xs btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Back to list
            </a>
        </div>
         {{$posts->links()}}
    </div>
</div>

@endsection







