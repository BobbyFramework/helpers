<?php

namespace BobbyFramework\Helpers;

class Algo
{
 static public function checkLuhn($val) {

        $len   = strlen($val);
        $total = 0;
        for ($i = 1; $i <= $len; $i++) {
            $j = substr($val, -$i, 1);
            if ($i % 2 == 0) {
                $total += 2 * $j;
                if ((2 * $j) >= 10) {
                    $total -= 9;
                }
            }
            else {
                $total += $j;
            }
        }
        if ($total % 10 == 0) {
            return true;
        }
        else {
            return false;
        }
    }
}
