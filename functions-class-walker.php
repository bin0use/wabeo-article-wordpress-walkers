class My_Walker extends Walker_Nav_Menu {
  function start_lvl( &$output, $depth, $args ) {
    // $output correspond à la variable retournée en fin de walker
    // $depth correspond à la profondeur du niveau
    // $arg aux variable supplémentaires
  }
  function start_el( &$output, $item, $depth, $args ) {
    // $output correspond à la variable retournée en fin de walker
    // $item correspond aux information sur l'item en cours
    // $depth correspond à la profondeur du niveau
    // $arg aux variable supplémentaires
  }
  function end_el( &$output, $item, $depth, $args ) {
    // $output correspond à la variable retournée en fin de walker
    // $item correspond aux information sur l'item en cours
    // $depth correspond à la profondeur du niveau
    // $arg aux variable supplémentaires
  }
  function end_lvl( &$output, $depth, $args ) {
    // $output correspond à la variable retournée en fin de walker
    // $depth correspond à la profondeur du niveau
    // $arg aux variable supplémentaires
  }
}