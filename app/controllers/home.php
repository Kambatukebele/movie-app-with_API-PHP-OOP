<?php

  class Home extends Controller
  {
    public function index(){
      
      $data['page_title'] = "Home | Movie - App"; 
      //You need to specify the folder of the view you want to load
      return $this->view("theme","home", $data);  
    }
  }