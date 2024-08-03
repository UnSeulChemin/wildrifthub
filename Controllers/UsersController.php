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
        // checker session empty
        if (!Functions::checkerSessionEmpty()):
            header('Location: '.Functions::getPathRedirect().'./'); exit;
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
                $user = $userModel->findBy(['email' => $email]);
                if (!$user):
                    if (Form::validatePassword($_POST, ['password'])):
                        $passwordHash = password_hash(strip_tags($password), PASSWORD_ARGON2I);
                        $userModel->setEmail($email)->setPassword($passwordHash)->setRoles($roles, 'encode');
                        if ($userModel->create()):
                            $userArray = $userModel->findOneByEmail($email);
                            $user = $userModel->hydrate($userArray);
                            $user->setSession();
                            header('Location: ./'); exit;
                        endif;
                    else: $error = Functions::getErrorMessage(3); endif;
                else: $error = Functions::getErrorMessage(2); endif;
            else: $error = Functions::getErrorMessage(1); endif;
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
        // checker session empty
        if (!Functions::checkerSessionEmpty()):
            header('Location: '.Functions::getPathRedirect().'./'); exit;
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
                    header('Location: ./'); exit;
                else: $error = Functions::getErrorMessage(4); endif; 
            else: $error = Functions::getErrorMessage(4); endif;
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
        // checker session user
        if (Functions::checkerSessionUser()):
            unset($_SESSION['user']);
            header('Location: '.Functions::getPathRedirect().'./'); exit;
        else: header('Location: '.Functions::getPathRedirect().'./'); exit; endif;
    }

    /**
     * route /users/profile
     * @return void
     */
    public function profile(): void
    {
        // checker session user
        if (!Functions::checkerSessionUser()):
            header('Location: '.Functions::getPathRedirect().'./');
        endif;

        // class instance
        $userModel = new UserModel;
        $user = $userModel->find($_SESSION['user']['id']);

        // view
        $this->title = 'WildRift Hub | Profile';
        $this->render('users/profile', ['user' => $user]);
    }

    /**
     * route /users/updateEmail
     * @return void
     */
    public function updateEmail(): void
    {
        // checker session user
        if (!Functions::checkerSessionUser()):
            header('Location: '.Functions::getPathRedirect().'./');
        endif;

        // class instance
        $userModel = new UserModel;
        $user = $userModel->find($_SESSION['user']['id']);

        // environment variables
        $email = isset($_POST['email']) ? strip_tags($_POST['email']) : '';

        // form validate
        if (Form::validate($_POST, ['email']))
        {
            $userModel = new UserModel;
            $userModel->setId($user->id)->setEmail($email);
            if ($userModel->update()):
                header('Location: profile'); exit;
            endif;
        }

        // form create
        $form = self::updateForm($user->email);

        // view
        $this->title = 'PlaygroundPOO | Profile | Email';
        $this->render('users/updateEmail', ['updateForm' => $form->create()]);
    }

    /**
     * self registerForm
     * @param string|null $email
     * @param string|null $password
     * @return Form
     */
    private static function registerForm(string $email = null, string $password = null): Form
    {
        // checker path denied
        Functions::checkerPathDenied();

        // form
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
            ->addButton('Register', ['type' => 'submit', 'class' => 'link-submit', 'role' => 'button'])
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
        // checker path denied
        Functions::checkerPathDenied();

        // form
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
     * self updateForm
     * @param string|null $email
     * @return Form
     */
    private static function updateForm(string $email = null): Form
    {
        // checker path denied
        Functions::checkerPathDenied();

        // form
        $form = new Form;
        $form->startForm()
            ->startDiv()
                ->addInput('email', 'email',
                    ['placeholder' => 'Email', 'value' => $email, 'required' => true, 'autofocus' => true])
            ->endDiv()
            ->addButton('Validate', ['type' => 'submit', 'class' => 'link-submit', 'role' => 'button'])
            ->endForm();
        return $form;
    }
}