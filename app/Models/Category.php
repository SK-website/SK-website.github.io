<?php

require_once CORE.'/Model.php';
//require_once CORE.'/Connection.php';

class Category extends Model
{
    protected static $table='categories';
    protected static $pk='id';
}