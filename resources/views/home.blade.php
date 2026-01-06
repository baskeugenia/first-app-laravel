<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth
    <p>Logged in</p>
    <form action="/logout" method="post">
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

    <div style="border: 3px solide black">
        <h2>Register</h2>
        <form action="/register" method="post">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="email" type="email" placeholder="email@example.com">
            <input name="password" type="password" type="password">
            <button>Register</button>
        </form>
    </div>


    <div style="border: 3px solide black">
        <h2>Login</h2>
        <form action="/login" method="post">
            @csrf
            <input name="loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password" type="password">
            <button>Log in</button>
        </form>
    </div>

    @endauth
</body>
</html>