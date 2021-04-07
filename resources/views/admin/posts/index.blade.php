@extends('layouts.admin')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="navbar navbar-expand-lg">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="href="#">{{ $subtitle }} <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form action="{{ route('posts.index') }}" method="GET" role="search" class="form-inline my-2 my-lg-0 mx-3">
                <span class="input-group-btn mr-5 mt-1">
                    <button class="btn btn-info" type="submit" title="Search posts">
                        <span class="fas fa-search"></span>
                    </button>
                </span>
                <input type="text" class="form-control mx-2" name="term" placeholder="Search posts" id="term">
                <a href="{{ route('posts.index') }}" class=" mt-1">
                    <span class="input-group-btn">
                        <button class="btn btn-danger" type="button" title="Refresh page">
                        <span class="fas fa-sync-alt"></span>
                        </button>
                    </span>
                </a>
            </form>
            <ul class="navbar-nav mr-sm-0">
                <li class="nav-item mr-sm-2">
                    <a class="btn btn-success" href="{{ route("posts.create") }}">
                        Add New
                    </a>
                </li>
                <li class="nav-item mr-sm-2">
                    <a class="btn btn-warning" href="{{ route("posts.trashed") }}">
                        Trashed Posts
                    </a>
                </li>
            </ul>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<div class="card">
    <form method="POST" action="{{url('posts/multidelete')}}">
       @csrf
        @method('DELETE')
        <div class="card-header">
            Posts List 
            <button type="submit" name="submit" class="btn btn-xs btn-danger ml-4"><i class="fas fa-trash"></i> Delete selected</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="10"><input type="checkbox" id="checkAll">
                            </th>
                            <th># </th>
                            <th>Image</th>
                            <th>Name </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $key => $post)
                        <tr data-entry-id="{{ $post->id }}">
                            <td>
                                <input name='ids[]' type="checkbox" id="checkItem" value="{{ $post->id ?? '' }}">
                            </td>
                            <td> {{ $post->id ?? '' }}</td>
                            <td><img src="{{asset("storage/covers/blog/thumbnail/{$post->cover}")}}" ></td>
                            <td> {{ $post->title ?? '' }}</td>
                            
                            
                            <td>
                                    <a class="btn btn-xs btn-primary" href="{{ route('posts.show', $post->id) }}">
                                            View
                                    </a>
                                    <a class="btn btn-xs btn-info" href="{{ route('posts.edit', $post->id) }}">
                                            Edit
                                    </a>
                                    <form method='POST' action="{{route('posts.destroy', $post->id)}}" 
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
             
        </div>
    </form>
    {{ $posts->links() }}
</div>
@endsection
@section('scripts')
@parent
<script>
    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
    function readURL(input, id) {
        id = id || '#file-image';
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $(id).attr('src', e.target.result);
            };
    
            reader.readAsDataURL(input.files[0]);
            $('#file-image').removeClass('hidden');
            $('#start').hide();
        }
    }
</script>
@endsection







