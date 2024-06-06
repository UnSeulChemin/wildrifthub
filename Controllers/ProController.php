<?php
namespace App\Controllers;

use App\Core\Form;
use App\Core\Functions;
use App\Models\UserModel;

class ProController extends Controller
{
    /**
     * route /pro
     * @return void
     */
    public function index()
    {
        if (Form::validate($_POST, ['email', 'password']))
        {
            $email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);

            $userModel = new userModel;
            $userModel->setEmail($email)->setPassword($password);

            if ($userModel->create())
            {
                header("Location: ./");
                exit;
            }
        }

        else
        {
            $_SESSION['warning'] = !empty($_POST) ? "Form is empty." : '';
            $email = isset($_POST['email']) ? strip_tags($_POST['email']) : '';
            $password = isset($_POST['password']) ? strip_tags($_POST['password']) : '';
        }

        $form = self::form($email, $password);

        $this->title = 'WildRift Hub | Pro';
        $this->render('pro/index', ['proForm' => $form->create()]);
    }

    /**
     * route /pro self::form
     *
     * @param $email
     * @param $password
     * @return void
     */
    public static function form($email = null, $password = null)
    {
        Functions::pathDenied();

        $form = new Form;
        $form->startForm()
            ->startDiv()
                ->addInput('email', 'email',
                    ['placeholder' => 'Email', 'value' => $email, 'required' => true, 'autofocus' => true])
            ->endDiv()
            ->startDiv()
                ->addInput('password', 'password',
                    ['placeholder' => 'Password', 'required' => true])
            ->endDiv()
            ->addButton('Registration', ['type' => 'submit', 'class' => 'link-form', 'role' => 'button'])
            ->endForm();
        return $form;
    }
}