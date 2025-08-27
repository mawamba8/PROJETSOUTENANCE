<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        // Page d’accueil publique
        return view('home');
    }
}




