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
        // class instance
        $guideModel = new GuideModel;
        $guide = $guideModel->findAllPaginate('id ASC', 8, 1);
        $count = $guideModel->countPaginate(8);

        // functions static
        $pathRedirect = Functions::pathRedirect();

        // view
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
        // checker guide
        Functions::checkerGuide($guide);

        // class instance
        $guideModel = new GuideModel;
        $guide = $guideModel->findName($guide);

        // functions static
        $pathRedirect = Functions::pathRedirect();

        // view        
        $this->title = 'WildRift Hub | '.ucfirst($guide->name);
        $this->render('guides/guide', ['guide' => $guide, 'pathRedirect' => $pathRedirect]);
    }

    /**
     * route /guides/page/{page}
     * @param $number
     * @return void
     */
    public function page($number = null): void
    {
        // checker int
        Functions::checkerInt($number);

        // class instance
        $guideModel = new GuideModel;
        $guide = $guideModel->findAllPaginate('id ASC', 8, $number);
        $count = $guideModel->countPaginate(8);

        // checker count
        Functions::checkerCount($count);

        // functions static        
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