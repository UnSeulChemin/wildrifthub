<?php
namespace App\Controllers;

class GuidesController extends Controller
{
    /**
     * route /guides
     * @return void
     */
    public function index()
    {
        $this->title = 'WildRift Hub | Guides';
        $this->render('guides/index');
    }
}