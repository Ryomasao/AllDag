<?php

namespace App\Http\Composers;

use Illuminate\View\View;

class HelloComposer{

    public function compose(View $view)
    {
        $view->with('view_message', 'this is viewcomposer class message and viewname = '.$view->getName());
    }
}