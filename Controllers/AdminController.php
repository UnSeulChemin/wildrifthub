<?php
namespace App\Controllers;

use App\Models\TodoModel;
use App\Models\UserModel;
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
        // checker session admin
        if (!Functions::checkerSessionAdmin()):
            header('Location: '.Functions::getPathRedirect().'./'); exit;
        endif;

        // environment variables
        $todo = isset($_POST['todo']) ? strip_tags($_POST['todo']) : '';

        // form validate
        if (Form::validate($_POST, ['todo'])):
            $todoModel = new TodoModel;
            $todoModel->setContent($todo);
            if ($todoModel->create()):
                header('Location: admin'); exit;
            endif;
        endif;

        // form create
        $form = self::contactForm($todo);

        // class instance
        $todoModel = new TodoModel;
        $todos = $todoModel->findAllOrderBy('id DESC');

        // view
        $this->title = 'WildRift Hub | Admin';
        $this->render('admin/index', ['contactForm' => $form->create(), 'todos' => $todos]);
    }

    /**
     * route /admin/users
     * @return void
     */
    public function users(): void
    {
        // checker session admin
        if (!Functions::checkerSessionAdmin()):
            header('Location: '.Functions::getPathRedirect().'./'); exit;
        endif;

        // class instance
        $userModel = new UserModel;
        $users = $userModel->findAllOrderBy('id DESC');

        // functions static
        $pathRedirect = Functions::getPathRedirect();

        // view
        $this->title = 'WildRift Hub | Admin | Users';
        $this->render('admin/users', ['users' => $users, 'pathRedirect' => $pathRedirect]);
    }

    /**
     * self contactForm
     * @param string|null $todo
     * @return Form
     */
    private static function contactForm(string $todo = null): Form
    {
        // checker path denied
        Functions::checkerPathDenied();

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