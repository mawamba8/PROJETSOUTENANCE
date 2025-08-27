<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    public function switch(string $locale): RedirectResponse
    {
        // Stocke la langue choisie en session (utilisée par le middleware SetLocale)
        session(['locale' => $locale]);
        return back();
    }
}
