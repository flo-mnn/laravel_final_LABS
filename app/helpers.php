<?php
  
function emphasis($string){
        $str =  Illuminate\Support\Str::of($string)->replace('[', '<span>');
        $newTitle =  Illuminate\Support\Str::of($str)->replace(']', '</span>'); 
    return $newTitle;    
};
