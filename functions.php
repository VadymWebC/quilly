<?php


// Подключение стилей и скриптов            
//wp_enqueue_scripts
add_action('wp_enqueue_scripts', function() {   
    wp_enqueue_style('main', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), time());
    wp_enqueue_style('materialize', get_stylesheet_directory_uri() . '/assets/css/materialize.min.css', array(), time());

    wp_enqueue_style('quill', 'https://cdn.quilljs.com/1.3.6/quill.snow.css', array(), time());

    wp_enqueue_script('jquery');
    wp_enqueue_script('quill', 'https://cdn.quilljs.com/1.3.6/quill.js', array(), null, true);
    wp_enqueue_script('materialize', get_stylesheet_directory_uri() . '/assets/js/materialize.min.js', array(), null, true);
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);    
});

function generateRandUserStr() {
    $opstr = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $usr_str = strval(substr($opstr, random_int(0, strlen($opstr)-1), 1));
    for($i=0; $i<3; $i++)  $usr_str .= strval(random_int(0,9));
    $usr_str .= strval(time());
    return $usr_str;
}




add_action('wp', 'page_loading');

function create_temporary_user_cookie() {
    $current_user = wp_get_current_user();
    if(empty($current_user->ID)) {            
        if(empty($_COOKIE['temp_user_id']) || ((!empty($_COOKIE['temp_user_id'])) && (strlen($_COOKIE['temp_user_id']) !== 14))) {
            setcookie('temp_user_id', generateRandUserStr(), time()+31556926);
        }            
    }
}

function page_loading() {
    
    

    if ( is_page( 'Experiment' )  ) {
        //
    }

    if( is_home() ) {

        //Если пользователь не залогинен создать временный id в cookie
        
        create_temporary_user_cookie();

        

/*
// Создание поста
$wordpress_post = array(
            'post_title' => 'POST TESTING 1',
            'post_content' => '<p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAGFBMVEUATP////8AAABhYWEAT/9dXV2MjIwAU/+QCMnqAAABSElEQVR4nO3PgU3DUBTAwELyk/03ZgFAaqoqftV5At/j69N73D3w9gjnRzg/wvkRzo9wfoTzI5wf4fwI50c4P8L5Ec7vH+Gxtimt45Jwfc9pXRJud28/0Ub4p/Dc+50vCfdHv52QMB8hYT9Cwn6EhP0ICfsREvYjJOxHSNiPkLAfIWE/QsJ+hIT9CAn7ERL2IyTsR0jYj5CwHyFhP0LCfoSE/QgJ+xES9iMk7EdI2I+QsB8hYT9Cwn6EhP0ICfsREvYjJOxHSNiPkLAfIWE/QsJ+hIT9CAn7ERL2IyTsR0jYj5CwHyFhP0LCfoSE/QgJ+xES9iMk7EdI2I+QsB8hYT9Cwn6EhP0ICfsREvZ7TXju/c6XhFMi/L119/YTrUvCY21TWscl4YdEOD/C+RHOj3B+hPMjnB/h/AjnRzg/wvkRzo9wfp8v/AH8bHMRAs8s+gAAAABJRU5ErkJggg=="></p><p>This is a continue of the text</p><p><br></p><p>`</p>',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'post'
            );
             
            wp_insert_post( $wordpress_post );*/









/*
// Получение списка всех пользователей
$args = array(            
            'orderby' => 'last_name',
            'order'   => 'ASC'
        );
        $users_list = get_users( $args );
        print_r($users_list);

*/

/*
// Получить юзера по email
$user_test = get_user_by_email('jane.doe@example2.com');
*/

/*
//Создание пользователя и его метаданных

$user_id = wp_insert_user( array(
  'user_login' => 'janedoe2',
  'user_pass' => 'passwordgoeshere',
  'user_email' => 'jane.doe@example2.com',
  'first_name' => 'Jane2',
  'last_name' => 'Doe2',
  'display_name' => 'Jane Doe2',
  'role' => 'editor'
));

update_user_meta(
    $user_id,
    'birthday',
    '8888-88-88'
);*/



    }
    

    
}



