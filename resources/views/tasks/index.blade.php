<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css">

        <title>My App</title>
    </head>
    <body>
            <div>
                <ul>
                    @foreach ($tasks as $task)
                        <li>
                        <a href="/tasks/{{ $task->id}}"> {{ $task->body }} </a>
                        </li>
                    @endforeach
                </ul> 
            </div>
    </body>
</html>
