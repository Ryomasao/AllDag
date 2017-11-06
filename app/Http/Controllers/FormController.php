<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class FormController extends Controller
{
    public function index(){
        return view('form_sample/index');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'beauty' => 'required',
            'request' => 'required',
        ]);

        if($validator->fails()){
            return redirect('/form_sample')
                            ->withErrors($validator)
                            ->withInput();
        }

        return view('form_sample/index', ['message' => '無事おわったよ！']);

    }
}
