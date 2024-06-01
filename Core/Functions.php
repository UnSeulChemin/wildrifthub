<?php
namespace App\Core;

use App\Core\Trait\AllHerosTrait;

class Functions
{
    /**
     * containt all heros name
     */
    use AllHerosTrait;

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