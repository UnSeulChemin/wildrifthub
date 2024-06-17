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
        if (!Functions::checkerSessionAdmin()):
            header('Location: '.Functions::pathRedirect().'./'); exit;
        endif;

        $todo = isset($_POST['todo']) ? strip_tags($_POST['todo']) : '';

        if (Form::validate($_POST, ['todo'])):
            $adminModel = new AdminModel;
            $adminModel->setTodo($todo);
            if ($adminModel->create()):
                header("Location: admin"); exit;
            endif;
        endif;

        $form = self::contactForm($todo);

        $adminModel = new AdminModel;
        $admins = $adminModel->findAllOrderBy('id DESC');

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
        Functions::pathDenied();

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