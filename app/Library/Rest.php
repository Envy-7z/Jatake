<?php

namespace App\Library;

use Psr\Http\Message\RequestInterface;
use \GuzzleHttp\HandlerStack;
use \GuzzleHttp\Middleware;
use \GuzzleHttp\Client;
use \GuzzleHttp\Exception as RestException;

class Rest extends Client{
    private static $instance;

    public static function _()
    {
      if ( is_null( self::$instance ) )
      {
        self::$instance = new self();
      }
      return self::$instance;
    }

    public function simpleGet($url,$param=[])
    {
        try{
            $resp = parent::get($url,['query'=>$param])->getBody();
        }
        catch(RestException\BadResponseException $e){
            $resp = $this->ex($e);
        }
        return json_decode($resp);
    }

    private function ex($e)
    {
        if(!empty($e->getResponse()->getBody()))
        // get error object
        return $e->getResponse()->getBody()->getContents();
    }
}