add_action('after_switch_theme', 'touchme');
function touchme(){

    
    // Программное создание страницы

    // Создание страницы списка постов
    $page = get_page_by_title( 'My Posts' );

    if(empty($page)) {
        $wordpress_page = array(
            'post_title'    => 'My Posts',
            'post_content'  => 'Page Content',
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type' => 'page'        
             );
        wp_insert_post( $wordpress_page );
    }

    // Создание страницы регистрации
    $page = get_page_by_title( 'Sign Up' );

    if(empty($page)) {
        $wordpress_page = array(
            'post_title'    => 'Sign Up',
            'post_content'  => 'Page Content',
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type' => 'page'        
             );
        wp_insert_post( $wordpress_page );
    }

    // Создание страницы логина
    $page = get_page_by_title( 'Login' );

    if(empty($page)) {
        $wordpress_page = array(
            'post_title'    => 'Login',
            'post_content'  => 'Page Content',
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type' => 'page'        
             );
        wp_insert_post( $wordpress_page );
    }




}

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
    }
}


/*add_filter( 'page_template', 'catch_plugin_template' );

function catch_plugin_template( $template ) {
    //print('***********************************************');    
    //die(basename( $template ));
    //print('***********************************************');

    return $template;

}*/



add_filter( 'template_include', 'use_our_page_template' );

function use_our_page_template( $template ) {
    if ( is_page( 'My Posts' )  ) {        
        $new_template =  plugin_dir_path( __FILE__ ) . 'templates/my-posts-template.php';
        return $new_template;
    }
    if ( is_page( 'Sign Up' )  ) {        
        $new_template =  plugin_dir_path( __FILE__ ) . 'templates/sign-up-template.php';
        return $new_template;
    }
    if ( is_page( 'Login' )  ) {        
        $new_template =  plugin_dir_path( __FILE__ ) . 'templates/login-template.php';
        return $new_template;
    }
    return $template;
}
















function update_or_insert_post_by_user($processing_post_id, $processing_user_id, $post_title, $processing_ql) {
    if(empty($processing_post_id)) {
        $wordpress_page = array(
            'post_title'    => $post_title,
            'post_content'  => $processing_ql,
            'post_status'   => 'publish',
            'post_author'   => $processing_user_id,
            'post_type' => 'post'        
        );
        wp_insert_post( $wordpress_page );
    } else {
        $wordpress_page = array(
            'ID' => $processing_post_id,
            'post_title'    => $post_title,
            'post_content'  => $processing_ql,
            'post_status'   => 'publish',
            'post_author'   => $processing_user_id,
            'post_type' => 'post'        
        );
        wp_update_post( $wordpress_page );
    }



// Создание поста
/*$wordpress_post = array(
            'post_title' => 'POST TESTING N',
            'post_content' => '<p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAGFBMVEUATP////8AAABhYWEAT/9dXV2MjIwAU/+QCMnqAAABSElEQVR4nO3PgU3DUBTAwELyk/03ZgFAaqoqftV5At/j69N73D3w9gjnRzg/wvkRzo9wfoTzI5wf4fwI50c4P8L5Ec7vH+Gxtimt45Jwfc9pXRJud28/0Ub4p/Dc+50vCfdHv52QMB8hYT9Cwn6EhP0ICfsREvYjJOxHSNiPkLAfIWE/QsJ+hIT9CAn7ERL2IyTsR0jYj5CwHyFhP0LCfoSE/QgJ+xES9iMk7EdI2I+QsB8hYT9Cwn6EhP0ICfsREvYjJOxHSNiPkLAfIWE/QsJ+hIT9CAn7ERL2IyTsR0jYj5CwHyFhP0LCfoSE/QgJ+xES9iMk7EdI2I+QsB8hYT9Cwn6EhP0ICfsREvZ7TXju/c6XhFMi/L119/YTrUvCY21TWscl4YdEOD/C+RHOj3B+hPMjnB/h/AjnRzg/wvkRzo9wfp8v/AH8bHMRAs8s+gAAAABJRU5ErkJggg=="></p><p>This is a continue of the text</p><p><br></p><p>`</p>',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'post'
            );
             
            wp_insert_post( $wordpress_post );*/





}

