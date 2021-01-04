<?php


class HomeController extends Controller {

    /**
     * HomeController constructor.
     */
    public function __construct()
    {

    }

    public function index()
    {
        $data = [
            'title' => 'Home Page',
            'name'  => 'home'
        ];
        $this->view('index', $data);
    }
}