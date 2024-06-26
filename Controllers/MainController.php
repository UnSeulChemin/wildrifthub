<?php
namespace App\Controllers;

use App\Models\GuideModel;
use App\Models\ChampionModel;

class MainController extends Controller
{
    /**
     * route ./
     * @return void
     */
    public function index(): void
    {
        // class instance
        $guideModel = new GuideModel;
        $championModel = new ChampionModel;
        $guidesLatest = $guideModel->findAllOrderByLimit('id DESC', 4);
        $championsLatest = $championModel->findAllOrderByLimit('id DESC', 2);

        // view
        $this->render('hub/index', ['guidesLatest' => $guidesLatest, 'championsLatest' =>  $championsLatest]);
    }
}