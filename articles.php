<?php
	require_once 'configDb.php';


	$query = "SELECT * FROM cat_news";

	$result1 = mysqli_query($db, $query);
	$cat_news = [];
	while($cat1 = mysqli_fetch_assoc($result1)) {
		$cat_news[] = $cat1;
	}
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
			<?php echo "<li><a href='articles-cat.php?id=".$category['id']."'>" . $category['title'] . "</a></li>";?>

		<?php endforeach;?>
	</table>



</div>

</body>
</html>