<?php

require_once CORE.'/Model.php';
// require_once CORE.'/Connection.php';

class Brand extends Model
{
    protected static $table='brands';
    protected static $pk='id';
}