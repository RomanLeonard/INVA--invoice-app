<?php

require_once("vendor/autoload.php");

$f3 = Base::instance();

$f3->config('app/config.ini');
$f3->config('app/routes.ini');
$f3->config('app/database.ini');

$f3->set("db.instance", new DB\SQL("mysql:host=" . $f3->get("db.host") . ";port=" . $f3->get("db.port") . ";dbname=" . $f3->get("db.name"),$f3->get("db.user"),$f3->get("db.pass")));

$f3->run();
