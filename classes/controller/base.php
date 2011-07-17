<?php

namespace Blog;

/**
 * Base controller class for blog module.
 *
 * This class is the foundation for all blog module controllers
 * it provides reusable functions as well as the pre and post action
 * call functionality.
 */
class Controller_Base extends \Controller_Template {

	/**
	 * @var string name of page template
	 */ 
	public $template = 'blog_template';
	
	/**
	 * @var boolean auto render template?
	 */
	public $auto_render = true;

	/**
	 * The before method
	 *
	 * The before method is called by the \Request class before a
	 * controller method is executed. Allowing you to do such things
	 * as setup themes, check for authentication, or add variables
	 * controller-wide (or extended controllers for that matter).
	 */
	public function before()
	{
		// Load blog configuration
		\Config::load('blog', true);

		// Check install status and run updater
		if ( ! \Config::get('blog.installed', true))
		{
			Model_Blog::install();
		}

		parent::before();
		
		// Add some variables to views
		$this->template->method = \Request::active()->route->action;
		
		return;
	}
	
	/**
	 * The after method
	 *
	 * The after method is called by the \Request class after a
	 * controller method is executed. This allows you to do such things
	 * as close a database connection, render statistics, or even
	 * alter the page output.
	 */
	public function after()
	{
		return parent::after();
	}
}

/* End of file: classes/controller/base.php */

