  
@extends('layouts.app')

@section('page')
    @include('layouts.partials.blog._nav')

    <!-- Narrower side column -->
    <div class="w-full flex-grow flex mb-4">
            @yield('content')
            @include('layouts.partials.blog._sidebar')
    </div>

    @include('layouts.partials.blog._footer')
   
@endsection
   
