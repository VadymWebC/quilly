<?php get_header(); ?>



<div class="container">
    <div class="section">
        <div class="row">
            <form class="col s12" action="#" method="POST">
                <?php wp_nonce_field( 'fair-field', 'field-verification' ); ?>

                <div class="row">
                    <div class="input-field col s12">
                    Login
                    </div>
                </div>

                <?php
            
                if(!empty($_GET['passerr']) && $_GET['passerr'] == 1) {
                    ?>
                    <div class="row">
                        <div class="alert card red lighten-4 red-text text-darken-4">
                            <div class="card-content">
                                <p><i class="material-icons">report</i><span>Username and password do not match or you do not have an account yet</span></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                if(!empty($_GET['created']) && !empty($_GET['login']) && $_GET['created'] == 1) {
                    ?>
                    <div class="row">
                        <div class="alert card green lighten-4 green-text text-darken-4">
                            <div class="card-content">
                                <p><i class="material-icons">check_circle</i><span>The user <?php print($_GET['login']); ?> was successfully created</span></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                
                ?>
                
                <div class="row">
                    <div class="input-field col s12">
                    <?php /*echo ((!empty($_GET['passerr']) && $_GET['passerr'] == 1) ? ('invalid') : (''));*/ ?>
                    <input
                        id="username"
                        name="username"
                        type="text"
                        class="validate"
                        required
                    >
                    <label for="username">Username</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="validate"
                        required
                    >
                    <label for="password">Password</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <button id="submit" type="submit" name="submit-this-form" class="btn waves-effect waves-light" name="action">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>





<?php get_footer(); ?>