<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books 1</title>
    <link rel="stylesheet" href="css/viewbook.css">
</head>

<body>
<section class="coffee_products">
    <table>
        <thead>
            <tr>
                <th width="18%" align="center">Coffee Name</th>
                <th width="15%" align="center">Caffeine Content</th>
                <th width="12%" align="center">Category</th>
                <th width="20%" align="center">Ingredients</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th width="18%" align="center">Crochet Name</th>
                <th width="15%" align="center">Caffeine Content</th>
                <th width="12%" align="center">Category</th>
                <th width="20%" align="center">Ingredients</th>
            </tr>
        </tfoot>
        <tbody>
            <?php
                foreach($books as $title=>$MybookList) {
                    echo "<tr>";
                        echo "<td><a href='index.php?command=viewProduct&coffee_id=" . $MybookList->coffee_id . "'>" . $MybookList->name . "</a></td>";
                        echo "<td>". $MybookList->caffeine_content ."</td>";
                        echo "<td>". $MybookList->category ."</td>";    
                        echo "<td>". $MybookList->ingredients ."</td>";                                    
                        echo "<td><a href='index.php?command=editBooks&&coffee_id=".$MybookList->coffee_id."'>Edit</a> |
                                 <a href='index.php?command=deleteRec&&coffee_id=".$MybookList->coffee_id."' onclick='return confirm(\"Are you sure you want to do Delete this record?\")'>Delete</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</section>
</body>
</html>
