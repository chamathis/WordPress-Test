<?php
// Films Post Type 
function films_post_type() {
  $labels = array(
    'name'               => _x( 'Films', 'post type general name' ),
    'singular_name'      => _x( 'Film', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'film' ),
    'add_new_item'       => __( 'Add New Film' ),
    'edit_item'          => __( 'Edit Film' ),
    'new_item'           => __( 'New Film' ),
    'all_items'          => __( 'All Films' ),
    'view_item'          => __( 'View Film' ),
    'search_items'       => __( 'Search Films' ),
    'not_found'          => __( 'No films found' ),
    'not_found_in_trash' => __( 'No films found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Films'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Film Manager',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type('film', $args); 
}
add_action( 'init', 'films_post_type');


// Films Taxonomies
function films_categories() {
  $labels = array(
    'name'              => _x( 'Film Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Film Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Film Categories' ),
    'all_items'         => __( 'All Film Categories' ),
    'parent_item'       => __( 'Parent Film Category' ),
    'parent_item_colon' => __( 'Parent Film Category:' ),
    'edit_item'         => __( 'Edit Film Category' ), 
    'update_item'       => __( 'Update Film Category' ),
    'add_new_item'      => __( 'Add New Film Category' ),
    'new_item_name'     => __( 'New Film Category' ),
    'menu_name'         => __( 'Film Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'film_category', 'film', $args );
}
add_action( 'init', 'films_categories', 0 );

//Custom Fields for Price and Release Date
add_action( 'add_meta_boxes', 'film_more_attr' );
function film_more_attr(){
    add_meta_box( 'film_more_attr', 'Film Ticket Price', 'film_more_attr_box', 'film', 'normal', 'high' );
}
function film_more_attr_box(){
    $customFilmAttrs = get_post_custom( $post->ID );
    $ticketPrice = isset( $customFilmAttrs['film_ticket_price'] ) ? esc_attr( $customFilmAttrs['film_ticket_price'][0] ) : "";
    $releaseDate = isset( $customFilmAttrs['film_release_date'] ) ? esc_attr( $customFilmAttrs['film_release_date'][0] ) : "";
    
    echo '<label for="film_ticket_price">Ticket Price</label>
    <input type="text" name="film_ticket_price" id="film_ticket_price" value="'.$ticketPrice.'"/><br><br>'; 
    
    echo '<label for="film_release_date">Film Release Date</label>
    <input type="date" name="film_release_date" id="film_release_date" value="'.$releaseDate.'"/>';   
}

add_action( 'save_post', 'save_custom_attrs' );
function save_custom_attrs( $post_id ){     
    
    if( !current_user_can( 'edit_post' ) ) return;
    
    
    if( isset( $_POST['film_ticket_price'] ) ){
        update_post_meta( $post_id, 'film_ticket_price', wp_kses( $_POST['film_ticket_price']));
    }
    
    if( isset( $_POST['film_release_date'] ) ){
        update_post_meta( $post_id, 'film_release_date', wp_kses( $_POST['film_release_date']));
    }   
       
}

//Shortcode for show 5 latest films
function latest_films_sc() {
    $recent_posts = wp_get_recent_posts(array('post_type'=>'film','numberposts' => 5,'orderby' => 'post_date'));
    $postL = "<ul>";
    foreach( $recent_posts as $recent ){
        $postL .= '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
    }
    $postL .= "</ul>";
    return $postL;
}
add_shortcode('latest_films', 'latest_films_sc');

?>