<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
//        $forms = Form::all();

        return view('admin.form.index');
    }
}
