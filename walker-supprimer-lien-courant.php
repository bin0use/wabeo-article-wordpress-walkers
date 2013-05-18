// MODIF 1
// $balise = a seulement si il y a un lien et que ce n'est pas une ancre
// $balise = a si current-menu-item n'est pas dans les classes
$balise = ( ! empty( $item->url ) && substr( $item->url, 0, 1 ) != '#' && ! in_array( 'current-menu-item', $classes ) ) ? 'a' : 'span';