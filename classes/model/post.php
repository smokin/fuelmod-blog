<?php

namespace Blog;

class Model_Post extends \Model {

	public static function get_by_id_or_slug($id)
	{
		$query = null;

		if (is_numeric($id))
		{
			$query = static::get()->where('id', $id);
		}
		else
		{
			$query = static::get()->where('slug', $id);
		}
		
		return $query->execute()->current();
	}
	
	public static function get_with_pagination()
	{
		return static::get()
			->limit(\Pagination::$per_page)
			->offset(\Pagination::$offset)
			->order_by('id', 'asc')
			->execute()
			->as_array();
	}
	
	public static function count()
	{
		$result = \DB::select(\DB::expr('COUNT(*) as count'))->from('blog_posts')->execute()->current();

		return $result['count'];
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