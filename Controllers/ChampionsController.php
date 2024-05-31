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
    public function champion($name = null)
    {
        Functions::checkerParamHero($name);

        $championModel = new ChampionModel;

        $champion = $championModel->findName($name);
        $pathRedirect = Functions::pathRedirect();

        $this->title = 'WildRift Hub | '.ucfirst($champion->name);
        $this->render('champions/champion', ["champion" => $champion, "pathRedirect" => $pathRedirect]);
    }
}