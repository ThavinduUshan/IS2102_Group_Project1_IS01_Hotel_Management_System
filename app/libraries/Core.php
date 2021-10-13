<?php
  //Core App Class
  class Core{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
      $url = $this->geturl();

      //ucwords capitalize the first letter
      if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
        $this->currentController = ucwords($url[0]);
        unset($url[0]);
      }

      //require the controller
      require_once '../app/controllers/' . $this->currentController . '.php';
      //initiating
      $this->currentController = new $this->currentController;

      if(isset($url[1])){
        if(method_exists($this->currentController, $url[1])){
          $this->currentMethod = $url[1];
          unset($url[1]);
        }
      }

      //get parameters

      $this->params = $url ? array_values($url) : [];

      //call back with array of params
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }
    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');

        //not allowing characters which URL cannot have @,$
        $url = filter_var($url, FILTER_SANITIZE_URL);

        //breaking to an array
        $url = explode('/', $url);
        return $url;
      }
    }
  }