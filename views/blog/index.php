<?php if (count($posts) == 0) : ?>
	<article class="no-posts">
		<p>There are no posts to display.</p>
	</article>
<?php else : ?>
	<?php foreach ($posts as $post) : ?>
	<article class="post">
		<?php echo \Html::anchor('blog/view/'.$post->id, \Html::h($post->title, 3)) ?> 
		<?php echo $post->body ?> 
	</article>
	<?php endforeach ?>
<?php endif ?>