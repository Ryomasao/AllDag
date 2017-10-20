    @if(count($errors) > 0)
        <div>
            <h1>error</h1>
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif