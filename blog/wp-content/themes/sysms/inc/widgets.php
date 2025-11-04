<?php

function new_sidebar_widgets() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Category' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar.'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<p class="widget-title h5 fw-bold">',
			'after_title'   => '</p>',
		)
	);
}
add_action( 'widgets_init', 'new_sidebar_widgets' );

function new_sidebar_recent_widgets() {
register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Recent' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar.'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<p class="widget-title h5 fw-bold">',
			'after_title'   => '</p>',
		)
	);
}
add_action( 'widgets_init', 'new_sidebar_recent_widgets' );

function new_footer_widgets() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<p class="widget-title h5 fw-bold">',
			'after_title'   => '</p>',
		)
	);
}
//add_action( 'widgets_init', 'new_footer_widgets' );

function new_header_widgets() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Header' ),
			'id'            => 'sidebar-4',
			'description'   => esc_html__( 'Add widgets here to appear in your header.'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
}
//add_action( 'widgets_init', 'new_header_widgets' );

?>