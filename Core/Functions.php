<?php
namespace App\Core;

use App\Core\Trait\AllChampionsNameTrait;
use App\Core\Trait\AllGuidesNameTrait;
use App\Core\Trait\AllChampionsDifficultyTrait;
use App\Core\Trait\AllPathsBasename;
use App\Core\Trait\AllPathsDenied;

class Functions
{
    /* containt all champions name */
    use AllChampionsNameTrait;

    /* containt all guides name */
    use AllGuidesNameTrait;

    /* containt all champions difficulty */
    use AllChampionsDifficultyTrait;

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
     * checker int
     * @param $value
     * @return boolean
     */
    public static function checkerInt($value): bool
    {
        if (!is_numeric($value) || !isset($value) || empty($value)) { self::redirectCurrentPage(); }
        return true;
    }

    /**
     * checker count
     * @param integer $value
     * @return boolean
     */
    public static function checkerCount($value): bool
    {
        if (basename($_GET['p']) > $value) { self::redirect(); }
        return true;
    }

    /**
     * checker guide
     * @param string|null $guide
     * @return boolean
     */
    public static function checkerGuide(string $guide = null): bool
    {
        if (!in_array($guide, self::ALL_GUIDES_NAME) || !is_string($guide) || !isset($guide) || empty($guide)) { self::redirectCurrentPage(); }
        return true;
    }    

    /**
     * checker champion
     * @param string|null $champion
     * @return boolean
     */
    public static function checkerChampion(string $champion = null): bool
    {
        if (!in_array($champion, self::ALL_CHAMPIONS_NAME) || !is_string($champion) || !isset($champion) || empty($champion)) { self::redirectCurrentPage(); }
        return true;
    }

    /**
     * checker difficulty
     * @param string|null $difficulty
     * @return string|null
     */
    public static function checkerDifficulty(string $difficulty = null): string|null
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
     * checker basename
     * @return boolean
     */
    public static function checkerBasename(): bool
    {
        if (!in_array(basename($_GET['p']), self::ALL_PATHS_BASENAME)) { self::redirectCurrentPage(); }
        return true;
    }

    /**
     * 1: Incorrect email format. 2: Email already taken. 3: Password not enough strong. 4: Email and / or password is incorrect.
     * @param integer|null $number
     * @return string|boolean
     */
    public static function errorMessage(int $number = null): string|bool
    {
        if (!isset($number) || empty($number) || !is_int($number)) { return false; }

        switch ($number)
        {
            case 1: return 'Incorrect email format.'; break;
            case 2: return 'Email already taken.'; break;
            case 3: return 'Password not enough strong.'; break;
            case 4: return 'Email and / or password is incorrect.'; break;
        }
    }

    /**
     * path denied
     * @return boolean
     */
    public static function pathDenied(): bool
    {
        if (in_array(basename($_GET['p']), self::ALL_PATHS_DENIED)) { self::redirectCurrentPage(); }
        return true;
    }

    /**
     * `../` `../../`
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
     * `../`
     * @return void
     */
    private static function redirect(): void
    {
        header('Location: ../'); exit;
    }

    /**
     * `./`
     * @return void
     */
    private static function redirectCurrentPage(): void
    {
        header('Location: ./'); exit;
    }
}