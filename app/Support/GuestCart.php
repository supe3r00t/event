<?php

namespace App\Support;

use App\Models\QuoteRequest;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class GuestCart
{
    public static function token(): string
    {
        $token = request()->cookie('ec_guest');

        if (!$token) {
            $token = Str::random(40);
            Cookie::queue(Cookie::forever('ec_guest', $token));
        }

        return $token;
    }

    public static function draft(): QuoteRequest
    {
        $token = self::token();

        return QuoteRequest::query()->firstOrCreate(
            ['guest_token' => $token, 'status' => 'draft'],
            ['code' => self::newCode(), 'total_estimate' => 0]
        );
    }

    public static function newCode(): string
    {
        return 'EC-' . strtoupper(Str::random(8));
    }
}
