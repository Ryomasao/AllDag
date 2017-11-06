<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ViewComposer</title>
  </head>
  <body>
    <h1>Hello</h1>
    <h1>{{$view_message}}</h1>
    <ul>
        @foreach($data as $item)
            <li>
                <span>{{ $item['name'] }}:</span>
                <span>{{ $item['color']}} </span>
            </li>
        @endforeach
    </ul

  </body>
</html>