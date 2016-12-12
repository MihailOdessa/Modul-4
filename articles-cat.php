<?php
require_once 'configDb.php';


$query = "SELECT * FROM news";

$result1 = mysqli_query($db, $query);
$cat_news = [];
while($cat1 = mysqli_fetch_assoc($result1)) {
    if($cat1['id_cat_news'] == $_GET['id']) continue;
    $cat_news[] = $cat1;}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Одесские новости</title>
</head>
<body>
<div class="container">

    <table class="table">

        <?php foreach($cat_news as $category) : ?>
            			<tr>
            				<td><?= $category['title'] ?></td>
            			</tr>

        <?php endforeach;?>


    </table>
</div>

</body>
</html>