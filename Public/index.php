<?php

  define("_PUBLIC",dirname(__FILE__));
  define("ROOT",dirname(_PUBLIC));
  define("DS",DIRECTORY_SEPARATOR);
  define("CORE", ROOT.DS."Core");
  define ("VIEW",ROOT.DS."View");
  define ("UPLOADS",ROOT.DS."uploads");
  define('BU', dirname(dirname($_SERVER['SCRIPT_NAME'])));
  
  require CORE.DS."Session.php";
  require CORE.DS."Url.php";
  require CORE.DS."Request.php";
  require CORE.DS."App.php";
  require CORE.DS."DataBase.php";
  require CORE.DS."Model.php";
  require CORE.DS."Controlleur.php";

  new App ();
  ?>