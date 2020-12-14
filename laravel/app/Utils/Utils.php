<?php

namespace App\Utils;

class Utils
{
    public static function formatPhoneNumber($number): string
    {
        if(strlen($number) === 11)
            $number = "0" . $number;

        preg_match('/(\d{3})(\d)(\d{4})(\d{4})/', $number, $phone);

        return "($phone[1]) $phone[2] $phone[3] - $phone[4]";
    }
}
