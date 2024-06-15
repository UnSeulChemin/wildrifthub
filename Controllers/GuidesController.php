<?php
namespace App\Controllers;

use App\Models\GuideModel;

class GuidesController extends Controller
{
    /**
     * route /guides
     * @return void
     */
    public function index(): void
    {
        $guideModel = new GuideModel;

        $guides = $guideModel->findAll();

        $this->title = 'WildRift Hub | Guides';
        $this->render('guides/index', ["guides" => $guides]);
    }
}