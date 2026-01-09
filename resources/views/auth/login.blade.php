
<div style="border: 3px solide black">
    <h2>Login</h2>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <label for="email">Email:</label>
        <input name="email" type="email" required value="{{ old('email') }}">
        <label for="password">Password:</label>
        <input name="password" type="password" required>
        <button type="submit">Log in</button>

        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li> {{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </form>
</div>