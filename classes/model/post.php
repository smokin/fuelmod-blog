<?php

namespace Blog;

class Model_Post extends \Model {

	public static function find($id)
	{
		if ($id == 'all')
		{
			return static::_query()->execute()->as_array();
		}

		return static::_query()->where('id', $id)->execute()->current();
	}
	
	public static function get()
	{
		return static::_query();
	}

	private static function _query()
	{
		return \DB::select('*')->from('blog_posts')->as_object();
	}

}

/* End of file: classes/model/post.php */