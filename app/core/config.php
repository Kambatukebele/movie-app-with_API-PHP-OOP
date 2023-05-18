<?php

  //MYSQL CONSTANTS
  define("DB_HOST", $_SERVER['SERVER_NAME']);
  define("DB_NAME", "movie_app");
  define("DB_USER", "root");
  define("DB_PASS", "");
  define("DB_CLIENT", "mysql");

  //ABSOLUTE LINK
  define("ROOT", $_SERVER['REQUEST_SCHEME']. "://". $_SERVER['SERVER_NAME']."/");
  define("ROOT_ASSETS", $_SERVER['REQUEST_SCHEME']. "://". $_SERVER['SERVER_NAME']."/" . "assets/"); 