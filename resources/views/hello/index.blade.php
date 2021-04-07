<h1>Hello World!</h1>
<h2><?="$title"?></h2>
{{$subtitle}}
<ul>
    <li><a href="/">Home</a></li>
    <li><a href="{{route('about')}}">About</a></li>
    <li><a href="{{route('test')}}">Hello</a></li>
    <li><a href="{{url('cms')}}">Admin cms</a></li>
    <li><a href="{{route('admin.index')}}">Admin index</a></li>
</ul>