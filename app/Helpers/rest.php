<?php

namespace App\Helpers;
use GuzzleHttp\Client;
use GuzzleHttp\Exception;

class Rest
{
    //
    protected $rest;
    protected $uri;
    protected $token;

    public function __construct($opt=null)
    {
        if(empty($opt))
            $opt['token']=null;
        $this->client = new Client([
            'base_uri'=>url('v1').'/',
            'headers'=>[
                'Authorization' => 'Bearer '.$opt['token'],
                'Accept' => 'application/json',
                'Content-type' => 'application/json'
            ],
            'verify' => false
        ]);
    }

    protected function get($url='')
    {
        $resp = $this->_curl('get',$url);
        return json_decode($resp);
    }

    protected function post($url='',$data)
    {
        $resp = $this->_curl('post',$url,['form_params'=>$data]);
        return json_decode($resp);
    }

    protected function delete($url='')
    {
        $resp = $this->_curl('delete',$url);
        return json_decode($resp);
    }

    protected function put($url='',$data)
    {
        $resp = $this->_curl('put',$url,['form_params'=>$data]);
        return json_decode($resp);
    }

    private function _curl($method,$url='',$opt=[])
    {
        try{
            $resp = $this->client->$method($this->uri.$url,$opt)->getBody(true);
        }
        catch(\Exception $e)
        {
            $resp = $e->getResponse()->getBody();
        }
        return $resp;
    }

}
