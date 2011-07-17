<html>
<head>
	<title><?php echo \Config::get('blog.title', 'FuelPHP Blog Module') ?></title>
</head>
<body>

<div class="blog-<?php echo $method ?>">
<?php echo \Html::anchor('blog', 'Blog') ?> 
<?php echo $content ?> 
</div>
<div class="blog-sidebar">
	<?php echo Blog\Widget::get('blog/widget_latest_posts/4') ?>
</div>

</body>
</html>