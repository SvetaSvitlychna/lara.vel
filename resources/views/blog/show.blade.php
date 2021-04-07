<h1>Blog Page</h1>



    
     <h2><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h2> 
    <p>{{$post->content}}</p>
    <p>Auhor Nic Name: {{$post->user->name}}</p>
    <p>Posted By:<a href="{{route('blog.user', $post->user_id)}}"></a></p>
    <p>Author Full Name: {{$post->user->profile->full_name}}</p>
    <p>Category: {{$post->category->name}}</p>
    <p>Belongs to category:<a href="{{route('blog.category', $post->category_id)}}" >{{ $post->category->name }}</p>
    <p>Created at:{{ $post->created_at }} in category  by {{ $post->user->name }}</a></p>
    <img src="{{asset("storage/covers/blog/". $post->cover)}}">
    <p>Likes:{{$post->votes}} <a href="{{route('blog.like',$post->id)}}"><button>Like</button></a></p>
    <a href="{{route('blog.index')}}"><button>Go back</button></a>
    
