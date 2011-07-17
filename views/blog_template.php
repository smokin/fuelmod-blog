<html>
<head>
	<title><?php echo $site['title'] ?></title>
	
	<style type="text/css">
	* { margin: 0; padding: 0; }
	body { text-align: center; }
	.wrapper { margin: 0 auto; width: 960px; text-align: left; }
	.blog .content { width: 700px; float: left; }
	.blog .sidebar { width: 260px; float: right; }
	</style>
</head>
<body>
<div class="wrapper blog">
<div class="nav"><?php echo \Html::anchor('blog', 'Blog') ?> </div>
<div class="content <?php echo $method ?>">
<?php echo $content ?> 
</div>
<div class="sidebar">
	<?php echo Blog\Widget::get('blog/widget_latest_posts/4') ?>
</div>
</div>

</body>
</html>