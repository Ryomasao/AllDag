<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecretController extends Controller
{
    public function __construct(){


    }

    public function index()
    {
        return  'this is onky admin';
    }
}
