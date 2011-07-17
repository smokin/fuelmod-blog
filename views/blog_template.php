<section class="blog-<?php echo $method ?>">
<?php echo $content ?> 
</section>
<section class="blog-sidebar">
	<?php echo \Request::factory('blog/blog/widget_latest_posts/4', false)->execute() ?>
</section>