<?php get_header(); ?>


<div class="container">
    <div class="section">
        <div class="row">
            <form id="signup-form" class="col s12" action="#" method="POST">
                <?php wp_nonce_field( 'fair-field', 'field-verification' ); ?>

                <div class="row">
                    <div class="input-field col s12">
                    Sign Up
                    </div>
                </div>

                <?php
            
                if(!empty($_GET['passerr']) && $_GET['passerr'] == 1) {
                    ?>
                    <div class="row">
                        <div class="alert card red lighten-4 red-text text-darken-4">
                            <div class="card-content">
                                <p><i class="material-icons">report</i><span>Password:</span> password confirmation doesn't not match</p>
                            </div>
                        </div>
                    </div>
                    <?php
                }

                if(!empty($_GET['logerr']) && $_GET['logerr'] == 1) {
                    ?>
                    <div class="row">
                        <div class="alert card red lighten-4 red-text text-darken-4">
                            <div class="card-content">
                                <p><i class="material-icons">report</i><span>Username:</span> username must contain only letters, or numbers, or underscore</p>
                            </div>
                        </div>
                    </div>
                    <?php
                }

                if(!empty($_GET['emailerr']) && $_GET['emailerr'] == 1) {
                    ?>
                    <div class="row">
                        <div class="alert card red lighten-4 red-text text-darken-4">
                            <div class="card-content">
                                <p><i class="material-icons">report</i><span>Email:</span> format of the email address isn't correct</p>
                            </div>
                        </div>
                    </div>
                    <?php
                }

                ?>

                <div class="row">
                    <div class="input-field col s12">
                    <input
                        id="username"
                        name="username"
                        type="text"
                        class="validate <?php echo ((!empty($_GET['logerr']) && $_GET['logerr'] == 1) ? ('invalid') : ('')); ?>"
                        required
                    >
                    <label for="username">Username (system) *</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input
                        id="displayname"
                        name="displayname"
                        type="text"
                        class="validate"
                        required
                    >
                    <label for="displayname">Display name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input
                        id="email"
                        name="email"
                        type="email"
                        class="validate <?php echo ((!empty($_GET['emailerr']) && $_GET['emailerr'] == 1) ? ('invalid') : ('')); ?>"
                        required
                    >
                    <label for="email">Email *</label>
                    </div>
                </div>                
                <div class="row">
                    <div class="input-field col s6">
                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="validate <?php echo ((!empty($_GET['passerr']) && $_GET['passerr'] == 1) ? ('invalid') : ('')); ?>"
                            required
                        >
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field col s6">
                        <input
                            id="confirm_password"
                            name="confirm_password"
                            type="password"
                            class="validate <?php echo ((!empty($_GET['passerr']) && $_GET['passerr'] == 1) ? ('invalid') : ('')); ?>"
                            required
                        >
                        <label for="confirm_password">Confirm password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input
                            id="first_name"
                            name="first_name"
                            type="text"
                            class="validate"
                        >
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6">                        
                        <input
                            id="last_name"
                            name="last_name"
                            type="text"
                            class="validate"
                        >
                        <label for="last_name">Last Name</label>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col s12">
                        <button id="submit" type="submit" name="submit-this-form" class="btn waves-effect waves-light" name="action">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




<?php get_footer(); ?>