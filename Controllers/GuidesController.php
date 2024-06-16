<?php
namespace App\Controllers;

use App\Models\GuideModel;
use App\Core\Functions;

class GuidesController extends Controller
{
    /**
     * route /guides
     * @return void
     */
    public function index(): void
    {
        $guideModel = new GuideModel;

        $guide = $guideModel->findAllPaginate('id ASC', 8, 1);
        $count = $guideModel->countPaginate(8);

        $pathRedirect = Functions::pathRedirect();

        $this->title = 'WildRift Hub | Guides';
        $this->render('guides/index', ["guide" => $guide, "count" => $count, "pathRedirect" => $pathRedirect]);
    }

    /**
     * route /guides/guide/{guide}
     * @param string|null $guide
     * @return void
     */
    public function guide(string $guide = null): void
    {
        Functions::checkerGuide($guide);

        $guideModel = new GuideModel;
        $guide = $guideModel->findName($guide);
        $pathRedirect = Functions::pathRedirect();

        $guideName = strtolower($guide->name);

        $this->title = 'WildRift Hub | Guides | '.ucfirst($guideName);
        $this->render('guides/guide', ['guide' => $guide, 'pathRedirect' => $pathRedirect]);
    }

    /**
     * route /guides/page/{page}
     * @param $number
     * @return void
     */
    public function page($number = null): void
    {
        Functions::checkerInt($number);

        $guideModel = new GuideModel;

        $guide = $guideModel->findAllPaginate('id ASC', 8, $number);
        $count = $guideModel->countPaginate(8);

        Functions::checkerCount($count);
        $pathRedirect = Functions::pathRedirect();

        $this->title = 'WildRift Hub | Guides | Page '.$number;
        $this->render("guides/index", ["guide" => $guide, "count" => $count, "pathRedirect" => $pathRedirect]);
    }

    /**
     * route /guides/all
     * @return void
     */
    public function all(): void
    {
        Functions::checkerBasename();

        $guideModel = new GuideModel;
        $guides = $guideModel->findAllOrderBy('id DESC');

        $pathRedirect = Functions::pathRedirect();

        $this->title = 'WildRift Hub | Guides | All';
        $this->render("guides/all", ["guides" => $guides, "pathRedirect" => $pathRedirect]);
    }
}