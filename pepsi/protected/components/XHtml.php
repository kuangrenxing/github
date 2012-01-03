<?php

/**
 * class extends from CHtml to generate reusable and customed html components
 **/
class XHtml extends CHtml
{
    //render Price 
    static public function formatPrice($price,$isDot=false)
    {
        $price = ($price>0)?$price:0;
        if($isDot)
        {
            return number_format($price,2,'.','');    
        }
        else
        {
            return number_format($price,0,'','');    
        }
    }
    
    static public function timeAgo($time)
    {
        $periods = array("秒", "分", "小时", "天", "周", "月", "年", "十年");
        $lengths = array("60","60","24","7","4.35","12","10");

        $now = time();

        $difference     = $now - $time;
        $tense         = "前";

        for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
            $difference /= $lengths[$j];
        }

        $difference = round($difference);

        return "$difference $periods[$j]'前' ";
    }

    static public function formatTitle($string, $length = 0)
    {
        if(strlen($string) <= $length) 
        {
            return $string;
        }

        $string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;'), array('&', '"', '<', '>'), $string);

        $strcut = '';
        $n = $tn = $noc = 0; 
        while($n < strlen($string)) {

            $t = ord($string[$n]);
            if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
                $tn = 1; $n++; $noc++;
            } elseif(194 <= $t && $t <= 223) {
                $tn = 2; $n += 2; $noc += 2;
            } elseif(224 <= $t && $t < 239) {
                $tn = 3; $n += 3; $noc += 2;
            } elseif(240 <= $t && $t <= 247) {
                $tn = 4; $n += 4; $noc += 2;
            } elseif(248 <= $t && $t <= 251) {
                $tn = 5; $n += 5; $noc += 2;
            } elseif($t == 252 || $t == 253) {
                $tn = 6; $n += 6; $noc += 2;
            } else {
                $n++;
            }    

            if($noc >= $length) {
                break;
            }

        }
        if($noc > $length) {
            $n -= $tn;
        }

        $result = substr($string, 0, $n);

        $result = str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $result);

        if ($string != $result)
        {
            $result .= '...';
        }

        return $result;
    }
}

?>
