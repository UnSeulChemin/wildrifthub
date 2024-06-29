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
        $pathRedirect = Functions::getPathRedirect();

        // view
        $this->title = 'WildRift Hub | Guides';
        $this->render('guides/index', ['guide' => $guide, 'count' => $count, 'pathRedirect' => $pathRedirect]);
    }

    /**
     * route /guides/guide/{guide}
     * @param string|null $guide
     * @return void
     */
    public function guide(string $guide = null): void
    {
        // checker guide name
        Functions::checkerGuideName($guide);

        // class instance
        $guideModel = new GuideModel;
        $guide = $guideModel->findName($guide);

        // functions static
        $pathRedirect = Functions::getPathRedirect();

        // view
        $this->title = 'WildRift Hub | '.ucfirst($guide->name);
        $this->render('guides/guide', ['guide' => $guide, 'pathRedirect' => $pathRedirect]);
    }

    /**
     * route /guides/page/{page}
     * @param $page
     * @return void
     */
    public function page($page = null): void
    {
        // checker path int
        Functions::checkerPathInt($page);

        // class instance
        $guideModel = new GuideModel;
        $guide = $guideModel->findAllPaginate('id ASC', 8, $page);
        $count = $guideModel->countPaginate(8);

        // checker path count
        Functions::checkerPathCount($count);

        // functions static
        $pathRedirect = Functions::getPathRedirect();

        // view
        $this->title = 'WildRift Hub | Guides | Page '.$page;
        $this->render('guides/index', ['guide' => $guide, 'count' => $count, 'pathRedirect' => $pathRedirect]);
    }

    /**
     * route /guides/all
     * @return void
     */
    public function all(): void
    {
        // checker path basename
        Functions::checkerPathBasename();

        // class instance
        $guideModel = new GuideModel;
        $guides = $guideModel->findAllOrderBy('id DESC');

        // functions static
        $pathRedirect = Functions::getPathRedirect();

        // view
        $this->title = 'WildRift Hub | Guides | All';
        $this->render('guides/all', ['guides' => $guides, 'pathRedirect' => $pathRedirect]);
    }
}