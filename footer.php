    <!-- Initialize Quill editor -->

    <?php
    
      $current_user = wp_get_current_user();
      //$current_user->ID
    
      print('<div><a href="/index.php/login">Login</a></div>');
      print('<div><a href="/index.php/sign-up">Sign Up</a></div>');      
      if(!empty($current_user->ID)) {
        print('<div><a href="/?logout=true">Logout</a></div>');
      }


    ?>



    <?php wp_footer(); ?>
  </body>
</html>
