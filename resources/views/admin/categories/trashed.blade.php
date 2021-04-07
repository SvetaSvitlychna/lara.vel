@extends('layouts.admin')
@section('content')
    
<div style="margin-bottom: 10px;" class="raw">
    <div class="col-lg-12">
        
        <a class="btn btn-info float-right" href="{{route('categories.index')}}">Go Back</a>
    </div>
</div>
<div class="card">
    <div class="card-header"> 
        Categories list

    </div>
    <div class="card-body">
        {{$categories->links()}}
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
                    @foreach ($categories as $key => $category)
                    <tr data-entry-id="{{ $category->id }}">
                        <td></td>
                        <td>{{ $category->id ?? ''}}</td>
                        <td>{{ $category->name ?? ''}}</td>
                        <td>{{ $category->deleted_at ?? ''}}</td>
                        <td>
                            <form method='POST' action="{{route('categories.restore', $category->id)}}" 
                                style="display:inline;-block;">
                            @csrf
                            <input type='submit' class="btn btn-xs btn-primary" value="Restore">
                            </form>
                            <form method='POST' action="{{route('categories.force', $category->id)}}" 
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
         {{$categories->links()}}
    </div>
</div>

@endsection







