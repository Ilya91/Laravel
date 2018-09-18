<?php


namespace App\Services;


class Active
{
    public static function check($uri)
    {
        if (request()->path() === $uri) {
            return 'active';
        }
        return '';
    }
}
