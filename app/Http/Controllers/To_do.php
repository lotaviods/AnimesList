<?php
namespace App\Http\Controllers;

class To_do extends Controller
{
    public function index()
    {
        return view('To_do.Index');
    }
}