<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.0.1' );

//* Use to enqueue fonts
add_action( 'wp_enqueue_scripts', 'idw_enqueue_scripts' );
function idw_enqueue_scripts() {
    wp_enqueue_style( 'google-font-open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,300,600', array(), CHILD_THEME_VERSION );
    wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' );
	if(is_front_page()) {
		wp_enqueue_style( 'animate', get_stylesheet_directory_uri() . '/css/animate.css' );
		wp_enqueue_script( 'idw-script', get_stylesheet_directory_uri() . '/js/idw.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'waypoints', get_stylesheet_directory_uri() . '/js/jquery.waypoints.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'inview', get_stylesheet_directory_uri() . '/js/inview.min.js', array( 'jquery' ), '', true );
	}
}

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//=====================================Header==============================================

//* Defines Clickable Logo and adds Blog Info to title
remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
add_action( 'genesis_site_title','practice_logo',5,1);
function practice_logo()
{?>
    <a id="sitelogo" href="<?php bloginfo( 'url' ); ?>"><img src="<?php bloginfo( 'stylesheet_directory' ) ?>/images/logo.png" alt="<?php bloginfo('name')?>" title="<?php bloginfo('name')?>" /></a>
<?php }

//* Remove the header right widget area
unregister_sidebar( 'header-right' );

//----------------------------------Footer---------------------------------------------------

remove_action( 'genesis_after_header', 'genesis_do_subnav' );
remove_action ('genesis_footer' , 'genesis_do_footer');
add_action ('genesis_footer' , 'idw_footer');
function idw_footer() {?>
    <div id="idw-footer">
        <div>
            <span>
                Practice Name<br />
                Dentist Name, D.D.S.<br />
                Address<br />
                City, State Zip<br />
                New Patients Call: Kall8 Number<br />
                All Other Calls: Local Number<br />
                <a href="#">See on the Map</a>
            </span>
        </div>

        <?php if (is_front_page()){?>
        <div id="footer-menu">
            <?php genesis_do_subnav();?>
        </div>
        <?php } ?>

        <ul class="social">
            <li><a href="#" alt="Facebook"><i class="fa fa-facebook fa-2x"></i></a></li>
            <li><a href="#" alt="Twitter"><i class="fa fa-twitter fa-2x"></i></a></li>
            <li><a href="#" alt="Instagram"><i class="fa fa-instagram fa-2x"></i></a></li>
            <li><a href="#" alt="YouTube"><i class="fa fa-youtube fa-2x"></i></a></li>
            <li><a href="#" alt="Google Plus"><i class="fa fa-google-plus fa-2x"></i></a></li>
        </ul>

        <p>&copy;2015-<?php echo date("Y") ?> Practice Name &bull; All rights reserved<br />
        <?php if(is_front_page()){?>Website Design and SEO by <a href="http://infinitydentalweb.com" target="_blank" rel="nofollow">Infinity Dental Web</a><?php }else{?>Website Design and SEO by Infinity Dental Web <?php }?>
	    <img id="idw-copyright-logo" src="<?php bloginfo('stylesheet_directory' );?>/images/idw_copyright_logo.png" style="width:20px;margin-bottom:-5px;">
        </p>
    </div>
<?php }

//----------------------------------login page IDW logo--------------------------------------
function login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_bloginfo( 'stylesheet_directory' ) ?>/images/idw_logo_wp_admin.jpg);
            width: 320px;
            height: 80px;
            background-size: 320px 80px;
        }
    </style>
   <?php }
add_action( 'login_enqueue_scripts', 'login_logo' );
function put_my_url(){
    return ('http://www.infinitydentalweb.com/');
    }
add_filter('login_headerurl', 'put_my_url');

function put_my_title(){
    return ('Powered by Infinity Dental Web CMS');
}
add_filter('login_headertitle', 'put_my_title');
