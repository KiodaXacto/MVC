<?php

class Url {

    static function getUrl($url = "Base/index"){
        echo Url::link($url);
    }

    static function link ($url = "Base/index"){
        return "http://localhost/Projet_MVCSimple/".$url;
    }

}