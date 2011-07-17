<?php

namespace Blog;

class Controller_Blog extends Controller_Base {

	public function action_index()
	{
		$posts = Model_Post::find('all');

		$this->template->content = \View::factory('blog/index', array('posts' => $posts));
	}

	public function action_view($id = null)
	{
		$id and $post = Model_Post::find($id);

		$this->template->content = \View::factory('blog/view', array('post' => $post));
	}

	public function action_widget_latest_posts($amount = 6)
	{
		$posts = Model_Post::get()->limit($amount)->execute()->as_array();
		
		$this->response->body = \View::factory('blog/widgets/latest_posts', array('posts' => $posts));
	}
}

/* End of file: classes/controller/blog.php */