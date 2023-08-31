<?php

//now we are saving the data
function facilities_save_meta_fields( $post_id ) {

  // verify nonce
  if (!isset($_POST['wpse_our_nonce']) || !wp_verify_nonce($_POST['wpse_our_nonce'], basename(__FILE__)))
      return 'nonce not verified';

  // check autosave
  if ( wp_is_post_autosave( $post_id ) )
      return 'autosave';

  //check post revision
  if ( wp_is_post_revision( $post_id ) )
      return 'revision';

  // check permissions
  if ( 'facilities' == $_POST['post_type'] ) {
      if ( ! current_user_can( 'edit_page', $post_id ) )
          return 'cannot edit page';
      } elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
          return 'cannot edit post';
  }


  //so our basic checking is done, now we can grab what we've passed from our newly created form
  $job_choosed_servces = $_POST['job_choosed_servces'];  
  //simply we have to save the data now
  update_post_meta($post_id, 'job_choosed_servces', $job_choosed_servces);

}
add_action( 'save_post', 'facilities_save_meta_fields', 10, 2  );