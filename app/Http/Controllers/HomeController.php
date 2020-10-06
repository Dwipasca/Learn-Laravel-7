<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //invoke digunakan untuk menjadi method yang pertama kali di jalankan fungsinya sama seperti construct
    function __invoke(){
        $name = "Dwi Pasca";
        // return view('home', ['name' => $name]);
        return view('home', compact('name'));
    }
}
