<?php

namespace App\Http\Controllers;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
    return view('home.index');
    }

    public function about(): View
    {
        $viewData = [];
        $viewData['title'] = 'About us - Online Store';
        $viewData['subtitle'] = 'About us';
        $viewData['description'] = 'This is an about page ...';
        $viewData['author'] = 'Developed by: Julian Valencia';

        return view('home.about') -> with('viewData', $viewData);
    }

    public function contact(): View
    {
        $viewData = [];
        $viewData['title'] = 'Contact us - Online Store';
        $viewData['subtitle'] = 'Contact us';
        $viewData['email'] = 'Email: julval@gmail.com';
        $viewData['address'] = 'Address: 1234 Maplewood Avenue, Springfield, CA 90210, AR';
        $viewData['phoneNumber'] = 'Phone Number: 555-1234';

        return view('home.contact') -> with('viewData', $viewData);
    }
}