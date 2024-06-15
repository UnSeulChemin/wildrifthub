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
     * route /guides/page/{page}
     * @param $id
     * @return void
     */
    public function page($id = null)
    {
        Functions::checkerInt($id);

        $guideModel = new GuideModel;

        $guide = $guideModel->findAllPaginate('id ASC', 8, $id);
        $count = $guideModel->countPaginate(8);

        Functions::checkerCount($count);
        $pathRedirect = Functions::pathRedirect();

        $this->title = 'WildRift Hub | Guides | Page '.$id;
        $this->render("guides/index", ["guide" => $guide, "count" => $count, "pathRedirect" => $pathRedirect]);
    }
}