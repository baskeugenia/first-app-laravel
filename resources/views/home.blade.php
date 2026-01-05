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