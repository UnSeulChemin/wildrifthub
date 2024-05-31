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
     * route /champions/name/{string}
     * @param $name
     * @return void
     */
    public function name($name = null)
    {
        Functions::checkerParamHero($name);

        $championModel = new ChampionModel;

        $champion = $championModel->findName($name);

        $pathRedirect = Functions::pathRedirect();

        $this->title = 'WildRift Hub | '.ucfirst($name);
        $this->render('champions/name', ["champion" => $champion, "pathRedirect" => $pathRedirect]);
    }
}