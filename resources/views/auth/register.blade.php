<form method="POST" action="/register">
    @csrf

    <div>
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus />

        @error('name')
            <strong>{{ $message }}</strong>
        @enderror
    </div>

    <div>
        <label for="type">Type</label>
        <select id="type" name="type">
            <option value="Department" required>Department</option>
            <option value="ScheduleMan" required>Schedule man</option>
            <option value="Teacher" required>Teacher</option>
        </select>
    </div>

    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required />

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
        <label for="password-confirm">Confirm Password</label>
        <input id="password-confirm" type="password" name="password_confirmation" required />
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>