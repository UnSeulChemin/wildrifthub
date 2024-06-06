<?php
namespace App\Controllers;

use App\Core\Form;

class ProController extends Controller
{
    /**
     * route /pro
     * @return void
     */
    public function index()
    {
        $this->title = 'WildRift Hub | Pro';
        $this->render('pro/index');
    }
}