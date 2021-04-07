@extends('layouts.blog')
@section('content')

    <!-- Latest Posts Section -->
    <section class="w-3/4 bg-gray-500 mr-1">
                @foreach($posts as $post)
                    <article class="w-full py-2 bg-white py-4 px-8 my-8 shadow-md border-blue-400 border-l-8">
                        <!-- Title & Excerpt -->
                        <div class="flex flex-col py-6">
                            <a href="{{ route('blog.show', $post->slug) }}" class="font-bold text-2xl hover:underline">{{ $post->title }}</a>
                            
                        </div>
                        <!-- Timestamp & Category -->
                        <div class="flex items-center justify-between pt-4 pb-6 text-gray-700 border-b">
                            <span>Category: <a href="{{ route('blog.category', $post->category_id) }}">{{ $post->category->name }}</a></span>
                            <span><a href="{{ route('blog.user', $post->user->id) }}">{{ $post->user->profile->full_name }}</a><span>
                            <span>{{ Carbon\Carbon::parse($post->published_at)->format('M d') }}</span>
                            <span class="text-gray-700">
                               {{ $post->read_time }}
                            </span>
                        </div>
                        <div class="flex flex-col py-6">
                            <img src="{{ asset("storage/covers/blog/thumbnail/{$post->cover}") }}">
                            <a href="{{ route('blog.show', $post->slug) }}" class="text-lg pt-4"> {{ $post->description }}</a>
                        </div>
                        
                        <!-- Read More Button & Reaction Count -->
                        <div class="flex items-center justify-between py-4 text-gray-700">
                            <a href="{{ route('blog.show', $post->slug) }}" class="rounded-full outline py-2 px-3 hover:bg-black hover:text-white border border-gray-700 hover:border-transparent transition duration-100 ease-in">Read More</a>
                            <button class="text-lg hover:text-red-600"><i class="far fa-heart"></i> 187</button>
                        </div>
                    </article>
                @endforeach
                <div class="px-6 py-3">
                    {{-- {{ $posts->links() }} --}}
                </div>
                
    </section>

@endsection

