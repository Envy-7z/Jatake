<?php

namespace App\Library;

use Responder;

class Libs {
    private static $instance;

    public static function _()
    {
      if ( is_null( self::$instance ) )
      {
        self::$instance = new self();
      }
      return self::$instance;
    }

    public function jsonUnauth()
    {
        return \Responder::error("unauthorized","unauthorized")->respond(401);
    }

    public function arrayNullFilter($arr)
    {
        if(!empty($arr))
        {
            $arr = array_filter($arr,function($val){
                if(!empty($val))
                    return true;
                return false;
            });
            return json_encode($arr);
        }
    }

    public function strLimit($text, $limit) {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
      }

    public function null($var){
        if(!empty($var))
            return $var;
        return null;
    }

}
