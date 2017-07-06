<?php

/**
 * Created by: Joseph
 * Date Time: 2017-07-06 13:05
 */

namespace App;

trait ListConfig
{
    public function getListConfig(){
        if(is_array($this->list_config)){
            return $this->list_config;
        }else{
            return [];
        }
    }
}