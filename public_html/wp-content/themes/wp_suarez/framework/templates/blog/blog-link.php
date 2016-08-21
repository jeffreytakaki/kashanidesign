<?php
/**
 * @package cshero
 */
global $cs_span,$masonry_filter,$timeline;
$class='cs-masonry-layout-item '.$cs_span.' ';
if($masonry_filter){
	global $cs_cat_class;
	$class .= "category-".$cs_cat_class;
}
?>
<?php global $smof_data,$post; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
	<?php if($timeline=='timeline'):?>
		<div class="cs-timeline-date hidden-xs">
			<?php
			$archive_date = get_the_date($smof_data['archive_date_format']);?>
		    <span><i class="fa fa-clock-o"></i><a href="<?php echo get_day_link(get_the_time('Y'),get_the_time('m'),get_the_time('d')); ?>" title="<?php echo esc_attr($archive_date); ?>"><?php echo esc_attr($archive_date); ?></a></span>
		</div>
	<?php endif;?>
	<div class="cs-blog">
		<header class="cs-blog-header">
			<div class="cs-blog-media">
			<?php if (has_post_thumbnail() && ! post_password_required() && ! is_attachment()): ?>
    			<div class="cs-blog-thumbnail">
    				<?php the_post_thumbnail('blog-full'); ?>
    			</div><!-- .entry-thumbnail -->
			<?php endif; ?>
			</div>
			<div class="cs-blog-meta cs-itemBlog-meta">
				<?php echo cshero_title_render(); ?>
				<?php if($timeline!='timeline'){
					echo cshero_info_bar_render();
				}
				else{
					echo cshero_info_bar_render('detail_date');
				} ?>
			</div>
		</header><!-- .entry-header -->
		<div class="cs-blog-content">
			<?php cshero_content_render(); ?>
		</div><!-- .entry-content -->
		<div class="cs-meta-bottom-wrap">
			<?php echo cshero_info_footer_render(); ?>
		</div>
	</div>
</article><!-- #post-## -->

