<?php


namespace App\Helper;

use Illuminate\Support\Facades\DB;

class Helpers
{
    public static function dbConnectionStatus(): bool
    {
        try {
            DB::connection()->getPdo();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
