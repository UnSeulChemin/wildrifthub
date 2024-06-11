<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Core\Form;
use App\Core\Functions;

class UsersController extends Controller
{
    /**
     * route /users
     * @return void
     */
    public function index(): void
    {
        $this->title = 'WildRift Hub | Become Pro';
        $this->render('users/index');
    }

    /**
     * route /users/register
     * @return void
     */
    public function register(): void
    {
        $email = isset($_POST['email']) ? strip_tags($_POST['email']) : '';
        $password = isset($_POST['password']) ? strip_tags($_POST['password']) : '';
        $error = '';
        $roles = ["ROLE_USER"];

        if (Form::validate($_POST, ['email', 'password'])):
            if (Form::validateEmail($_POST, ['email'])):
                $userModel = new UserModel;
                $user = $userModel->findBy(["email" => $email]);
                if (!$user):
                    if (Form::validatePassword($_POST, ['password'])):
                        $passwordHash = password_hash(strip_tags($password), PASSWORD_ARGON2I);
                        $userModel->setEmail($email)->setPassword($passwordHash)->setRoles($roles, "encode");
                        if ($userModel->create()):
                            $userArray = $userModel->findOneByEmail($email);
                            $user = $userModel->hydrate($userArray);
                            $user->setSession();
                            header("Location: ./"); exit;
                        endif;
                    else: $error = self::errorMessage(3); endif;
                else: $error = self::errorMessage(2); endif;
            else: $error = self::errorMessage(1); endif;
        endif;

        $form = self::registerForm($email, $password);

        $this->title = 'WildRift Hub | Register';
        $this->render('users/register', ['registerForm' => $form->create(), 'error' => $error]);
    }

    /**
     * route /users/login
     * @return void
     */
    public function login(): void
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
                else: $error = self::errorMessage(4); endif; 
            else: $error = self::errorMessage(4); endif;
        endif;

        $form = self::loginForm($email, $password);

        $this->title = 'WildRift Hub | Login';
        $this->render('users/login', ['loginForm' => $form->create(), 'error' => $error]);
    }

    /**
     * route /users/logout
     * @return void
     */
    public function logout(): void
    {
        unset($_SESSION['user']);
        header('Location: '.Functions::pathRedirect().'./'); exit;
    }

    /**
     * self registerForm
     * @param $email
     * @param $password
     * @return Form
     */
    public static function registerForm(string $email = null, string $password = null): Form
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
     * self loginForm
     * @param $email
     * @param $password
     * @return Form
     */
    public static function loginForm(string $email = null, string $password = null): Form
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
     * self errorMessage
     * @param integer $number
     * @return string|null
     */
    public function errorMessage(int $number = null): string
    {
        Functions::pathDenied();

        switch ($number)
        {
            case 1: return 'Incorrect email format.'; break;
            case 2: return 'Email already taken.'; break;
            case 3: return 'Password not enough strong.'; break;
            case 4: return 'Email and / or password is incorrect.'; break;
        }
    }
}