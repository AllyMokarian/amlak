<?php
foreach (glob(getcwd()."/Libs/*.php") as $filename){include $filename;}
/*require("Libs/Model.php");
require("Libs/Views.php");
require ("Libs/controller.php");


require ("Libs/amlak.php");
require ("Libs/url.php")*/;
$url = new url();


?>