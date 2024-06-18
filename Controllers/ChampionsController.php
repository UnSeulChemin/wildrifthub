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
        // class instance
        $championModel = new ChampionModel;
        $champions = $championModel->findAllOrderBy('name ASC');
        $championsLatest = $championModel->findAllOrderByLimit('id DESC', 2);

        // view
        $this->title = 'WildRift Hub | Champions';
        $this->render('champions/index', ["champions" => $champions, "championsLatest" =>  $championsLatest]);
    }

    /**
     * route /champions/champion/{champion}
     * @param string|null $champion
     * @return void
     */
    public function champion(string $champion = null): void
    {
        // checker champion
        Functions::checkerChampion($champion);

        // class instance
        $championModel = new ChampionModel;
        $champion = $championModel->findName($champion);

        // functions static
        $championDifficulty = Functions::checkerDifficulty($champion->difficulty);
        $sessionPro = Functions::checkerSessionPro();
        $pathRedirect = Functions::pathRedirect();

        // view
        $this->title = 'WildRift Hub | '.ucfirst($champion->name);
        $this->render('champions/champion', ["champion" => $champion, "championDifficulty" => $championDifficulty,
            "sessionPro" => $sessionPro, "pathRedirect" => $pathRedirect]);
    }

    /**
     * route /champions/role/{role}
     * @param string|null $role
     * @return void
     */
    public function role(string $role = null): void
    {
        // checker role
        Functions::checkerRole($role);

        $championModel = new ChampionModel;
        $champion = $championModel->findBy(['role' => $role]);

        $pathRedirect = Functions::pathRedirect();

        $this->title = 'WildRift Hub | '. ucfirst($role);
        $this->render("champions/role", ["champion" => $champion, "pathRedirect" => $pathRedirect]);
    }
}