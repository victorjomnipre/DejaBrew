<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Coffee</title>
    <link rel="stylesheet" href="css/addBooks.css">
    <script type="text/javascript">
        function imagePreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("previewImage");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
</head>
<body>
	<section class="addingPage">
		<form action="index.php?command=insertBooks" method="post" enctype="multipart/form-data">
			<table class="form-table" align="center">
				<tr>
					<td><label for="ID">Coffee ID:</label></td>
					<td><input type="text" name="ID" id="ID"></td>
				</tr>
				<tr>
					<td><label for="Name">Coffee Name:</label></td>
					<td><input type="text" name="Name" id="Name"></td>
				</tr>
				<tr>
					<td colspan="2" class="form-subheading">Please upload a product picture</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<img src="uploads/preview.jpg" id="previewImage" alt="Preview" width="300" height="300">
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<label for="fileToUpload" class="custom-file-button">Upload Photo</label>
						<input type="file" name="fileToUpload" id="fileToUpload" onchange="imagePreview(event)" accept="image/*">
					</td>
				</tr>
				<tr>
					<td><label for="Description">Description:</label></td>
					<td><input type="text" name="Description" id="Description"></td>
				</tr>
				<tr>
					<td><label for="Sugar">Sugar Level:</label></td>
					<td><input type="text" name="Sugar" id="Sugar"></td>
				</tr>
				<tr>
					<td><label for="Roast">Roast Level:</label></td>
					<td><input type="text" name="Roast" id="Roast"></td>
				</tr>
				<tr>
					<td><label for="Caffeine">Caffeine Content:</label></td>
					<td><input type="text" name="Caffeine" id="Caffeine"></td>
				</tr>
				<tr>
					<td><label for="Category">Category:</label></td>
					<td><input type="text" name="Category" id="Category"></td>
				</tr>
				<tr>
					<td><label for="Ingredients">Ingredients:</label></td>
					<td><input type="text" name="Ingredients" id="Ingredients"></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<button type="submit" name="saveRecords" class="submit-button">Save Records</button>
						<button type="reset" class="reset-button">Reset</button>
					</td>
				</tr>
			</table>
		</form>
	</sectio>

</body>
</html>
