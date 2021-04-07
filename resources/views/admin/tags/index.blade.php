@extends('layouts.admin')
@section('content')
    
<div style="margin-bottom: 10px;" class="raw">
    <div class="col-lg-12">
        <strong>{{$subtitle}}</strong><a class="btn btn-success float-right" href="{{route("tags.create")}}"> Add new</a>
        {{-- <a class="btn btn-danger float-right" href="{{route('tags.trashed')}}"> Trashed Post</a> --}}
    </div>
</div>
<div class="card">
    <div class="card-header"> 
        tag list

    </div>
    <div class="card-body">
        {{$tags->links()}}
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        
                        <th width=10>#</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                    <tr data-entry-id="{{ $tag->id }}">
                        
                        <td>{{ $tag->id ?? ''}}</td>
                        <td>{{ $tag->name ?? ''}}</td>
                        <td>{{ $tag->created_at ?? ''}}</td>
                        <td>
                            <a class=" btn btn-xs btn-primary" href="{{route('tags.show', $tag->id)}}">View</a>
                            <a class=" btn btn-xs btn-info" href="{{route('tags.edit', $tag->id)}}">Edit</a>
                            <form method='POST' action="{{route('tags.destroy', $tag->id)}}" 
                                style="display:inline;-block;" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                          
                            <input type='submit' class="btn btn-xs btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        
            </table>
        </div>
        {{$tags->links()}}
    </div>
</div>

@endsection