function form_processing() {

    $home_url = '/';
    $sign_up_url = '/index.php/sign-up';
    $login_url = '/index.php/login';
    $temp_user_id = $_COOKIE['temp_user_id'];

    if( is_home() ) {

        if(!empty($_GET['logout'])) {
            if($_GET['logout']==true) {
                wp_logout();
                wp_safe_redirect( $home_url );
                exit();
            }
        }

        if ( ! wp_verify_nonce( $_POST['field-verification'], 'fair-field' ) ) {
            return;
        }
        $processing_user_id = $_POST['user_id'];
        $processing_post_id = $_POST['post_id'];
        $processing_ql = $_POST['processing_ql'];
        $post_title = $_POST['post_title'];
        $user_display_name = $_POST['user_display_name'];

        if(empty($processing_user_id)) {
            create_temporary_user_cookie();
            if(empty($processing_user_id)) {
                $processing_user_id = wp_insert_user( array(
                    'user_login' => $temp_user_id,
                    'user_pass' => 'passwordgoeshere',
                    'user_email' => $temp_user_id.'@host.com',
                    'display_name' => ((empty($user_display_name))?(' '):($user_display_name)),
                    'role' => 'editor'
                ));
                //созд юзер
                wp_set_current_user( $processing_user_id, $temp_user_id );
                wp_set_auth_cookie( $processing_user_id );
                do_action( 'wp_login', $temp_user_id );
            }            
        } else {
            wp_update_user( array(
                'ID' => $processing_user_id,
                'display_name' => $user_display_name
            ));
        }
        update_or_insert_post_by_user($processing_post_id, $processing_user_id, $post_title, $processing_ql);

        wp_safe_redirect( $home_url );
        exit();

    }

    if ( is_page( 'Sign Up' )  ) {
        if ( ! wp_verify_nonce( $_POST['field-verification'], 'fair-field' ) ) {
            return;
        }

        $url = $sign_up_url;
        $sign_up_form_msgs = array();
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $username = $_POST['username'];
        $displayname = $_POST['displayname'];
        $email = $_POST['email'];

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];

        if(strcmp($password, $confirm_password) !== 0) {
            $sign_up_form_msgs['passerr'] = 1;
        }
        if(!preg_match("/^[a-zA-Z0-9_-]+$/", $username)) {
            $sign_up_form_msgs['logerr'] = 1;
        }
        if(!preg_match("/^[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/", $email)) {
            $sign_up_form_msgs['emailerr'] = 1;
        }

        if(count($sign_up_form_msgs) > 0) {
            $url = add_query_arg( $sign_up_form_msgs, $url );
        }
        
        if(count($sign_up_form_msgs) === 0) {
            $url = $login_url;
            $user_id = wp_insert_user( array(
                'user_login' => $username,
                'user_pass' => $password,
                'user_email' => $email,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'display_name' => $displayname,                
                'role' => 'editor'
            ));
            $url = add_query_arg( array('created' => 1, 'login' => 1), $url );
        }

        wp_safe_redirect( $url );
        exit();

    }

    if ( is_page( 'Login' )  ) {
        if ( ! wp_verify_nonce( $_POST['field-verification'], 'fair-field' ) ) {
            return;
        }        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $auth_res = wp_authenticate ( $username, $password );
        if(is_wp_error( $auth_res )) {            
            $url = $login_url;
            $url = add_query_arg( array('passerr' => 1), $url );            
        } else {            
            wp_set_current_user( $auth_res->ID, $username );
            wp_set_auth_cookie( $auth_res->ID );
            do_action( 'wp_login', $username );
            $url = $home_url;
        }
        wp_safe_redirect( $url );
        exit();   
    }

	
}
add_action( 'template_redirect', 'form_processing' );
