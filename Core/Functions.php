<?php
namespace App\Core;

use App\Core\Trait\AllChampionsNameTrait;
use App\Core\Trait\AllChampionsRoleTrait;
use App\Core\Trait\AllChampionsDifficultyTrait;
use App\Core\Trait\AllGuidesNameTrait;
use App\Core\Trait\AllPathsBasename;
use App\Core\Trait\AllPathsDenied;

class Functions
{
    /* containt all champions name */
    use AllChampionsNameTrait;

    /* containt all champions role */
    use AllChampionsRoleTrait;

    /* containt all champions difficulty */
    use AllChampionsDifficultyTrait;

    /* containt all guides name */
    use AllGuidesNameTrait;

    /* containt all paths basename */
    use AllPathsBasename;

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
        if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) { return true; }
        return false;
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
     * checker champion name
     * @param string|null $name
     * @return boolean
     */
    public static function checkerChampionName(string $name = null): bool
    {
        if (!in_array($name, self::ALL_CHAMPIONS_NAME) || !is_string($name) || !isset($name) || empty($name)) { self::pathRedirectCurrent(); }
        return true;
    }

    /**
     * checker champion role
     * @param string|null $role
     * @return boolean
     */
    public static function checkerChampionRole(string $role = null): bool
    {
        if (!in_array($role, self::ALL_CHAMPIONS_ROLE) || !isset($role) || empty($role)) { self::pathRedirectCurrent(); }
        return true;
    }

    /**
     * checker champion difficulty
     * @param string|null $difficulty
     * @return string|null
     */
    public static function checkerChampionDifficulty(string $difficulty = null): string|null
    {
        if (!in_array($difficulty, self::ALL_CHAMPIONS_DIFFICULTY) || !is_string($difficulty)) { return null; }

        switch ($difficulty)
        {
            case 1: return '../../public/images/champions/difficulty/evaluation1.png'; break;
            case 2: return "../../public/images/champions/difficulty/evaluation2.png"; break;
            case 3: return "../../public/images/champions/difficulty/evaluation3.png"; break;
            case 4: return "../../public/images/champions/difficulty/evaluation4.png"; break;
            case 5: return "../../public/images/champions/difficulty/evaluation5.png"; break;
        }
    }

    /**
     * checker guide name
     * @param string|null $name
     * @return boolean
     */
    public static function checkerGuideName(string $name = null): bool
    {
        if (!in_array($name, self::ALL_GUIDES_NAME) || !is_string($name) || !isset($name) || empty($name)) { self::pathRedirectCurrent(); }
        return true;
    }

    /**
     * checker path basename
     * @return boolean
     */
    public static function checkerPathBasename(): bool
    {
        if (!in_array(basename($_GET['p']), self::ALL_PATHS_BASENAME)) { self::pathRedirectCurrent(); }
        return true;
    }

    /**
     * checker path denied
     * @return boolean
     */
    public static function checkerPathDenied(): bool
    {
        if (in_array(basename($_GET['p']), self::ALL_PATHS_DENIED)) { self::pathRedirectCurrent(); }
        return true;
    }

    /**
     * checker path int
     * @param $parameter
     * @return boolean
     */
    public static function checkerPathInt($parameter = null): bool
    {
        if (!is_numeric($parameter) || !isset($parameter) || empty($parameter)) { self::pathRedirectCurrent(); }
        return true;
    }

    /**
     * checker path count
     * @param integer|null $count
     * @return boolean
     */
    public static function checkerPathCount(int $count = null): bool
    {
        if (!is_numeric($count) || !isset($count) || empty($count)) { self::pathRedirectCurrent(); }

        if (basename($_GET['p']) > $count) { self::pathRedirect(); }
        return true;
    }

    /**
     * `../` OR `../../`
     * @return string|null
     */
    public static function getPathRedirect(): string|null
    {
        if (str_contains($_GET["p"], "/"))
        {
            $getP = substr_count($_GET["p"], "/");

            if ($getP == 1) { return "../"; }
            else if ($getP == 2) { return "../../"; }
            else { http_response_code(404); self::pathRedirect(); }
        }
        return null;
    }

    /**
     * 1: Incorrect email format. ; 2: Email already taken. ; 3: Password not enough strong. ; 4: Email and / or password is incorrect.
     * @param integer|null $number
     * @return string|boolean
     */
    public static function getErrorMessage(int $number = null): string|bool
    {
        if (!is_numeric($number) || !isset($number) || empty($number)) { return false; }

        switch ($number)
        {
            case 1: return 'Incorrect email format.'; break;
            case 2: return 'Email already taken.'; break;
            case 3: return 'Password not enough strong.'; break;
            case 4: return 'Email and / or password is incorrect.'; break;
        }
    }

    /**
     * `../`
     * @return void
     */
    private static function pathRedirect(): void
    {
        header('Location: ../'); exit;
    }

    /**
     * `./`
     * @return void
     */
    private static function pathRedirectCurrent(): void
    {
        header('Location: ./'); exit;
    }
}