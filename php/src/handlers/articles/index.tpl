<!--doctype HTML-->
<html>
<head>
	<meta charset="utf-8">
	<title>Внемли</title>
</head>
<body>
	<?php foreach ($articles as $article): ?>

		<article>
			<?php echo $article['html'] ?>
		</article>

	<?php endforeach ?>
</body>
</html>