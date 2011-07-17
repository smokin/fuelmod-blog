<?php if (count($posts) == 0) : ?>
	<div class="no-posts">
		<p>There are no posts to display.</p>
	</div>
<?php else : ?>
	<?php foreach ($posts as $post) : ?>
	<div class="post">
		<?php echo \Html::anchor('blog/'.$post->slug, \Html::h($post->title, 3)) ?> 
		<?php echo $post->body ?> 
	</div>
	<?php endforeach ?>
<?php endif ?>
<div class="pagination">
	<?php echo $pagination ?> 
</div>