<?php

return array(
	'blog/index' => 'blog',
	'blog/index/(:any)' => 'blog/index/$1',
	'blog/tag/(:any)' => 'blog/tag/$1',
	'blog/view/(:any)' => 'blog/view/$1',

	'blog/(:any)' => 'blog/view/$1',
);

/* End of file config/routes.php */