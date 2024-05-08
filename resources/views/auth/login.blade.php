<form method="POST" action="/login">
    @csrf

    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus />

        @error('email')
            <strong>{{ $message }}</strong>
        @enderror
    </div>

    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required />

        @error('password')
            <strong>{{ $message }}</strong>
        @enderror
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>