@extends('layouts.admin')
@section('content')
    
<div style="margin-bottom: 10px;" class="raw">
    <div class="col-lg-12">
        
        <a class="btn btn-info float-right" href="{{route('users.index')}}">Go Back</a>
    </div>
</div>
<div class="card">
    <div class="card-header"> 
        Users list

    </div>
    <div class="card-body">
        {{$users->links()}}
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th width="10px">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Deleted At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                    <tr data-entry-id="{{ $user->id }}">
                        <td></td>
                        <td>{{ $user->id ?? ''}}</td>
                        <td>{{ $user->name ?? ''}}</td>
                        <td>{{ $user->email ?? ''}}</td>
                        <td>{{ $user->deleted_at ?? ''}}</td>
                        <td>
                            <form method='POST' action="{{route('users.restore', $user->id)}}" 
                                style="display:inline;-block;">
                            @csrf
                            <input type='submit' class="btn btn-xs btn-primary" value="Restore">
                            </form>
                            <form method='POST' action="{{route('users.force', $user->id)}}" 
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
         {{$users->links()}}
    </div>
</div>

@endsection







