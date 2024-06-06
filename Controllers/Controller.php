<?php
namespace App\Controllers;

use App\Core\Functions;

abstract class Controller
{
    protected $template = 'base';
    protected $title = 'WildRift Hub';

    /**
     * function render
     * @param string $file
     * @param array $data
     * @return void
     */
    public function render(string $file, array $data = [])
    {
        extract($data);

        ob_start();
        require_once(ROOT.'/Views/'.$file.'.php');
        $title = $this->title;
        $sessionUser = Functions::sessionUser();
        $pathRedirect = Functions::pathRedirect();
        $content = ob_get_clean();

        require_once(ROOT.'/Views/'.$this->template.'.php');
    }
}