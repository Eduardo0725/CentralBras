<?php

namespace App\Utils;

class Utils
{
    public static function calcStars($numStar, $numStarHalf) {
        return ($numStar > $numStarHalf)?'images/icons/star.svg':(($numStar < $numStarHalf)?'images/icons/star-outline.svg':'images/icons/star-half.svg');
    }
}
