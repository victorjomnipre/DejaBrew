<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Books</title>
    <link rel="stylesheet" href="css/edit.css">
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
    <section class="editPage">
        <form action='index.php?command=updateRec' method='post' enctype='multipart/form-data' class="edit-form">
            <h2>Edit Coffee Details</h2>
            
            <label for="coffee-id">Coffee ID:</label>
            <input type='text' name='ID' id="coffee-id" value='<?php echo $coffeeRecord[0]->coffee_id ?>'>
            
            <label for="coffee-name">Coffee Name:</label>
            <input type='text' name='Name' id="coffee-name" value='<?php echo $coffeeRecord[0]->name ?>'>
            
            <div class="image-preview-section">
                <h3>Please upload coffee photo:</h3>
                <img src='<?php echo $coffeeRecord[0]->images ?>' id="previewImage" alt='Coffee Image' class="preview-image">
            </div>
            
            <label for="fileToUpload" class="custom-file-button">Upload Cover Page</label>
            <input type="file" name="fileToUpload" id="fileToUpload" onchange="imagePreview(event)" accept="image/*">
            
            <label for="description">Coffee Description:</label>
            <textarea name='Description' id="description" cols="45" rows="5"><?php echo $coffeeRecord[0]->description ?></textarea>
            
            <label for="sugar-level">Sugar Level:</label>
            <input type='text' name='Sugar' id="sugar-level" value='<?php echo $coffeeRecord[0]->sugar_level ?>'>
            
            <label for="roast-level">Roast Level:</label>
            <input type='text' name='Roast' id="roast-level" value='<?php echo $coffeeRecord[0]->roast_level ?>'>
            
            <label for="caffeine-content">Caffeine Content:</label>
            <input type='text' name='Caffeine' id="caffeine-content" value='<?php echo $coffeeRecord[0]->caffeine_content ?>'>
            
            <label for="category">Category:</label>
            <input type='text' name='Category' id="category" value='<?php echo $coffeeRecord[0]->category ?>'>
            
            <label for="ingredients">Ingredients:</label>
            <textarea name='Ingredients' id="ingredients" cols="45" rows="3"><?php echo $coffeeRecord[0]->ingredients ?></textarea>
            
            <div class="form-buttons">
                <input type='submit' value='Update Records' name='saveRecords'>
                <input type='reset' value='Reset'>
            </div>
        </form>
    </section>
</body>
</html>
