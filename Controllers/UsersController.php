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

        if (Form::validate($_POST, ['email', 'password'])):
            if (Form::validateEmail($_POST, ['email'])):
                $userModel = new UserModel;
                $user = $userModel->findBy(["email" => $email]);
                if (!$user):
                    if (Form::validatePassword($_POST, ['password'])):
                        $passwordHash = password_hash(strip_tags($password), PASSWORD_ARGON2I);
                        $roles = ["ROLE_USER"];
                        $userModel = new userModel;
                        $userModel->setEmail($email)->setPassword($passwordHash)->setRoles($roles, "encode");
                        if ($userModel->create()):
                            $userArray = $userModel->findOneByEmail($email);
                            $user = $userModel->hydrate($userArray);
                            $user->setSession();
                            header("Location: ./"); exit;
                        endif;
                    else: $error = self::error(3); endif;
                else: $error = self::error(2); endif;
            else: $error = self::error(1); endif;
        endif;

        $form = self::registerForm($email, $password);

        $this->title = 'WildRift Hub | Pro';
        $this->render('users/index', ['error' => $error, 'registerForm' => $form->create()]);
    }

    public function login()
    {
        $email = isset($_POST['email']) ? strip_tags($_POST['email']) : '';
        $password = isset($_POST['password']) ? strip_tags($_POST['password']) : '';
        $error = '';

        if (Form::validate($_POST, ['email', 'password'])):
            $userModel = new UserModel;
            $userArray = $userModel->findOneByEmail($email);
            if ($userArray):
                $user = $userModel->hydrate($userArray);
                if (password_verify($password, $user->getPassword())):
                    $user->setSession();
                    header("Location: ./"); exit;
                else: $error = self::error(4); endif; 
            else: $error = self::error(4); endif;
        endif;

        $form = self::loginForm($email, $password);

        $this->title = 'WildRift Hub | Login';
        $this->render('users/login', ['error' => $error, 'loginForm' => $form->create()]);
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

    /**
     * error
     * 1: Incorrect email format
     * 2: Email already taken
     * 3: Password not enough strong
     * @param $error
     * @return void
     */
    public function error($error)
    {
        switch ($error)
        {
            case 1: return 'Incorrect email format.'; break;
            case 2: return 'Email already taken.'; break;
            case 3: return 'Password not enough strong.'; break;
            case 4: return 'Email and / or password is incorrect.'; break;
        }
        return null;
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: '.Functions::pathRedirect().'./');
        exit;
    }
}