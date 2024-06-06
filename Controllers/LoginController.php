<?php
namespace App\Controllers;

class LoginController extends Controller
{
    /**
     * route login
     * @return void
     */    
    public function index()
    {
        $this->title = 'WildRift Hub | Login';
        $this->render('login/index');
    }
}