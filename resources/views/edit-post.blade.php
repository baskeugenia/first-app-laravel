<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit post</h1>
    <form action="/edit-post/{{ $post->id }}" method="post">
    @csrf
    @method("PUT")
        <input name="title" type="text" placeholder="title" value="{{ $post['title'] }}">
        <textarea name="body" placeholder="body content...">{{ $post['body'] }}</textarea>
        <button>Save post</button>
    </form>
</body>
</html>