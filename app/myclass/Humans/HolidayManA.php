<?php

namespace App\myclass\Humans;

class HolidayManA implements HumanLifeCycleInterface{
    public function wakeup()
    {
        return 'Good Mornig! at 8:00'.PHP_EOL;
    }
    public function shower()
    {
        return 'YEs!yes!Yes! at 8:30'.PHP_EOL;
    }
    public function work()
    {
        return 'zzz....      at 10:00'.PHP_EOL;
    }
    public function goHome()
    {
        return 'hyoooo!!     at 18:00'.PHP_EOL;
    }
}

class HolidayManB implements HumanLifeCycleInterface{
    public function wakeup()
    {
        return 'z.... ...... at 8:00'.PHP_EOL;
    }
    public function shower()
    {
        return 'YEs!yes!Yes! at 8:30'.PHP_EOL;
    }
    public function work()
    {
        return 'zzz....      at 10:00'.PHP_EOL;
    }
    public function goHome()
    {
        return 'oh!!!        at 18:00'.PHP_EOL;
    }
}