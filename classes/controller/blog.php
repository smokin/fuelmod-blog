<?php

namespace Blog;

class Controller_Blog extends Controller_Base {

	// -----------------------------------------------------------
	//  Actions
	// -----------------------------------------------------------

	/**
	 * List blog posts, with pagination
	 */
	public function action_index($offset = 0)
	{
		\Pagination::set_config(array(
			'pagination_url' => \URI::create('blog/index'),
			'total_items'    => Model_Post::count(),
			'per_page'       => \Config::get('blog.pagination.per_page', 6),
			'uri_segment'    => 3,
		));

		$posts = Model_Post::get_with_pagination();
		$data = array('posts' => $posts, 'pagination' => \Pagination::create_links());

		$this->template->content = \View::factory('blog/index', $data, false);
	}

	/**
	 * View a single blog post
	 *
	 * @param integer|string id or slug of blog post
	 */
	public function action_view($id = null)
	{
		$id and $post = Model_Post::get_by_id_or_slug($id);

		$this->template->content = \View::factory('blog/view', array('post' => $post));
	}


	// -----------------------------------------------------------
	//  Widgets
	// -----------------------------------------------------------

	public function action_widget_latest_posts($amount = 6)
	{
		$posts = Model_Post::get()->limit($amount)->execute()->as_array();
		
		$this->response->body = \View::factory('blog/widgets/latest_posts', array('posts' => $posts));
	}
}

/* End of file: classes/controller/blog.php */