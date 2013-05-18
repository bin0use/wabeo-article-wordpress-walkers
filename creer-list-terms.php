function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

    $output .= $indent . '<li' . $id . $value . $class_names .'>';

    // MODIF 1
    // $balise = a seulement si il y a un lien et que ce n'est pas une ancre
    // $balise = a si current-menu-item n'est pas dans les classes
    $balise = ( ! empty( $item->url ) && substr( $item->url, 0, 1 ) != '#' && ! in_array( 'current-menu-item', $classes ) ) ? 'a' : 'span';

    $atts = array();
    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
    $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';

    // MODIF 2 : on n'ajout l'URL seulent si c'est un lien
    if( 'a' == $balise )
        $atts['href']   = ! empty( $item->url ) ? $item->url : '';

    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

    $attributes = '';
    foreach ( $atts as $attr => $value ) {
        if ( ! empty( $value ) ) {
            $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
            $attributes .= ' ' . $attr . '="' . $value . '"';
        }
    }

    // MODIF 3 : on remplace 'a' par $balise
    $item_output = $args->before;
    $item_output .= '<' . $balise . ''. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</' . $balise . '>';
    $item_output .= $args->after;

    // MODIF 4
    // si cet élément a une classe menu-taxonomylist...
    // on récupère le XFN (correspondant à la taxonomie souhaité)...
    // on conçoit alors une liste des terms disponibles :-)
    if( in_array( 'menu-taxonomylist', $classes ) ) {
        $item_output .= '<ul>';
        $taxo = ! empty( $item->xfn ) ? $item->xfn : 'category'; 
        $item_output .= wp_list_categories(
            array(
                'taxonomy'     => $taxo,
                'echo'         => 0,
                'title_li'     => '',
                'hierarchical' => 1
                )
            );
        $item_output .= '</ul>';
    } 

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}