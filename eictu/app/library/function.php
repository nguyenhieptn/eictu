<?php
function _sub($str, $length, $minword = 3,$link)
{
    $sub = '';
    $len = 0;
    foreach (explode(' ', $str) as $word)
    {
        $part = (($sub != '') ? ' ' : '') . $word;
        $sub .= $part;
        $len += strlen($part);
        if (strlen($word) > $minword && strlen($sub) >= $length)
        {
            break;
        }

    }
    return $sub . (($len < strlen($str)) ? '...<a href="'.$link.'">read more</>' : '');
}
