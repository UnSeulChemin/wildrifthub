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

        $this->title = 'WildRift Hub | Guides';
        $this->render('guides/index', ["guide" => $guide, "count" => $count]);
    }

    /**
     * route /guides/page/{page}
     * @param $id
     * @return void
     */
    public function page($number = null)
    {
        Functions::checkerInt($number);

        $guideModel = new GuideModel;

        $guide = $guideModel->findAllPaginate('id ASC', 8, $id);
        $count = $guideModel->countPaginate(8);

        Functions::checkerCount($count);
    
        $pathRedirect = Functions::pathRedirect();

        $this->title = 'GoddessSSR | Selling | Page '.$id;
        $this->render("selling/index", ["guide" => $guide, "count" => $count]);
    }
}