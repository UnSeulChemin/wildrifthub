<?php
namespace App\Controllers;

use App\Models\ChampionModel;
use App\Core\Functions;

class ChampionsController extends Controller
{
    /**
     * route /champions
     * @return void
     */
    public function index()
    {
        $championModel = new ChampionModel;

        $champions = $championModel->findAllOrderBy('name ASC');
        $pathRedirect = Functions::pathRedirect();

        $this->title = 'WildRift Hub | Champions';
        $this->render('champions/index', ["champions" => $champions, "pathRedirect" => $pathRedirect]);
    }

    /**
     * route /champions/champion/{string}
     * @param $name
     * @return void
     */
    public function champion($string = null)
    {
        Functions::checkerParamHero($string);

        $championModel = new ChampionModel;

        $champion = $championModel->findName($string);
        $pathRedirect = Functions::pathRedirect();

        $this->title = 'WildRift Hub | '.ucfirst($string);
        $this->render('champions/champion', ["champion" => $champion, "pathRedirect" => $pathRedirect]);
    }
}