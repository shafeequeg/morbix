<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Get_excerpt {

    public function get($str, $startPos=0, $maxLength=100) {
        if(strlen($str) > $maxLength) {
            $excerpt   = substr($str, $startPos, $maxLength-3);
            $lastSpace = strrpos($excerpt, ' ');
            $excerpt   = substr($excerpt, 0, $lastSpace);
        } else {
            $excerpt = $str;
        }

        return $excerpt;
    }
}
?>