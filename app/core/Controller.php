<?php 

  class Controller 
  {
    protected function view($folder, $view, $data = [])
    {
      //the $folder is the name of the folder in the view and $view is the name of the view
      $filename = "../app/views/". $folder . "/". $view. ".view.php";
      if(file_exists($filename)){
        require $filename;
      }else{
        $filename = "../app/views/" . $folder . "/"."404.view.php"; 
        require $filename;
      }
    }

    protected function model($model)
    {
      $filename = "../app/models/". $model . ".php";
      if(file_exists($filename)){

        require $filename;
        return $model = new $model(); 
   
      }
    }
  }