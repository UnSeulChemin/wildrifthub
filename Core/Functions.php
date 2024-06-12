<?php
namespace App\Core;

use App\Core\Trait\AllChampionsNameTrait;
use App\Core\Trait\AllChampionsDifficultyTrait;
use App\Core\Trait\AllPathsDenied;

class Functions
{
    /* containt all champions name */
    use AllChampionsNameTrait;

    /* containt all champions difficulty */
    use AllChampionsDifficultyTrait;

    /* containt all paths denied */
    use AllPathsDenied;

    /**
     * checker session empty
     * @return boolean
     */
    public static function checkerSessionEmpty(): bool
    {
        if (!isset($_SESSION['user']) && empty($_SESSION['user']['id'])) { return true; }
        return false;
    }

    /**
     * checker session user
     * @return boolean
     */
    public static function checkerSessionUser(): bool
    {
        if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) { return true; } return false;
    }

    /**
     * checker session admin
     * @return boolean
     */
    public static function checkerSessionAdmin(): bool
    {
        if (isset($_SESSION["user"]) && !empty($_SESSION['user']['id']) && in_array("ROLE_ADMIN", $_SESSION["user"]["roles"])) { return true; }
        return false;
    }

    /**
     * checker session pro
     * @return boolean
     */
    public static function checkerSessionPro(): bool
    {
        if (isset($_SESSION["user"]) && !empty($_SESSION['user']['id']) && str_contains("Y", $_SESSION["user"]["pro"])) { return true; }
        return false;
    }

    /**
     * checker champion
     * @param $value
     * @return boolean
     */
    public static function checkerChampion(string $champion = null): bool
    {
        if (!in_array($champion, self::ALL_HEROS) || !is_string($champion) || !isset($champion) || empty($champion)) { self::redirectCurrentPage(); }
        return true;
    }

    /**
     * self errorMessage
     * @param integer|null $number
     * @return string
     */
    public static function errorMessage(int $number = null): string
    {
        switch ($number)
        {
            case 1: return 'Incorrect email format.'; break;
            case 2: return 'Email already taken.'; break;
            case 3: return 'Password not enough strong.'; break;
            case 4: return 'Email and / or password is incorrect.'; break;
        }
    }

    /**
     * check difficulty value
     * @param $difficulty
     * @return string|null
     */
    public static function checkerDifficulty($difficulty): string|null
    {
        if (in_array($difficulty, self::ALL_DIFFICULTY) && is_string($difficulty))
        {
            switch ($difficulty)
            {
                case 1: return '../../public/images/tools/star/evaluation1.png'; break;
                case 2: return "../../public/images/tools/star/evaluation2.png"; break;
                case 3: return "../../public/images/tools/star/evaluation3.png"; break;
                case 4: return "../../public/images/tools/star/evaluation4.png"; break;
                case 5: return "../../public/images/tools/star/evaluation5.png"; break;
            }   
        }
        return null;
    }

    /**
     * path denied
     * @return boolean
     */
    public static function pathDenied(): bool
    {
        if (in_array(basename($_GET['p']), self::ALL_DENIED_PATH)) { self::redirectCurrentPage(); }
        return true;
    }

    /**
     * view only `../` `../../`
     * @return string|null
     */
    public static function pathRedirect(): string|null
    {
        if (str_contains($_GET["p"], "/"))
        {
            $getP = substr_count($_GET["p"], "/");

            if ($getP == 1) { return "../"; }
            else if ($getP == 2) { return "../../"; }
            else { http_response_code(404); self::redirect(); }
        }
        return null;
    }

    /**
     * self only `../`
     * @return void
     */
    private static function redirect(): void
    {
        header('Location: ../'); exit;
    }

    /**
     * self only `./`
     * @return void
     */
    private static function redirectCurrentPage(): void
    {
        header('Location: ./'); exit;
    }
}