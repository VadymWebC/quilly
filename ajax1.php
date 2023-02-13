<?php

// Here we register our "send_form" function to handle our AJAX request, do you remember the "superhypermega" hidden field? Yes, this is what it refers, the "send_form" action.
add_action('wp_ajax_send_form', 'send_form'); // This is for authenticated users
add_action('wp_ajax_nopriv_send_form', 'send_form'); // This is for unauthenticated users.
 
/**
 * In this function we will handle the form inputs and send our email.
 *
 * @return void
 */
 
function send_form(){
 
    // This is a secure process to validate if this request comes from a valid source.
    check_ajax_referer( 'secure-nonce-name', 'security' );
 
    /**
     * First we make some validations, 
     * I think you are able to put better validations and sanitizations. =)
     */
     
    if ( empty( $_POST["name"] ) ) {
        echo "Insert your name please";
        wp_die();
    }
 
    if ( ! filter_var( $_POST["email"], FILTER_VALIDATE_EMAIL ) ) {
        echo 'Insert your email please';
        wp_die();
    }
 
    if ( empty( $_POST["comment"] ) ) {
        echo "Insert your comment please";
        wp_die();
    }
 
    // This is the email where you want to send the comments.
    $to = 'ourcompanysemail@example.com';
 
    // Your message subject.
    $subject = 'Now message from a client!';
    
    $body  = 'From: ' . $_POST['name'] . '\n';
    $body .= 'Email: ' . $_POST['name'] . '\n';
    $body .= 'Message: ' . $_POST['comment'] . '\n';
 
    // This are the message headers.
    // You can learn more about them here: https://developer.wordpress.org/reference/functions/wp_mail/
    $headers = array('Content-Type: text/html; charset=UTF-8');
     
    wp_mail( $to, $subject, $body, $headers );
 
    echo 'Done!';
    wp_die();
}