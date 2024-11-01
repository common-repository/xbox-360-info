<?php

class Xboxi_config{
    private static $ver = '1.1';
    private static $avatorUrl = 'http://avatar.xboxlive.com/avatar/';
    
    function getVer(){
        return self::$ver;
    }
    
    function getAvatarUrl(){
        return $this->avatorUrl;
    }
}