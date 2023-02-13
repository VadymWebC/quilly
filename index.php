<?php get_header(); ?>
    
    <?php

    function get_post_and_user_data() {                  
            
      $user_on_the_page = null;
      $user_id = null;
      $post_stuff = null;
      $current_user = wp_get_current_user();
      if(empty($current_user->ID)) {
        $user_obj = get_user_by_email($_COOKIE['temp_user_id'].'@host.com');        
        $user_id = $user_obj->ID;
      } else {
        $user_id = $current_user->ID;
      }
      // Получить пост

      if(!empty($user_id)) {
        $user_on_the_page = get_user_by('ID', $user_id);
        $args = array(
          'posts_per_page' => 1,
          'post_status' => 'publish',
          'author' => $user_id,
          'orderby' => 'modified',
          'order' => 'DESC',
        );
      }

      $first_post = new WP_Query($args);
      if ( $first_post->have_posts() ) {
        $post_stuff = $first_post->posts;      
      }
      
      return array(
        'post_id' => ((!empty($post_stuff))?($post_stuff[0]->ID):(null)),
        'post_title' => ((!empty($post_stuff))?($post_stuff[0]->post_title):(null)),
        'post_content' => ((!empty($post_stuff))?($post_stuff[0]->post_content):(null)),
        'user_id' => $user_id,
        'user_display_name' => $user_on_the_page->display_name
      );
    }

    $post_and_user_disp = get_post_and_user_data();

    if(!empty($post_and_user_disp['user_id'])) {
      print('User id: '.$post_and_user_disp['user_id'].'<br/>');
    } else {
      print('No current user<br/>');
    }

    /*$wordpress_post = array(
      'post_title' => 'POST BY USER',
      'post_content' => '<p>Hello World!</p><p>Some initial <strong>bold</strong> text</p>',
      'post_status' => 'publish',
      'post_author' => 13,
      'post_type' => 'post'
      );
       
      wp_insert_post( $wordpress_post );

      $wordpress_post = array(
        'post_title' => 'NICE CAR POST',
        'post_content' => '<p>TOYOTA</p>',
        'post_status' => 'publish',
        'post_author' => 13,
        'post_type' => 'post'
        );
         
        wp_insert_post( $wordpress_post );*/





    ?>


    <div>TEST</div>    
    <!-- Create the editor container -->

    <form id="home-form" class="col s12" action="#" method="POST">
      <?php wp_nonce_field( 'fair-field', 'field-verification' ); ?>
      <input type="hidden" id="user_id" name="user_id" value="<?php print($post_and_user_disp['user_id']); ?>">
      <input type="hidden" id="post_id" name="post_id" value="<?php print($post_and_user_disp['post_id']); ?>">
      <input type="hidden" id="processing_ql" name="processing_ql">

      <div><b>Title</b></div>
      <input type="text" id="post_title" name="post_title" value="<?php print($post_and_user_disp['post_title']); ?>" />
      <div><b>Your name</b></div>
      <input type="text" id="user_display_name" name="user_display_name" value="<?php print($post_and_user_disp['user_display_name']); ?>" />
      <div id="editor">
        <!-- Для контента поста -->
      </div>
      <div>Who is this user</div>
      <div>
        <?php
          $current_user = wp_get_current_user();
          if(empty($current_user->ID)) {
            print('Anonymous with the id: '.$_COOKIE['temp_user_id']);
          } else {
            print('Logged user . And his id is '.$current_user->ID);
          }
        ?>
      </div>
      <div>Indicator how many posts this user has</div>
      <button id="submit" type="submit" name="submit-this-form" class="btn waves-effect waves-light" name="action"><?php print((is_null($post_and_user_disp['post_id']))?('Save'):('Update')); ?></button>
    </form>

    <div style="padding: 10px; border: solid 1px #000;">
      <div>MENU</div>
      <div>
        <?php
        $page = get_page_by_title( 'Experement' );
        print_r($page);
        ?>
      </div>
    </div>

    <div style="padding: 10px; border: solid 1px #000;">
      <?php
        if(is_front_page() || is_home()){
          print('This is a main page');
        }
      ?>
    </div>

    <div id="prev_postcontainer" class="prev_postcontainer"><?php print($post_and_user_disp['post_content']); ?></div>


    <?php get_footer(); ?>