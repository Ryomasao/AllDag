<?php

namespace App\Http\Controllers\DITest;

use App\Http\Controllers\Controller;
use App\myclass\Humans\HumanLifeCycleInterface;




/**
 *実体はMainがnewしてつっこんでくれればいいじゃんというのがDI 
 */
class ScheduleController extends Controller{

    protected $holidayMan;

    public function __construct(HumanLifeCycleInterface $holidayMan)
    {
        $this->holidayMan = $holidayMan;
    }

    public function view()
    {
        echo $this->holidayMan->wakeup();
        echo $this->holidayMan->shower();
        echo $this->holidayMan->work();
        echo $this->holidayMan->goHome();
    }
}
