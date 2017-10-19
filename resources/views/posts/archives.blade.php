<div class="archives">
    <hr>
    <h1>カテゴリ別だよ</h1>
    <ul>
        @foreach ($archives as $stats)
            <li>
                <a href="/posts?month={{$stats['month']}}&year={{$stats['year']}} ">{{ $stats['year'].":".$stats['month'] }}</a>
            </li>
        @endforeach
    </ul>
</div>