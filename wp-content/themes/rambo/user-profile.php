<?php
/*
 * Template Name: User Profile
 */
global $current_user, $wp_roles;
get_currentuserinfo();

/* Load the registration file. */
require_once( ABSPATH . WPINC . '/registration.php' );

/* If profile was saved, update profile. */
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

    /* Update user password. */
    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
        if ( $_POST['pass1'] == $_POST['pass2'] )
            wp_update_user( array( 'ID' => $current_user->id, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
        else
            $error = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
    }

    /* Update user information. */
    if ( !empty( $_POST['url'] ) )
        update_usermeta( $current_user->id, 'user_url', esc_url( $_POST['url'] ) );
    if ( !empty( $_POST['email'] ) )
        update_usermeta( $current_user->id, 'user_email', esc_attr( $_POST['email'] ) );
    if ( !empty( $_POST['first-name'] ) )
        update_usermeta( $current_user->id, 'first_name', esc_attr( $_POST['first-name'] ) );
    if ( !empty( $_POST['last-name'] ) )
        update_usermeta($current_user->id, 'last_name', esc_attr( $_POST['last-name'] ) );
    if ( !empty( $_POST['description'] ) )
        update_usermeta( $current_user->id, 'description', esc_attr( $_POST['description'] ) );

    
    /* Redirect so the page will show updated info. */
    if ( !$error ) {
        wp_redirect( get_permalink() );
        exit;
    }
}
?>


<?php   
/**
* @Theme Name	:	rambo
* @file         :	user-profile.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
* @filesource   :	wp-content/themes/rambo/user-profile.php
*/ 
get_template_part('banner','strip'); ?>
<div class="container"><!-- Main --> 
	<div class="row-fluid">
        <div class="span8 Blog_main">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>">
            <div class="entry-content entry">
                <?php the_content(); ?>
                <?php if ( !is_user_logged_in() ) : ?>
                        <p class="warning">
                            <?php 
                                _e('You must be logged in to edit your profile.', 'rambo'); 
                                auth_redirect();
                                exit;
                            ?>
                        </p><!-- .warning -->
                <?php else : ?>
                    <?php if ( $error ) echo '<p class="error">' . $error . '</p>'; ?>
                    <form method="post" id="adduser" action="<?php the_permalink(); ?>">
                        <div class="form-group">
                            <label for="first-name"><?php _e('First Name', 'rambo'); ?></label>
                            <div class="col-sm-10">
                                <input class="form-control" name="first-name" type="text" id="first-name" 
                                    value="<?php the_author_meta( 'user_firstname', $current_user->id ); ?>" />
                            </div>
                        </div><!-- .form-username -->
                        <div class="form-group">
                            <label for="last-name"><?php _e('Last Name', 'rambo'); ?></label>
                            <input class="form-control" name="last-name" type="text" id="last-name" 
                                value="<?php the_author_meta( 'user_lastname', $current_user->id ); ?>" />
                        </div><!-- .form-username -->
                        <div class="form-group">
                            <label for="email"><?php _e('E-mail *', 'rambo'); ?></label>
                            <div class="col-sm-10">
                                <input class="text-input" name="email" type="text" id="email" 
                                    value="<?php the_author_meta( 'user_email', $current_user->id ); ?>" />
                            </div>
                        </div><!-- .form-email -->
                        <div class="form-group">
                            <label for="url"><?php _e('Website', 'rambo'); ?></label>
                            <div class="col-sm-10">
                                <input class="form-control" name="url" type="text" id="url" 
                                    value="<?php the_author_meta( 'user_url', $current_user->id ); ?>" />
                            </div>
                        </div><!-- .form-url -->
                        <div class="form-group">
                            <label for="pass1"><?php _e('Password *', 'rambo'); ?> </label>
                            <div class="col-sm-10">
                                <input class="form-control" name="pass1" type="password" id="pass1" />
                            </div>
                        </div><!-- .form-password -->
                        <div class="form-group">
                            <label for="pass2"><?php _e('Repeat Password *', 'rambo'); ?></label>
                            <input class="form-control" name="pass2" type="password" id="pass2" />
                        </div><!-- .form-password -->

                        <div class="form-group">
                            <label for="description"><?php _e('Biographical Information', 'rambo') ?></label>
                            <div class="col-sm-10">
                                <textarea name="description" id="description" rows="3" cols="50"><?php the_author_meta( 'description', $current_user->id ); ?></textarea>
                            </div>
                        </div><!-- .form-textarea -->
                        <div class="form-group">
                            <?php echo $referer; ?>
                            <input name="updateuser" type="submit" id="updateuser" class="btn btn-danger" value="<?php _e('Update', 'rambo'); ?>" />
                            <?php wp_nonce_field( 'update-user' ) ?>
                            <input name="action" type="hidden" id="action" value="update-user" />
                        </div><!-- .form-submit -->
                    </form><!-- #adduser -->
                    <?php endif; ?>
                </div><!-- .entry-content -->
            </div><!-- .hentry .post -->
            <?php comments_template( '', true ); ?>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="no-data">
                <?php _e('Sorry, no page matched your criteria.', 'profile'); ?>
            </p><!-- .no-data -->
        <?php endif; ?>
        </div>
		<?php get_sidebar();?>
    </div>
</div>
<?php  get_footer(); ?>
