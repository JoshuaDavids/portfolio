<?php
/**
 * Template part for a team member card
 *
 * @package WSK_Theme
 */

$team_member_role = get_field( 'team_member_role' );
$team_member_bio  = get_field( 'team_member_bio' );

$social_networks = array(
	array(
		'key'  => 'twitter',
		'name' => 'Twitter',
		'url'  => get_field( 'team_member_twitter_url' ),
	),
	array(
		'key'  => 'linkedin',
		'name' => 'LinkedIn',
		'url'  => get_field( 'team_member_linkedin_url' ),
	),
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'card card--team-member' ); ?>>

	<?php
	wskt_post_thumbnail(
		array(
			'class'     => 'card-img-top',
			'fallback'  => false,
			'permalink' => false,
		)
	);
	?>

	<div class="card-header">
		<?php printf( '<h5 class="card-title">%s</h5>', esc_attr( get_the_title() ) ); ?>

		<?php if ( $team_member_role ) : ?>
			<span><?php echo esc_attr( $team_member_role ); ?></span>
		<?php endif; ?>
	</div>

	<div class="card-body">
		<?php if ( $team_member_bio ) : ?>
			<?php echo $team_member_bio; // phpcs:ignore WordPress.Security.EscapeOutput ?>
		<?php endif; ?>
	</div>

	<div class="card-footer">
		<?php wskt_social_network_buttons( $social_networks ); ?>
	</div>

</article>
