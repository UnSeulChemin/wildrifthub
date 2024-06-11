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
    public function index(): void
    {
        $championModel = new ChampionModel;
        $champions = $championModel->findAllOrderBy('name ASC');
        $championsLatest = $championModel->findAllOrderByLimit('id DESC', 2);

        $this->title = 'WildRift Hub | Champions';
        $this->render('champions/index', ["champions" => $champions, "championsLatest" =>  $championsLatest]);
    }

    /**
     * route /champions/champion/{string}
     * @param string|null $champion
     * @return void
     */
    public function champion(string $champion = null): void
    {
        Functions::checkerChampion($champion);

        $championModel = new ChampionModel;
        $champion = $championModel->findName($champion);
        $championDifficulty = Functions::checkerDifficulty($champion->difficulty);
        $sessionPro = Functions::sessionPro();
        $pathRedirect = Functions::pathRedirect();

        $this->title = 'WildRift Hub | '.ucfirst($champion->name);
        $this->render('champions/champion', ["champion" => $champion, "championDifficulty" => $championDifficulty,
            "sessionPro" => $sessionPro, "pathRedirect" => $pathRedirect]);
    }
}