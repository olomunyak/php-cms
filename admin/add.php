<?php

session_start();

include_once('../includes/connection.php');
include_once('../includes/article.php');

$article = new Article;

if (isset($_SESSION['logged_in'])) {
	if(isset($_POST['title'], $_POST['content'])) {
		$title = $_POST['title'];
		$content = $_POST['content'];

		if (empty($title) or empty($content)) {
			$error = 'All fields are required!';
		} else {

			$article->add_data($title, $content);

			header('Location: index.php');
		}
	}
	?>

		<html>
			<head>
				<title>CMS Tutorial</title>
				<link rel="stylesheet" href="../assets/style.css" />
			</head>

			<body>
				<div class="container">
					<a href="index.php" id="logo">CMS</a>

					<br />

					<h4>Add Article</h4>

					<?php if (isset($error)) { ?>
						<small style="color:#aa0000;"><?php echo $error; ?>
						<br /><br />
					<?php } ?>

					<form action="add.php" method="post" autocomplete="off">
						<input type="text" name="title" placeholder="Title" /><br /><br />
						<textarea rows="15" cols="50" placeholder="Content" name="content"></textarea><br /><br />
						<input type="submit" value="Add Article" />

					</form>
				</div>
			</body>
		</html>		


	<?php
} else {
	header('Location: index.php');
}

?>