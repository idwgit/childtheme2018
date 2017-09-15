<?php

function idw_home_page() {?>
    <section>
        <div class="wrap">
            <h1>H1 Header</h1>
            <p>Content here</p>
        </div>
    </section>
    <section>
        <div class="wrap">
            <h2>Another Section</h2>
            <p>Content here</p>
        </div>
    </section>
<?php }
add_action( 'arnold_content_area', 'idw_home_page' );

function arnold_site_inner_attr( $attributes ) {
    $attributes['role']     = 'main';
    $attributes['itemprop'] = 'mainContentOfPage';
    return $attributes;
}
add_filter( 'genesis_attr_site-inner', 'arnold_site_inner_attr' );

get_header();
do_action( 'arnold_content_area' );
get_footer();