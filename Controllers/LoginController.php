<?php
namespace App\Controllers;

class LoginController extends Controller
{
    public function index()
    {
        $this->title = 'WildRift Hub | Login';
        $this->render('login/index');
    }
}