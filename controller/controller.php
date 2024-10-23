<?php
class Controller
{
    function __construct()
    {    
		   
    }

    public function getWeb()
    {       
        $command = null;

        if (isset($_REQUEST['command'])) {
            $command = $_REQUEST['command'];
        }

        switch ($command) {
            case 'about':
			{
                include('html/about_page.html');
                break;
			}
            case 'products':
                {
                    include('html/coffee_products.php');
                    break;
                }

            case 'home':
            default:
			{
                include('html/home_page.html');
                break;
			}
        }
    }
}
