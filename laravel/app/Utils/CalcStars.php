<?php

namespace App\Utils;

class CalcStars
{
    public static function calc($numStar, $numStarHalf) {
        return ($numStar > $numStarHalf)?'images/icons/star.svg':(($numStar < $numStarHalf)?'images/icons/star-outline.svg':'images/icons/star-half.svg');
    }
}
