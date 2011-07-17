<section class="widget blog-widget">
	<h3>Recent Posts</h3>
	<ul>
<?php foreach ($posts as $post) : ?>
		<li><?php echo \Html::anchor('blog/'.$post->slug, $post->title) ?></li>
<?php endforeach ?>
	</ul>
</section>