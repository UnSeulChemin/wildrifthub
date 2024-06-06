<?php
namespace App\Controllers;

use App\Core\Form;
use App\Core\Functions;
use App\Models\UserModel;

class UsersController extends Controller
{
    /**
     * route /users
     * @return void
     */
    public function index()
    {
        if (Form::validate($_POST, ['email', 'password']))
        {
            if (Form::validateEmail($_POST, ['email']))
            {
                $email = strip_tags($_POST['email']);

                $userModel = new UserModel;
                $user = $userModel->findBy(["email" => $email]);

                if (!$user)
                {
                    if (Form::validatePassword($_POST, ['password']))
                    {
                        $password = password_hash(strip_tags($_POST['password']), PASSWORD_ARGON2I);
                        $roles = ["ROLE_USER"];
    
                        $userModel = new userModel;
                        $userModel->setEmail($email)->setPassword($password)->setRoles($roles, "encode");
            
                        if ($userModel->create())
                        {
                            $userArray = $userModel->findOneByEmail($email);
                            $user = $userModel->hydrate($userArray);
                            $user->setSession();
                            header("Location: ./");
                            exit;
                        }
                    }

                    else
                    {
                        $_SESSION['warning'] = !empty($_POST) ? "Password not enough strong." : '';
                        $email = isset($_POST['email']) ? strip_tags($_POST['email']) : '';
                        $password = isset($_POST['password']) ? strip_tags($_POST['password']) : '';
                    }
                }

                else
                {
                    $_SESSION['warning'] = !empty($_POST) ? "Email already taken." : '';
                    $email = isset($_POST['email']) ? strip_tags($_POST['email']) : '';
                    $password = isset($_POST['password']) ? strip_tags($_POST['password']) : '';
                }
            }

            else
            {
                $_SESSION['warning'] = !empty($_POST) ? "Incorrect email format." : '';
                $email = isset($_POST['email']) ? strip_tags($_POST['email']) : '';
                $password = isset($_POST['password']) ? strip_tags($_POST['password']) : '';
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
        $this->render('users/index', ['registerForm' => $form->create()]);
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: '.Functions::pathRedirect().'./');
        exit;
    }

    public function login()
    {
        $this->title = 'WildRift Hub | Login';
        $this->render('users/login');
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
            ->addButton('Registration', ['type' => 'submit', 'class' => 'link-submit', 'role' => 'button'])
            ->endForm();
        return $form;
    }
}