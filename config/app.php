<?php
define("ROOT", realpath(__DIR__."/../"));

const VIEWS = ROOT."/app/Views";
const CONTROLLERS = ROOT."/app/Controllers";
const LOGS = ROOT.'/logs';
const APP_ENV = 'dev';
const CONFIG = ROOT.'/config';
const CORE = ROOT.'/core';

const DB_CONFIG_FILE = CONFIG.'/db.php';
const MODELS = ROOT."/app/Models";
//ROUTES
define("ROUTES", require_once CONFIG."/routes.php");

 