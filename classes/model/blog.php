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
			'body' => array('type' => 'text', 'null' => false),
			'status' => array('constraint' => 1, 'type' => 'int', 'default' => 0),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	
		\DBUtil::create_table('blog_tags', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'post_id' => array('constraint' => 11, 'type' => 'int'),
			'title' => array('constraint' => 140, 'type' => 'varchar', 'null' => false),
		), array('id'));
	
		\DBUtil::create_table('blog_comments', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'post_id' => array('constraint' => 11, 'type' => 'int'),
			'body' => array('type' => 'text', 'null' => false),
			'status' => array('constraint' => 1, 'type' => 'int', 'default' => 0),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	
		// Insert Sample data.
		\DB::insert('blog_posts')->set(array('title' => 'Post One', 'body' => 'This is the body', 'status' => 0, 'created_at' => time()))->execute();
		\DB::insert('blog_posts')->set(array('title' => 'Post Two', 'body' => 'This is the body', 'status' => 1, 'created_at' => time()))->execute();
		\DB::insert('blog_posts')->set(array('title' => 'Post Three', 'body' => 'This is the body', 'status' => 2, 'created_at' => time()))->execute();
		\DB::insert('blog_posts')->set(array('title' => 'Post Four', 'body' => 'This is the body', 'status' => 1, 'created_at' => time()))->execute();
		\DB::insert('blog_posts')->set(array('title' => 'Post Five', 'body' => 'This is the body', 'status' => 1, 'created_at' => time()))->execute();
		\DB::insert('blog_posts')->set(array('title' => 'Post Six', 'body' => 'This is the body', 'status' => 1, 'created_at' => time()))->execute();
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