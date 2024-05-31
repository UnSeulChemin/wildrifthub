<?php
namespace App\Controllers;

class GuidesController extends Controller
{
    public function index()
    {
        $this->title = 'WildRift Hub | Guides';
        $this->render('guides/index');
    }
}