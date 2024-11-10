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
	public function getBookList() 
	    {
	        $data = array();

			$queryGetBooks = mysqli_query($this->db,"SELECT * from coffees");

			while($getRow=mysqli_fetch_object($queryGetBooks))    		
			{    			
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

	public function deleteRecord($coffee_id)
		{
			$deleteQuery="DELETE from coffees where coffee_id=$coffee_id";
			
			$result = mysqli_query($this->db,$deleteQuery);
			
			if(!$result)
				return mysqli_error($this->db);
			else
				return "Record Deleted";
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
												values('$coffee_id','$name','$description','$sugar_level','$roast_level','$caffeine_content','$category','$ingredients','$images')";
			
			$result = mysqli_query($this->db,$insertQuery);
			
			if(!$result)
				return mysqli_error($this->db);
			else
				return "Record Save";
		}
}