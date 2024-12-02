<?php
class Model
{
	public $db=null;
	function __construct()
	{
		try
		{
			$this->db = new mysqli('localhost', 'root', '', 'dejadb');
		}
		catch(mysqli_sql_exception $e)
		{
			exit('Database connection could not be established.');
		}

	}
	public function getBookList($searchInput = '') 
		{
			$data = array();
			
			$coffeeName = mysqli_real_escape_string($this->db, trim($searchInput));
			if ($searchInput === '') {
				$queryGetBooks = mysqli_query($this->db, "SELECT * FROM coffees");
			} else {
				$queryGetBooks = mysqli_query($this->db, "SELECT * FROM coffees WHERE name LIKE '%$searchInput%' 
																		OR ingredients LIKE '%$searchInput%'
																		OR sugar_level LIKE '%$searchInput%'");
			}

			while ($getRow = mysqli_fetch_object($queryGetBooks)) {        
				$data[] = $getRow;
			}
			return $data;     
		}

	public function getBookDet($coffee_id)
		{
			$data = array();
	
			$stmt = $this->db->prepare("SELECT * FROM coffees WHERE coffee_id = ?");
			$stmt->bind_param("s", $coffee_id);
			$stmt->execute();
			$result = $stmt->get_result();
	
			if ($getRow = $result->fetch_object()) {
				$data = $getRow;
			}
	
			$stmt->close();
			return $data;
		}

	public function getGallery() 
	    {
	        $data = array();

			$queryGetImages = mysqli_query($this->db,"SELECT * from coffees");

			while($getRow=mysqli_fetch_object($queryGetImages))    		
			{    			
			  $data[] = $getRow;
			}
			return $data;     
	    }

	public function deleteRecord($coffee_id)
		{
			// Fetch the associated image file
			$queryGetImage = mysqli_query($this->db, "SELECT images FROM coffees WHERE coffee_id='$coffee_id'");
			if ($getRow = mysqli_fetch_object($queryGetImage)) {
				$imagePath = $getRow->images;
				if (file_exists($imagePath)) {
					unlink($imagePath);
				}
			}
		
			$deleteQuery = "DELETE FROM coffees WHERE coffee_id='$coffee_id'";
			$result = mysqli_query($this->db, $deleteQuery);
		
			if (!$result) {
				return mysqli_error($this->db);
			} else {
				return "Record Deleted";
			}
		}

	public function checkImageUpload($imageSize,$imageFileType,$target_file)
		{
			$uploadOk = 1;
			$errMsg="1";

				if($imageSize !== false) 
				{				
					// Check if file already exists
					$uploadOk = 1;
					if (file_exists($target_file)) 
					{
						$errMsg= "Sorry, file already exists.";
						$uploadOk = 0;
					}
					else
					{
						// Check file size
						
						if ($_FILES["fileToUpload"]["size"] > 5000000) 
						{
							var_dump($imageSize);
							$errMsg= "Sorry, your file is too large.";
							$uploadOk = 0;
						}
						// check certain file formats
						else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
							&& $imageFileType != "gif" ) 
						{
							$errMsg= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
							$uploadOk = 0;
						}					
					}
				} 
				else 
				{
					$errMsg= "File is not an image.";
					$uploadOk = 0;
				}
	
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) 
				{
					$errMsg= $errMsg;
				
				} 
				else // if everything is ok, try to upload file
				{
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
					{
						$errMsg= "OK";
						
					} 
					else 
					{
						$errMsg= "Sorry, there was an error uploading your file.";
					}
				}		
			return $errMsg;
		}
		//------------------------------------------------------------------------------------------------
	public function insertBook($coffee_id,$name,$description,$sugar_level,$roast_level,$caffeine_content,$category,$ingredients,$images)
		{
			$insertQuery="INSERT into coffees(coffee_id,name,description,sugar_level,roast_level,caffeine_content,category,ingredients,Images)
												values('$coffee_id','$name','$description','$sugar_level','$roast_level','$caffeine_content',
												'$category','$ingredients','$images')";
			
			$result = mysqli_query($this->db,$insertQuery);
			
			if(!$result)
				return mysqli_error($this->db);
			else
				return "Record Save";
		}
	
	public function searchBook($coffee_id)
		{
			$data = array();

			$queryGetCoffee = mysqli_query($this->db,"SELECT * from coffees where coffee_id='".$coffee_id."'");

			while($getRow=mysqli_fetch_object($queryGetCoffee))    		
			{    			
			$data[] = $getRow;
			}
			return $data;  
		}
		
	public function updateRecords($coffee_id, $name, $description, $sugar_level, $roast_level, $caffeine_content, $category, $ingredients, $images = null)
		{
			$updateQuery = "UPDATE coffees SET ";
		
			$updates = [];
			if (!empty($name)) $updates[] = "name='$name'";
			if (!empty($description)) $updates[] = "description='$description'";
			if (!empty($sugar_level)) $updates[] = "sugar_level='$sugar_level'";
			if (!empty($roast_level)) $updates[] = "roast_level='$roast_level'";
			if (!empty($caffeine_content)) $updates[] = "caffeine_content='$caffeine_content'";
			if (!empty($category)) $updates[] = "category='$category'";
			if (!empty($ingredients)) $updates[] = "ingredients='$ingredients'";
			if (!empty($images)) {
				$queryGetImage = mysqli_query($this->db, "SELECT images FROM coffees WHERE coffee_id='$coffee_id'");
				if ($getRow = mysqli_fetch_object($queryGetImage)) {
					$oldImagePath = $getRow->images;
					if (file_exists($oldImagePath)) {
						unlink($oldImagePath); // Delete the old image file
					}
				}
		
				$updates[] = "images='$images'";
			}
		
			// Combine updates and finalize query
			$updateQuery .= implode(", ", $updates) . " WHERE coffee_id='$coffee_id'";
			$result = mysqli_query($this->db, $updateQuery);
		
			if (!$result) {
				return mysqli_error($this->db);
			} else {
				return "Record Updated";
			}
		}
		
}		
?>