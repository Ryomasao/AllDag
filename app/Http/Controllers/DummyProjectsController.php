<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DummyProject;

class DummyProjectsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return ['message' => 'Project Created!'];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           // error_log(request('name') .":".request('description'));

           $this->validate(request(),[
                'name' => 'required',
                'description' => 'required'
           ]);


        DummyProject::forceCreate([
            'name' => request('name'),
            'description' => request('description')
        ]);

    }

}
