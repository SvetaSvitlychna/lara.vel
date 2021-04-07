@extends('layouts.admin')
@section('content')
    
<div style="margin-bottom: 10px;" class="raw">
    <div class="col-lg-12">
        <strong>{{$subtitle}}</strong><a class="btn btn-success float-right" href="{{route("categories.create")}}"> Add new</a>
        <a class="btn btn-danger float-right" href="{{route('categories.trashed')}}"> Trashed Post</a>
    </div>
</div>
<div class="card">
    <div class="card-header"> 
        Category list

    </div>
    <div class="card-body">
        {{$categories->links()}}
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th width=10>#</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr data-entry-id="{{ $category->id }}">
                        <td></td>
                        <td>{{ $category->id ?? ''}}</td>
                        <td>{{ $category->name ?? ''}}</td>
                        <td>{{ $category->created_at ?? ''}}</td>
                        <td>
                            <a class=" btn btn-xs btn-primary" href="{{route('categories.show', $category->id)}}">View</a>
                            <a class=" btn btn-xs btn-info" href="{{route('categories.edit', $category->id)}}">Edit</a>
                            <form method='POST' action="{{route('categories.destroy', $category->id)}}" 
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
        {{$categories->links()}}
    </div>
</div>

@endsection