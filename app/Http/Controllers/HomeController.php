<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $companies = Company::orderby('id','desc')->get();
        return view('welcome',['companies'=>$companies]);
    }
}
