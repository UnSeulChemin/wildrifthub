<?php
namespace App\Controllers;

class MainController extends Controller
{
    /**
     * route ./
     * @return void
     */    
    public function index(): void
    {
        $this->render('main/index');
    }
}