<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }

    public function about(): View|RedirectResponse
    {
        $viewData = [];
        $viewData['title'] = 'About us - Online Store';
        $viewData['subtitle'] = 'About us';
        $viewData['description'] = 'This page was developed as a class project for the subject Special Topics in Systems Engineering at EAFIT University.';
        $viewData['author'] = 'Developed by: John Montoya';

        return view('home.about')->with('viewData', $viewData);
    }

    public function contact(): View|RedirectResponse
    {
        $viewData = [];
        $viewData['title'] = 'Contact us - Online Store';
        $viewData['subtitle'] = 'Contact us';
        $viewData['email'] = 'fxmail@fakestore.com';
        $viewData['address'] = 'Springfield';
        $viewData['phone'] = '604 5521245';

        return view('home.contact')->with('viewData', $viewData);
    }
}
