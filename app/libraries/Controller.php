<?php

// Load the model and the view
class Controller {

    public function loadModel($model)
    {
        // Require model file
        require_once('../app/models/' . $model . '.php');

        // Instantiate model
        return new $model();
    }

    // Load the view (checks for the file)
    public function view($view, $data = [])
    {
        // Require the views
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once('../app/views/' . $view . '.php');
        } else {
            require_once('../app/views/_common/404.php');
            die();
        }

    }
}