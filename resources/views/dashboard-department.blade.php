<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="d-flex justify-content-left"><h1>Здравствуйте, @php echo Auth::user()->name . ' - ' . Auth::user()->department_name; @endphp</h1></div>
        <div class="d-flex justify-content-left"><h4>Если вы хотите чтобы какая-либо пара прошла у нескольких групп, то, пожалуйста, введите сначала первую полностью заполненую запись,
            без галочки, а последующие записи с нажатой галочкой.
        </h4></div>
        <form method="POST" action="/dashboard-department">
            @csrf

            <div>
                <label for="class"><h4>Предмет</h4></label>
                <select id="class" name="class" class="form-select" aria-label="Default select example">
                    @foreach($classes as $class)
                        @if($class->id_department == $department->id)
                            <option value="{{$class->id}}" required>{{$class->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div>
                <label for="severalGroups"><h4>Пара у нескольких групп</h4></label>
                <select id="severalGroups" name="severalGroups" class="form-select" aria-label="Default select example">
                    <option value="false" required>Нет</option>
                    <option value="true" required>Да</option>
                </select>
            </div>

            <div>
                <label for="teacher"> <h4>Преподаватель</h4></label>
                <select id="teacher" name="teacher" class="form-select" aria-label="Default select example">
                    @foreach($teachers as $teacher)
                        @if($teacher->id_department == $department->id)
                            <option value="{{$teacher->id}}" required>{{$teacher->fullname . " - " . $teacher->type}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div>
                <label for="audience"> <h4>Аудитория </h4></label>
                <select id="audience" name="audience" class="form-select" aria-label="Default select example">
                    @foreach($audiences as $audience)
                        <option value="{{$audience->id}}" required>{{$audience->name . " тип - ". $audience->type ."   Мест - " . $audience->size}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="group"><h4>Группа</h4></label>
                <select id="group" name="group" class="form-select" aria-label="Default select example">
                    @foreach($faculty_department as $fac_dep)
                        @if($fac_dep->id_department == $department->id)
                            @foreach($faculties as $faculty)
                                @if($faculty->id == $fac_dep->id_faculty)
                                    @foreach($specializations as $specialization)
                                        @if($specialization->id_faculty == $faculty->id)
                                            @foreach($groups as $group)
                                                @if($group->id_specialization == $specialization->id)
                                                    <option value="{{$group->id}}" required>{{$group->name}}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </select>
            </div>

            <div>
                <label for="day"><h4>День</h4></label>
                <select id="day" name="day" class="form-select" aria-label="Default select example">
                    <option value="Понедельник" required>Понедельник</option>
                    <option value="Вторник" required>Вторник</option>
                    <option value="Среда" required>Среда</option>
                    <option value="Четверг" required>Четверг</option>
                    <option value="Пятница" required>Пятница</option>
                    <option value="Суббота" required>Суббота</option>
                </select>
            </div>

            <div>
                <label for="time"><h4>Время<h4></label>
                <select id="time" name="time" class="form-select" aria-label="Default select example">
                    <option value="8:15:0" required>8:15</option>
                    <option value="10:0:0" required>10:00</option>
                    <option value="11:45:0" required>11:45</option>
                    <option value="13:45:0" required>13:45</option>
                    <option value="15:30:0" required>15:30</option>
                    <option value="17:10:0" required>17:10</option>
                </select>
            </div>

            <div>
            <button type="submit">Подтвердить</button>
            </div>

        </form>

        <form method="GET" action="/logout" class="d-flex justify-content-end">
            <div class="d-flex flex-row-reverse bd-highlight">
                <div class="badge bg-primary text-wrap" style="width: 5rem;">
                    @csrf
                    <button name="login" class="btn btn-primary" > <h6> Выйти </h6> </button>
                </div>
            </div>
        </form>
    </body>
</html>