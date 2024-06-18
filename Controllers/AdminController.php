<?php
namespace App\Controllers;

use App\Models\AdminModel;
use App\Core\Form;
use App\Core\Functions;

class AdminController extends Controller
{
    /**
     * route /admin
     * @return void
     */    
    public function index(): void
    {
        // checker admin 
        if (!Functions::checkerSessionAdmin()):
            header('Location: '.Functions::pathRedirect().'./'); exit;
        endif;

        // environment variable
        $todo = isset($_POST['todo']) ? strip_tags($_POST['todo']) : '';

        // form validate
        if (Form::validate($_POST, ['todo'])):
            $adminModel = new AdminModel;
            $adminModel->setTodo($todo);
            if ($adminModel->create()):
                header("Location: admin"); exit;
            endif;
        endif;

        // form create
        $form = self::contactForm($todo);

        // class instance
        $adminModel = new AdminModel;
        $admins = $adminModel->findAllOrderBy('id DESC');

        // view
        $this->title = 'WildRift Hub | Admin';
        $this->render('admin/index', ['admins' => $admins, 'contactForm' => $form->create()]);
    }

    /**
     * self contactForm
     * @param string|null $todo
     * @return Form
     */
    private static function contactForm(string $todo = null): Form
    {
        // path not allowed
        Functions::pathDenied();

        // form
        $form = new Form;
        $form->startForm()
            ->startDiv()
                ->addInput('text', 'todo',
                ['placeholder' => 'Todo', 'value' => $todo, 'required' => true, 'autofocus' => true])
            ->endDiv()
            ->addButton('Validate', ['type' => 'submit', 'class' => 'link-submit', 'role' => 'button'])
            ->endForm();
        return $form;
    }
}