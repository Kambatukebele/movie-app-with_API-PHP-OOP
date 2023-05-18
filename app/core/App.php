<?php

class App
{
  private $controller = "home";
  private $method = "index";
  private $params;

  public function __construct()
  {
    $URL = $this->getURL();

    $this->controller = $URL[0];

    $fileName = "../app/controllers/" . $this->controller . ".php";
    //CHECK IF FILE EXISTS
    if (file_exists($fileName)) {

      require $fileName;
      unset($URL[0]);
    } else {
      $this->controller = "_404"; 
      $fileName = "../app/controllers/" . $this->controller . ".php";
      require $fileName;
      unset($URL[0]);
    }

    $this->controller = new $this->controller;
    //CHECK IF METHOD EXISTS

    if (isset($URL[1])) {
      if (method_exists($this->controller, $URL[1])) {
        $this->method = $URL[1];
      }
      unset($URL[1]);
    }

    $this->params = (count($URL) > 0) ? $URL : ['home'];

    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  private function GetURl()
  {
    $url = isset($_GET['url']) ? $_GET['url'] : "home";
    $url = filter_var("$url", FILTER_SANITIZE_URL);
    $url = explode("/", trim($url, "/"));
    return $url;
  }
}