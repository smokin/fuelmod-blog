<?php

namespace Blog;

/**
 * Widget class
 *
 * This is a helper class to be used in either views or controllers. It
 * is meant to provide an easier interface to coding HVMC (widget) calls
 * so you don't have to type out or completely understand the \Request
 * functionality.
 */
class Widget {

	/**
	 * Get widget
	 *
	 * Get the widget requested using the URI as a way to set your
	 * options and call the controllers action method.
	 *
	 * @param string resource URI and params
	 */
	public static function get($path)
	{
		return \Request::factory('blog/'.$path, false)->execute();
	}

}

/* End of file: classes/widget.php */