<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>form_sample</title>
  </head>
  <body>
    <form method="post" action="/form_sample"><span>{{csrf_field()}}</span>
      <h1>シンプルなPOST </h1><br>
      <label for="name">好きなメンバー</label>
      <select name="name">
        <option>あやね</option>
        <option>みりん</option>
        <option>りさ</option>
      </select><span>@if($errors->has('name'))</span><span style="color:red;">{{ $errors->first('name') }}</span><span>@endif</span><br>
      <label for="beauty">好きなところ</label>
      <input type="text" name="beauty"><span>@if($errors->has('beauty'))</span><span style="color:red;">{{ $errors->first('beauty') }}</span><span>@endif</span><br>
      <label for="request">やってほしいこと</label>
      <input type="text" name="request"><span>@if($errors->has('request'))</span><span style="color:red;">{{ $errors->first('request') }}</span><span>@endif</span><br>
      <button>PushMe</button>
    </form>
    <div class="result"><span>@isset($message)</span>
      <p>{{ $message }}</p><span>@endisset</span>
    </div>
  </body>
</html>