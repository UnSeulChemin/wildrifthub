<?php
namespace App\Controllers;

use App\Core\Functions;

abstract class Controller
{
    /* view template */
    protected $template = 'base';

    /* view title */
    protected $title = 'WildRift Hub';

    /**
     * view render
     * @param string $file
     * @param array $data
     * @return void
     */
    public function render(string $file, array $data = []): void
    {
        extract($data);

        ob_start();
        require_once(ROOT.'/Views/'.$file.'.php');
        $title = $this->title;

        // functions static
        $sessionUser = Functions::checkerSessionUser();
        $sessionAdmin = Functions::checkerSessionAdmin();
        $sessionPro = Functions::checkerSessionPro();
        $pathRedirect = Functions::getPathRedirect();

        $content = ob_get_clean();

        require_once(ROOT.'/Views/'.$this->template.'.php');
    }
}