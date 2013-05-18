$item_output .= wp_list_categories(
		array(
			'taxonomy'     => $taxo,
			'echo'         => 0,
			'title_li'     => '',
			'hierarchical' => 1,
			'walker'       => new Walker_into_walker()
		)
	);