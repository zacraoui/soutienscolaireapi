<?php

use Carbon\Carbon;

if(!function_exists('formatDate')){
    function formatDate($date=null,$time=false){
        $timeStr = '';
        if($time){
            $timeStr = ' H:i:s';
        }
        return  Carbon::createFromFormat('Y-m-d'.$timeStr,$date)->format('d-m-Y'.$timeStr);
    }
}
