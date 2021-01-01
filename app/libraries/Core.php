<?php

// Core App Class
class Core {

    protected $currentController = 'DefaultController';
    protected $currentMethod = 'index';
    protected $params = [];

    /**
     * Core constructor.
     */
    public function __construct()
    {
        $url = $this->getUrl();
        $controllerName = $url[0];
        //Look in 'controllers' for first value. ucwords will capitalize first letter
        if (file_exists('../app/controllers/' . ucwords($controllerName) . 'Controller.php')) {
            // Will set a new controller
            $this->currentController = $controllerName;
            unset($controllerName);
        }

        // Require the controller
        require_once('../app/controllers/' . $this->currentController . '.php');
        $this->currentController = new $this->currentController;

        // Check for second part of the URL
        if (isset($url[1])) {
            $methodName = $url[1];
            if (method_exists($this->currentController, $methodName)) {
                $this->currentMethod = $methodName;
                unset($methodName);
            }
        }

        // Get parameters
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }


    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            // Allows you to filter variables as a sting/number
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Breaking it into an array
            $url = explode('/', $url);

            return $url;
        }
    }
}
