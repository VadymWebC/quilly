<?php get_header(); ?>
<div>My Posts</div>

<?php
$current_user = wp_get_current_user();
print_r('<div>'.$current_user->display_name.'</div>');

?>


<?php get_footer(); ?>