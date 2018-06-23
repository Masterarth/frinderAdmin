<?php

class Tag extends \Phalcon\Tag {

    static public function noformat($input) {
        return round($input);
    }

    static public function checkLinkToPic($string) {
        return preg_match("/^http:\/\/.*(jpg)$/", $string);
    }

}
