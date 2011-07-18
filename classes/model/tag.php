<?php

namespace Blog;

class Model_Tag extends \Model {

	public static function list_distinct()
	{
		return \DB::select('title')
			->distinct(true)
			->from('blog_tags')
			->as_object()
			->execute()
			->as_array();
	}
	
	public static function count($tag)
	{
		$result = \DB::select(\DB::expr('COUNT(*) as count'))
			->from('blog_tags')
			->where('title', $tag)
			->execute()
			->current();

		return $result['count'];
	}
	
	public static function get_posts_ids($tag)
	{
		return \DB::select('post_id')
			->from('blog_tags')
			->distinct(true)
			->where('title', $tag)
			->as_object()
			->execute()
			->as_array();
	}
	
	public static function get()
	{
		return static::_query();
	}
	
	private static function _query()
	{
		\DB::select('*')->from('blog_tags')->as_object();
	}

}

/* End of file: classes/model/tag.php */