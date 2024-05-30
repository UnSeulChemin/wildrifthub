<?php
namespace App\Controllers;

class ChampionsController extends Controller
{
    public function index()
    {
        $this->title = 'WildRift Hub | Champions';
        $this->render('champions/index');
    }
}