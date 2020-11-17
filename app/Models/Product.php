<?php

require_once CORE.'/Model.php';
//require_once CORE.'/Connection.php';

class Product extends Model
{
    protected static $table='products';
    protected static $pk='id';


    public static function getResource() {
        return self::$table;
    }
}