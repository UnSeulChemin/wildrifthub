<?php
namespace App\Controllers;

use App\Core\Form;

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