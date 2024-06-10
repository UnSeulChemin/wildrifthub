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
        $email = isset($_POST['email']) ? strip_tags($_POST['email']) : '';
        $password = isset($_POST['password']) ? strip_tags($_POST['password']) : '';
        $error = '';

        if (Form::validate($_POST, ['email', 'password']))
        {
            if (Form::validateEmail($_POST, ['email']))
            {
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
                        $error = "Password not enough strong.";
                    }
                }

                else
                {
                    $error = "Email already taken.";
                }
            }

            else
            {
                $_SESSION['warning'] = !empty($_POST) ? "Incorrect email format." : '';
            }
        }

        else
        {
            $_SESSION['warning'] = !empty($_POST) ? "Form is empty." : '';
        }

        $form = self::registerForm($email, $password);

        $this->title = 'WildRift Hub | Pro';
        $this->render('users/index', ['error' => $error, 'registerForm' => $form->create()]);
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: '.Functions::pathRedirect().'./');
        exit;
    }

    public function login()
    {
        if (Form::validate($_POST, ['email', 'password']))
        {
            $email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['password']);

            $userModel = new UserModel;
            $userArray = $userModel->findOneByEmail($email);

            if ($userArray)
            {
                $user = $userModel->hydrate($userArray);

                if (password_verify($password, $user->getPassword()))
                {
                    $user->setSession();
                    header("Location: ./");
                    exit;
                }
    
                else
                {
                    $_SESSION["warning"] = "Email and / or password is incorrect.";
                }
            }

            else
            {
                $_SESSION["warning"] = "Email and / or password is incorrect.";
            }
        }

        else
        {
            $_SESSION['warning'] = !empty($_POST) ? "Form is empty." : '';
            $email = isset($_POST['email']) ? strip_tags($_POST['email']) : '';
            $password = isset($_POST['password']) ? strip_tags($_POST['password']) : '';
        }

        $form = self::loginForm($email, $password);

        $this->title = 'WildRift Hub | Login';
        $this->render('users/login', ['loginForm' => $form->create()]);
    }

    /**
     * route /users self::registerForm
     *
     * @param $email
     * @param $password
     * @return void
     */
    public static function registerForm($email = null, $password = null)
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

    /**
     * route /users self::loginForm
     * @param $email
     * @param $password
     * @return void
     */
    public static function loginForm($email = null, $password = null)
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
            ->addButton('Login', ['type' => 'submit', 'class' => 'link-submit', 'role' => 'button'])
            ->endForm();
        return $form;
    }
}