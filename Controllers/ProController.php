<?php
namespace App\Controllers;

class ProController extends Controller
{
    public function index()
    {
        $this->title = 'WildRift Hub | Pro';
        $this->render('pro/index');
    }
}