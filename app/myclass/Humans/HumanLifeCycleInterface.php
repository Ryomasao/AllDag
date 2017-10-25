<?php

namespace App\myclass\Humans;


interface HumanLifeCycleInterface{
    public function wakeup();
    public function shower();
    public function work();
    public function goHome();
}