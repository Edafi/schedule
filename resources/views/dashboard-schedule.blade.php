<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="d-flex justify-content-left"><h1>Здравствуйте, @php echo Auth::user()->name; @endphp</h1></div>        
        
        @foreach($schedule as $schedule_row)
            @if($schedule_row -> added == false)
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{$schedule_row->id}}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$schedule_row->id}}" aria-expanded="true" aria-controls="collapse{{$schedule_row->id}}">
                                Заявка по списку {{$schedule_row->id}}
                            </button>
                        </h2>
                        <div id="collapse{{$schedule_row->id}}" class="accordion-collapse collapse show" aria-labelledby="heading{{$schedule_row->id}}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                @foreach($classes as $class)
                                    @if($class -> id == $schedule_row -> id_class)
                                        <h5><strong><code>{{$class -> name}}</code>. Количество часов - <code>{{$class -> hours}}</code>.</strong></h5>
                                    @endif
                                @endforeach
                                @foreach($teachers as $teacher)
                                    @if($teacher -> id == $schedule_row -> id_teacher)
                                        <h5><strong> Преподаватель - <code>{{$teacher -> fullname}}</code>. Деятельность - <code>{{$teacher -> type}}</code>.</strong></h5>
                                    @endif
                                @endforeach
                                @foreach($audiences as $audience)
                                    @if($audience -> id == $schedule_row -> id_audience)
                                        <h5><strong> Желаемая аудитория - <code>{{$audience -> name}}</code>. Тип аудитории - <code>{{$audience -> type}}</code>. Вместимость - <code>{{$audience -> size}}</code>.</strong></h5>
                                    @endif
                                @endforeach
                                @foreach($group_schedule as $group_sched)
                                    @if($group_sched -> id_schedule == $schedule_row -> id)
                                        @foreach($groups as $group)
                                            @if($group -> id == $group_sched -> id_group)
                                                <h5><strong> Группа - <code>{{$group->name}}</code>.</h5></strong>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                                <h5><strong> День - <code>{{$schedule_row -> day}}</code>.</h5></strong>
                                <h5><strong> Время - <code>{{$schedule_row -> time}}</code>.</h5></strong>
                                <form method="POST" action="/dashboard-schedule">
                                    @csrf
                                    <div>
                                        <label for="audience"><h4>Свободные аудитории</h4></label>
                                        <select id="audience" name="audience" class="form-select" aria-label="Default select example">
                                            @foreach($audiences as $audience)
                                                @php ($freeAudience = true)
                                                @foreach($schedule as $sched)
                                                    @if($sched -> added == true)
                                                        @if($sched -> id_audience == $audience -> id and ($sched -> day == $schedule_row -> day) and $sched -> time == $schedule_row -> time)
                                                            @php ($freeAudience = false)
                                                            @break;
                                                        @endif
                                                    @endif
                                                @endforeach
                                                @if($freeAudience)
                                                    <option value="{{$audience -> id}}" required>{{$audience -> name}}</option>
                                                @endif
                                            @endforeach                
                                        </select>
                                    </div>
                                    <div>
                                        <button type="submit" name="success" value="{{$schedule_row -> id}}" class="btn btn-success">Подтвердить</button>
                                        <button type="submit" name="fail" value="{{$schedule_row -> id}}" class="btn btn-danger">Отклонить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        
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