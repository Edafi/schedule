<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="d-flex justify-content-left"><h1>Здравствуйте, @php echo Auth::user()->name . ' - ' . Auth::user()->department_name; @endphp</h1></div>
        @foreach($teachers as $teacher)
            @if($teacher -> fullname == Auth::user() -> name)
                <h4>{{$teacher -> fullname}}</h4>
                @foreach($days as $day)
                    <h4><code>{{$day}}</code></h4>
                    @foreach($schedule as $sched)
                        @if($sched -> day == $day and $sched -> added == true and $sched -> id_teacher == $teacher -> id)
                            @foreach($classes as $class)
                                @if($class -> id == $sched -> id_class)
                                <h5>{{$class -> name}}</h5>
                                @endif
                            @endforeach
                            @foreach($audiences as $audience)
                                @if($audience -> id == $sched -> id_audience)
                                    <h5>{{$audience -> name}}</h5>
                                @endif
                            @endforeach
                            <h5>{{$sched -> time}}</h5>
                        @endif
                    @endforeach
                @endforeach
                <form method="POST" action="/dashboard-teacher">
                    @csrf
                    <button type="submit" name="download" value="{{$teacher -> id}}" class="btn btn-success">Скачать расписание</button>
                </form>
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
</html