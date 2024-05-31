<?php
namespace App\Controllers;

use App\Models\ChampionModel;
use App\Core\Functions;

class ChampionsController extends Controller
{
    public function index()
    {
        $championModel = new ChampionModel;

        $champions = $championModel->findAll();
        $pathRedirect = Functions::pathRedirect();

        $this->title = 'WildRift Hub | Champions';
        $this->render('champions/index', ["champions" => $champions, "pathRedirect" => $pathRedirect]);
    }

    public function name($name = null)
    {
        Functions::checkerString($name);

        $championModel = new ChampionModel;

        $champion = $championModel->findName($name);
        Functions::checkerFinder($champion);

        $pathRedirect = Functions::pathRedirect();

        $this->title = 'WildRift Hub | '.ucfirst($name);
        $this->render('champions/name', ["champion" => $champion, "pathRedirect" => $pathRedirect]);
    }
}