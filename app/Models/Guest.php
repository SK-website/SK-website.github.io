<?php

require_once CORE.'/Model.php';
// require_once CORE.'/Connection.php';

class Guest extends Model
{
    protected static $table='guestbook';
    protected static $pk='id';
}