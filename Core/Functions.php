<?php
namespace App\Core;

class Functions
{
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

    private static function redirect(): void
    {
        header('Location: ../'); exit;
    }

    private static function redirectCurrentPage(): void
    {
        header('Location: ./'); exit;
    }
}