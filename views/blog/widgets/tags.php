<section class="widget blog-widget">
	<h3>Tags</h3>
	<ul>
<?php foreach ($tags as $tag) : ?>
		<li><?php echo \Html::anchor('blog/tag/'.urlencode($tag->title), $tag->title) ?></li>
<?php endforeach ?>
	</ul>
</section>