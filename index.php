<?php

session_start();
set_time_limit(0);
$t1 = microtime();
define("PE_VERSION",'4.0');
require "lib/init.cls.php";

$ginkgo = new ginkgo;
$ginkgo->run();
?>