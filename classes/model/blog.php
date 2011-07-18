<?php

namespace Blog;


/**
 * Blog model.
 *
 * This model is not related to a database table. This is for installation 
 * purposes only. The only time this is used is during an installtion or
 * an update
 */
class Model_Blog extends \Model {

	/**
	 * Installtion method.
	 *
	 * The base controller automatically calls this function to check if the
	 * database has been setup properly to use the blog module. You should have
	 * no need of this function at all, since it's automatic.
	 *
	 * Usage:
	 * To have the database installed change the blog.php config file to have
	 * installed set to false. Be careful, as this function will delete any tables
	 * it finds in your database. So you only want to run this once. Once this has
	 * been run, set the value to true, and it will not be called again.
	 *
	 * @param boolean has this already been run?
	 */
	public static function install()
	{
		\DBUtil::drop_table('blog_posts');
		\DBUtil::drop_table('blog_tags');
		\DBUtil::drop_table('blog_comments');

		\DBUtil::create_table('blog_posts', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'title' => array('constraint' => 140, 'type' => 'varchar', 'null' => false),
			'slug' => array('constraint' => 60, 'type' => 'varchar', 'null' => false),
			'body' => array('type' => 'text', 'null' => false),
			'status' => array('constraint' => 1, 'type' => 'int', 'default' => 0),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	
		\DBUtil::create_table('blog_tags', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'post_id' => array('constraint' => 11, 'type' => 'int'),
			'title' => array('constraint' => 40, 'type' => 'varchar', 'null' => false),
		), array('id'));
	
		\DBUtil::create_table('blog_comments', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'post_id' => array('constraint' => 11, 'type' => 'int'),
			'body' => array('type' => 'text', 'null' => false),
			'status' => array('constraint' => 1, 'type' => 'int', 'default' => 0),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	
		// Insert Sample post data.
		\DB::insert('blog_posts')->set(array('title' => 'Post One', 'slug' => 'post-one', 'body' => 'This is the body', 'status' => 0, 'created_at' => time()))->execute();
		\DB::insert('blog_posts')->set(array('title' => 'Post Two', 'slug' => 'post-two', 'body' => 'This is the body', 'status' => 1, 'created_at' => time()))->execute();
		\DB::insert('blog_posts')->set(array('title' => 'Post Three', 'slug' => 'post-three', 'body' => 'This is the body', 'status' => 2, 'created_at' => time()))->execute();
		\DB::insert('blog_posts')->set(array('title' => 'Post Four', 'slug' => 'post-four', 'body' => 'This is the body', 'status' => 1, 'created_at' => time()))->execute();
		\DB::insert('blog_posts')->set(array('title' => 'Post Five', 'slug' => 'post-five', 'body' => 'This is the body', 'status' => 1, 'created_at' => time()))->execute();
		\DB::insert('blog_posts')->set(array('title' => 'Post Six', 'slug' => 'post-six', 'body' => 'This is the body', 'status' => 1, 'created_at' => time()))->execute();
	
		// Insert Sample tag data.
		\DB::insert('blog_tags')->set(array('post_id' => 1, 'title' => 'Tag One'))->execute();
		\DB::insert('blog_tags')->set(array('post_id' => 1, 'title' => 'Tag Two'))->execute();
		\DB::insert('blog_tags')->set(array('post_id' => 1, 'title' => 'Tag Three'))->execute();
		\DB::insert('blog_tags')->set(array('post_id' => 2, 'title' => 'Tag One'))->execute();
		\DB::insert('blog_tags')->set(array('post_id' => 3, 'title' => 'Tag One'))->execute();
		\DB::insert('blog_tags')->set(array('post_id' => 3, 'title' => 'Tag Four'))->execute();
		\DB::insert('blog_tags')->set(array('post_id' => 5, 'title' => 'Tag One'))->execute();
		\DB::insert('blog_tags')->set(array('post_id' => 6, 'title' => 'Tag Two'))->execute();
	}

	/**
	 * Updator method
	 *
	 * This method is used for update logic. I have no idea how this is to be used
	 * just now, but it will be utilized for version updates and most likely automatically
	 * applied.
	 */
	public static function update($version)
	{
		if ($version == '1.0.1') {
			// Run update
		}
	}
}

/* End of file: classes/model/post.php */