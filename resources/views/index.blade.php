<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <form method="GET" action="/login" class="d-flex justify-content-end">
            <div class="d-flex flex-row-reverse bd-highlight">
                <div class="badge bg-primary text-wrap" style="width: 5rem;">
                    @csrf
                    <button name="login" class="btn btn-primary" > <h6> Войти </h6> </button>
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-center"><h1> Расписание </h1></div>

        @foreach($faculties as $faculty)
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{$faculty->name}}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$faculty->name}}" aria-expanded="true" aria-controls="collapse{{$faculty->name}}">
                            {{$faculty->name}}
                        </button>
                    </h2>
                    <div id="collapse{{$faculty->name}}" class="accordion-collapse collapse" aria-labelledby="heading{{$faculty->name}}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @foreach($specializations as $specialization)
                                @if($specialization -> id_faculty == $faculty -> id)
                                    @foreach($groups as $group)
                                        @if($group -> id_specialization == $specialization -> id)
                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="heading{{$group->name}}">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$group->name}}" aria-expanded="true" aria-controls="collapse{{$group->name}}">
                                                            {{$group->name}}
                                                        </button>
                                                    </h2>
                                                    <div id="collapse{{$group->name}}" class="accordion-collapse collapse" aria-labelledby="heading{{$group->name}}" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            @foreach($days as $day)
                                                                <div class="accordion" id="accordionExample">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="heading{{$day}}">
                                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$day}}{{$group->name}}" aria-expanded="true" aria-controls="collapse{{$day}}{{$group->name}}">
                                                                                {{$day}}
                                                                            </button>
                                                                        </h2>
                                                                        <div id="collapse{{$day}}{{$group->name}}" class="accordion-collapse collapse " aria-labelledby="heading{{$day}}{{$group->name}}" data-bs-parent="#accordionExample">
                                                                            <div class="accordion-body">
                                                                                @foreach($group_schedule as $group_sched)
                                                                                    @if($group_sched -> id_group == $group -> id)
                                                                                        @foreach($schedule as $sched)
                                                                                            @if($group_sched -> id_schedule == $sched -> id && $sched -> added == true && $sched -> day == $day)
                                                                                                @foreach($classes as $class)
                                                                                                    @if($sched -> id_class == $class -> id)
                                                                                                        <h4>{{$class -> name}}</h4>
                                                                                                    @endif
                                                                                                @endforeach
                                                                                                @foreach($teachers as $teacher)
                                                                                                    @if($sched -> id_teacher == $teacher -> id)
                                                                                                        <h6>{{$teacher -> fullname}}</h6> 
                                                                                                        <!--<button type="submit" name="success" value="{{$teacher -> id}}" class="btn btn-success">Потвердить</button>-->
                                                                                                    @endif
                                                                                                @endforeach
                                                                                                @foreach($audiences as $audience)
                                                                                                    @if($sched -> id_audience == $audience -> id)
                                                                                                        <h6>{{$audience -> name}}</h6>
                                                                                                    @endif
                                                                                                @endforeach
                                                                                                <h6>{{$sched -> time}}</h6>
                                                                                                <h6>____________________________________________________</h6>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </body>
</html>