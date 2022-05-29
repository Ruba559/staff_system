<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $companies = Company::orderby('id','asc')->get();
        $services = Service::orderby('id','asc')->get();
        return view('welcome',['companies'=>$companies,'services'=>$services]);
    }
    public function terms()
    {
        return view('terms');
    }
    public function privacy()
    {
        return view('privacy');
    }
}
