<?php  
Class Controler {
    public function index() {

        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);

        switch ($page) {
            case ($page === "contact"):
                require "View/contact.php";
                break;

            case ($page === "aboutus"):
                require "View/aboutus.php";
                break;

            case ($page === "signin"):
                require "View/signin.php";
                break;
            case ($page === "cartshow"):
                require "View/cartshow.php";
                break;
                
            case ($page === "businessadd"):
                $data->cartsshow('airline');
                require "View/cartshow.php";
                break;
        }
    }
}

            