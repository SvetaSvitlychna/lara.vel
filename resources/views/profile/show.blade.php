<h1>Show Profile Page</h1>

    <p>{{ $profile->created_at }} {{ $profile->username }} {{ $profile->categoryname }}</p>
     <div>
        {{ $profile->content }}
    </div>

    <h2>{{ $post->title }}</h2>

    <p>{{ $post->created_at }} {{ $post->username }} {{ $post->categoryname }}</p>
     <div>
        {{ $post->content }}
    </div>
    <p>Likes: {{ $post->votes }} <a href="{{ route('blog.like', $post->id) }}"><button>Like</button></a></p>
