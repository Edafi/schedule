<form method="POST" action="/register">
    @csrf

    <div>
        <label for="name">Ваше ФИО</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus />
                </div>
            </div>    
        @error('name')
            <strong>{{ $message }}</strong>
        @enderror
    </div>

    <div>
        <label for="type">Кто вы?</label>
        <div>
            <select id="type" name="type" class="form-select" aria-label="Default select example">
                <option value="Department" required>Работник факультета/института</option>
                <option value="ScheduleMan" required>Составитель расписания</option>
                <option value="Teacher" required>Преподаватель</option>
            </select>
        </div>
    </div>

    <div>
        <label for="department_name">Название факультета/кафедры, если вы сотрудник дирекции (Обязательно)</label>
        <div>
            <select id="department_name" name="department_name" class="form-select" aria-label="Default select example">
                <option value="NULL" required>Выбрать</option>
                @foreach($departments as $department)
                    <option value="{{$department->name}}" required>{{$department->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div>
        <label for="email">Email</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required />
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
        <label for="password-confirm">Потвердите пароль</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <input id="password-confirm" type="password" name="password_confirmation" required />
                </div>
            </div>    
    </div>

    <div>
        <button type="submit">Зарегистрироваться</button>
    </div>
</form>