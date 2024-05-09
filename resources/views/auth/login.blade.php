<form method="POST" action="/login">
    @csrf

    <div>
        <label for="email">Email</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus />
                </div>
            </div>
        @error('email')
            <strong>{{ $message }}</strong>
        @enderror
    </div>

    <div>
        <label for="password">Пароль</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <input id="password" type="password" name="password" required />
            </div>
        </div>
        @error('password')
            <strong>{{ $message }}</strong>
        @enderror
    </div>

    <div>
        <button type="submit">Войти</button>
    </div>
</form>