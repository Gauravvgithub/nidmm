<?php
/**
 * Block Styles
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 */

if ( function_exists( 'register_block_style' ) ) {

	function new_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'new-columns-overlap',
				'label' => esc_html__( 'Overlap' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'new-border',
				'label' => esc_html__( 'Borders' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'new-border',
				'label' => esc_html__( 'Borders' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'new-border',
				'label' => esc_html__( 'Borders' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'new-image-frame',
				'label' => esc_html__( 'Frame' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'new-latest-posts-dividers',
				'label' => esc_html__( 'Dividers' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'new-latest-posts-borders',
				'label' => esc_html__( 'Borders' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'new-border',
				'label' => esc_html__( 'Borders' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'new-separator-thick',
				'label' => esc_html__( 'Thick' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'new-social-icons-color',
				'label' => esc_html__( 'Dark gray' ),
			)
		);
	}
	add_action( 'init', 'new_register_block_styles' );
}
