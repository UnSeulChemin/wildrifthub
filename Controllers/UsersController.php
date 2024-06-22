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
        // functions static
        $sessionUser = Functions::checkerSessionUser();
        $sessionPro = Functions::checkerSessionPro();

        // view
        $this->title = 'WildRift Hub | Become Pro';
        $this->render('users/index', ['sessionUser' => $sessionUser, 'sessionPro' => $sessionPro]);
    }

    /**
     * route /users/register
     * @return void
     */
    public function register(): void
    {
        // checker empty
        if (!Functions::checkerSessionEmpty()):
            header('Location: '.Functions::pathRedirect().'./'); exit;
        endif;

        // environment variables
        $email = isset($_POST['email']) ? strip_tags($_POST['email']) : '';
        $password = isset($_POST['password']) ? strip_tags($_POST['password']) : '';
        $error = '';
        $roles = ['ROLE_USER'];

        // form validate
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
                    else: $error = Functions::errorMessage(3); endif;
                else: $error = Functions::errorMessage(2); endif;
            else: $error = Functions::errorMessage(1); endif;
        endif;

        // form create
        $form = self::registerForm($email, $password);

        // view
        $this->title = 'WildRift Hub | Register';
        $this->render('users/register', ['registerForm' => $form->create(), 'error' => $error]);
    }

    /**
     * route /users/login
     * @return void
     */
    public function login(): void
    {
        // checker empty
        if (!Functions::checkerSessionEmpty()):
            header('Location: '.Functions::pathRedirect().'./'); exit;
        endif;

        // environment variables
        $email = isset($_POST['email']) ? strip_tags($_POST['email']) : '';
        $password = isset($_POST['password']) ? strip_tags($_POST['password']) : '';
        $error = '';

        // form validate
        if (Form::validate($_POST, ['email', 'password'])):
            $userModel = new UserModel;
            $userArray = $userModel->findOneByEmail($email);
            if ($userArray):
                $user = $userModel->hydrate($userArray);
                if (password_verify($password, $user->getPassword())):
                    $user->setSession();
                    header("Location: ./"); exit;
                else: $error = Functions::errorMessage(4); endif; 
            else: $error = Functions::errorMessage(4); endif;
        endif;
         
        // form create
        $form = self::loginForm($email, $password);

        // view
        $this->title = 'WildRift Hub | Login';
        $this->render('users/login', ['loginForm' => $form->create(), 'error' => $error]);
    }

    /**
     * route /users/logout
     * @return void
     */
    public function logout(): void
    {
        // checker user
        if (Functions::checkerSessionUser()):
            unset($_SESSION['user']);
            header('Location: '.Functions::pathRedirect().'./'); exit;
        else: header('Location: '.Functions::pathRedirect().'./'); exit; endif;
    }

    /**
     * self registerForm
     * @param string|null $email
     * @param string|null $password
     * @return Form
     */
    private static function registerForm(string $email = null, string $password = null): Form
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
     * @param string|null $email
     * @param string|null $password
     * @return Form
     */
    private static function loginForm(string $email = null, string $password = null): Form
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