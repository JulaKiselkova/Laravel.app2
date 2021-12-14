<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showForm(){
        return view('form.showForm');
    }

    public function postForm(Request $request) {
        dd($request->input('name', 345678));
    }
}
