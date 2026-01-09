
<div style="border: 3px solide black">
    <h2>Register</h2>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input name="name" type="text" required value="{{ old('name') }}">
        <label for="email">Email:</label>
        <input name="email" type="email" required value="{{ old('email') }}">
        <label for="password">Password:</label>
        <input name="password" type="password" required>
        <label for="password_confirmation">Password confirmation:</label>
        <input name="password_confirmation" type="password" required>
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