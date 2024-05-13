<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <h1> Пожалуйста, залогинтись </h1>
    <form method="GET" action="/logout" class="d-flex justify-content-end">
        <div class="d-flex flex-row-reverse bd-highlight">
            <div class="badge bg-primary text-wrap" style="width: 5rem;">
                @csrf
                <button name="login" class="btn btn-primary" > <h6> На главную </h6> </button>
            </div>
        </div>
    </form>
</html>