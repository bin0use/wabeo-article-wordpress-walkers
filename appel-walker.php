wp_nav_menu(
  array(
    'theme_location'  => 'menu_primaire', // identifiant du menu, défini dans functions.php
    'container'       => 'nav', // élément conteneur
    'container_class' => 'class_menu_primaire', // classe de cet élément
    'container_id'    => 'ID_menu_primaire', // ID de cet élément
    'menu_class'      => 'class_du_menu', // class du menu
    'menu_id'         => 'ID_du_menu', // ID du menu
    'echo'            => true, //true si on veut écrire le menu, false pour un simple return
    'fallback_cb'     => 'wp_page_menu', //fonction de substitution à utiliser si le menu n'existe pas
    'before'          => '', // texte à mettre devant le lien
    'after'           => '', // texte à mettre après le lien
    'link_before'     => '', // texte par lequel commence le lien
    'link_after'      => '', // texte par lequel termine le lien
    'items_wrap'      => '<ul id="\&quot;%1$s\&quot;" class="\&quot;%2$s\&quot;">%3$s</ul>', //défini la forme du menu (ul, ol, rien...)
    'depth'           => 0, // profondeur de menu admise (0 pour no-limit)
    'walker'          => new My_Walker() // C'EST CET ELEMENT QUI NOUS INTÉRESSE !!
  )
);
