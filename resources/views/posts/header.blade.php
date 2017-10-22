
<div class="header">
    <span>header</span>
    @if(Auth::check())
    <span>now you login:</span>
    <span>{{ Auth::user()->name }}</span>
    <span>{{ Auth::user()->role }}</span>
    @endif
</div>

<style>

.header{
    width: 100%;
    height: 40px;
    text-align: center;
    background: greenyellow;
    font-size:20px;
}


</style>
