<?php
class Controller
{
    function __construct()
    {    
        require_once('model.php');
		$this->model=new Model();
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
            case 'gallery':
                {
                    $coffeeImages = $this->model->getGallery();
                    include('html/gallery.php');
                    break;
                }
            case 'addBooks':
                {
                    include('html/addBooks.php');
                    break;
                }

            case 'products':
                {
                    $searchInput = isset($_POST['searchInput']) ? trim($_POST['searchInput']) : '';
                    $books = $this->model->getBookList($searchInput); 
                    
                    include('html/coffee_products.php');
                    break;
                }

            case 'viewProduct':
                if (isset($_GET['coffee_id'])) {
                    $coffee_id = $_GET['coffee_id'];
                    $coffeeDetails = $this->model->getBookDet($coffee_id);
                    include('html/view_product.php');
                } else {
                    echo "No Coffee ID provided.";
                }
                break;

            case 'deleteRec':
                {
                    $coffee_id = $_REQUEST['coffee_id'];
                
                    $result = $this->model->deleteRecord($coffee_id);
                    echo "<script> alert ('" . $result . "')
                            window.location.href='index.php?command=products'
                            </script>";
                    break;
                }
                
            case 'insertBooks'://Insert Books
                {
                    $coffee_id=$_REQUEST['ID'];
                    $name=$_REQUEST['Name'];
                    $description=$_REQUEST['Description'];
                    $sugar_level=$_REQUEST['Sugar'];
                    $roast_level=$_REQUEST['Roast'];
                    $caffeine_content=$_REQUEST['Caffeine'];
                    $category=$_REQUEST['Category'];
                    $ingredients=$_REQUEST['Ingredients'];
                    
                    $imageUpload=basename($_FILES["fileToUpload"]["name"]);
    
                    $imagePath="uploads/". $imageUpload;
    
                    $imageFileType = strtolower(pathinfo($imagePath,PATHINFO_EXTENSION));
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    
                    $err=$this->model->checkImageUpload($check,$imageFileType,$imagePath);
                    

                    if($err=="OK")
                    {
                        $result=$this->model->insertBook($coffee_id,$name,$description,$sugar_level,$roast_level,$caffeine_content,$category,$ingredients,$imagePath);
                        echo '<script> alert ("'.$result.'")</script>';
                        
                        include 'html/addBooks.php';
                    }
                    else
                    {
                        echo '<script> alert ("'.$err.'")</script>';
                    }											
                    break;
                    
                }

            case 'editBooks':
                {
                    $CoffeeId=$_REQUEST['coffee_id'];              
                    $coffeeRecord=$this->model->searchBook($CoffeeId);
                    
                    include 'html/edit.php';				
                    break;
                }
                
                
            case 'updateRec':
                {
                    $coffee_id = $_REQUEST['ID'];
                    $name = $_REQUEST['Name'];
                    $description = $_REQUEST['Description'];
                    $sugar_level = $_REQUEST['Sugar'];
                    $roast_level = $_REQUEST['Roast'];
                    $caffeine_content = $_REQUEST['Caffeine'];
                    $category = $_REQUEST['Category'];
                    $ingredients = $_REQUEST['Ingredients'];
                    $imagePath = null;
                
                    if (!empty($_FILES["fileToUpload"]["name"])) {
                        // If a new image is uploaded
                        $imageUpload = basename($_FILES["fileToUpload"]["name"]);
                        $imagePath = "uploads/" . $imageUpload;
                        $imageFileType = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));
                        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                
                        $err = $this->model->checkImageUpload($check, $imageFileType, $imagePath);
                
                        if ($err !== "OK") {
                            echo '<script> alert ("' . $err . '")</script>';
                            break;
                        }
                    }
                
                    $result = $this->model->updateRecords($coffee_id, $name, $description, $sugar_level, $roast_level, $caffeine_content, $category, $ingredients, $imagePath);
                
                    echo "<script> alert ('" . $result . "')
                        window.location.href='index.php?command=products'
                    </script>";
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
