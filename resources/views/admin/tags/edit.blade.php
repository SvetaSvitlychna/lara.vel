@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ __('Edit tag') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("tags.update", [$tag->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ __('tag Name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $tag->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ __('Title Field Required') }}</span>
            </div>

            <div class="form-group">
                <label for="published">{{ __('Is Published?') }}</label>
                <input class="form-control" type="checkbox" name="published" id="published" {{ ($tag->published == 1)?'checked':'' }}>
                <span class="help-block">{{ __('Status tag') }}</span>
            </div>
                        <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ __('Update') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection