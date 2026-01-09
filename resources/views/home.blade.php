<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth
    <p>{{ Auth::user()->name }} Logged in</p>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button>Log out</button>
    </form>



    <div style="border: 3px solide black">
        <h2>Create post</h2>
        <form action="/create-post" method="post">
            @csrf
            <input name="title" type="text" placeholder="title">
            <textarea name="body" placeholder="body content..."></textarea>
            <button>Save post</button>
        </form>
    </div>

    <div style="border: 3px solide black">
        <h2>All posts</h2>
        @foreach ($posts as $post)
        <div>
            <h3>{{ $post['title'] }} by {{ $post->user->name }} at {{ $post->updated_at }}</h3>
            <p>{{ $post['body'] }}</p>
        </div>
        <p><a href='edit-post/{{ $post->id }}'>Edit post</a></p>
        <form action="/delete-post/{{ $post->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        @endforeach
    </div>

    @else
    <header>
        <nav>
            <a href="{{ route('show.login') }}" class="btn">Login</a>
            <a href="{{ route('show.register') }}" class="btn">Register</a>
        </nav>
    </header>
    @endauth
</body>
</html>