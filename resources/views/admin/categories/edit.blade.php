@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ __('Edit Category') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("categories.update", [$category->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ __('Category Name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ __('Title Field Required') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ __('Description') }}</label>
                <textarea class="form-control" name="description" id="description" required>
                {{ $category->description }}</textarea>
                <span class="help-block">{{ __('Content Field Required') }}</span>
            </div>
            <div class="form-group">
                <label for="published">{{ __('Is Published?') }}</label>
                <input class="form-control" type="checkbox" name="published" id="published" {{ ($category->published == 1)?'checked':'' }}>
                <span class="help-block">{{ __('Status Category') }}</span>
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