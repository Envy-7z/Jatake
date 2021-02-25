<?php

if(!function_exists('formating'))
{
    function formating($text,$type)
    {
        if(empty($text) || empty($type))
            return;
        if($type == "price")
        {

            $text = number_format($text,2,',','.');
            return "Rp. ".$text;
        }
        return ;
    }
}

if(!function_exists('arr2Obj'))
{
    function arr2Obj($arr,$progressive=true)
	{
		return $progressive ? json_decode(json_encode($arr)) : (object)($arr);
    }
}


if(!function_exists('pricify'))
{
    function pricify($things)
    {
        return (object)$things;
    }
}


// if(!function_exists('search'))
// {
//     function search($value, $strict = false)
//     {
//          if (! $this->useAsCallable($value)) {
//              return array_search($value, $this->items, $strict);
//          }

//          foreach ($this->items as $key => $item) {
//              if (call_user_func($value, $item, $key)) {
//                  return $key;
//              }
//          }

//          return false;
//     }
// }
