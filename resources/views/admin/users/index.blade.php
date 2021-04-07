@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <strong>{{$subtitle}}</strong><a class="btn btn-success float-right" href="{{ route("users.create") }}">
                Add user
            </a>
            <a class="btn btn-danger float-right" href="{{route('users.trashed')}}"> Trashed User</a>
        </div>
    </div>

<div class="card">
    <div class="card-header">
        User list
    </div>

    <div class="card-body">
        {{$users->links()}}
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        
                        <th>id</th>
                        <th> name </th>
                        <th>email</th>
                        <th>email_verified_at</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                        <tr data-entry-id="{{ $user->id }}">
                            
                            <td>{{ $user->id ?? '' }}</td>
                            <td>{{ $user->name ?? '' }}</td>
                            <td>{{ $user->email ?? '' }}</td>
                            <td>{{ $user->email_verified_at ?? '' }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('users.show', $user->id) }}">view </a>

                                <a class="btn btn-xs btn-info" href="{{ route('users.edit', $user->id) }}">edit</a>

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('are You Sure');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$users->links()}}

    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
</script>
@endsection