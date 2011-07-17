<?php

namespace Blog;

class Controller_Blog extends Controller_Base {

	public function action_index()
	{
		$this->template->content = \View::factory('blog/index');
	}

	public function action_view()
	{
		$this->template->content = \View::factory('blog/view');
	}
}

/* End of file: classes/controller/blog.php */