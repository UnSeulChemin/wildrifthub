<?php
namespace App\Core;

use App\Core\Trait\AllHerosTrait;
use App\Core\Trait\AllDifficultyTrait;
use App\Core\Trait\AllDeniedPath;

class Functions
{
    /**
     * containt all heros name
     */
    use AllHerosTrait;

    /**
     * containt all difficulty value
     */
    use AllDifficultyTrait;

    /**
     * containt all denied path
     */
    use AllDeniedPath;

    /**
     * check param hero exist
     * @param $value
     * @return boolean
     */
    public static function checkerParamHero($value): bool
    {
        if (!in_array($value, self::ALL_HEROS) || !is_string($value) || !isset($value) || empty($value)) { self::redirectCurrentPage(); }
        return true;
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