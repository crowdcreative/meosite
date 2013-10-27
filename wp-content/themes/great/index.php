<?php $options = get_option('great'); ?>
<?php get_header(); ?>
<div id="page">
	<div class="content">
		<article class="article">
			<div id="content_box">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php $postID =  get_the_ID(); ?>
					<div class="post excerpt">
						<div class="post-date"><time><?php the_time('j/m/Y'); ?></time></div>
						<header>
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
							<?php if ( has_post_thumbnail() ) { ?> 
							<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail('featured',array('title' => '')); echo '</div>'; ?>
							<?php } else { ?>
							<div class="featured-thumbnail">
							<img width="580" height="300" src="<?php echo get_template_directory_uri(); ?>/images/nothumb.png" class="attachment-featured wp-post-image" alt="<?php the_title(); ?>">
							</div>
							<?php } ?>
							</a>
					
							<h2 class="title">
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a><span class="views"><?php echo post_read_time() . " | " . get_post_meta( $postID, "_count-views_all", true) . " visualização"; ?></span>
							</h2>
						</header><!--.header-->
						
						<div class="post-content image-caption-format-1">
							<?php echo excerpt(35) . "...";?><a class="readMore" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark">Ler mais &rsaquo;</a>
						</div>
						<div class="post-info">
						Por <?php the_author_meta("display_name"); ?> | <?php $category = get_the_category(); echo '<a href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.'</a>';?> 
						
						</div>
					</div><!--.post excerpt-->
				<?php endwhile; else: ?>
					<div class="post excerpt">
						<div class="no-results">
							<p><strong><?php _e('There has been an error.', 'mythemeshop'); ?></strong></p>
							<p><?php _e('We apologize for any inconvenience, please hit back on your browser or use the search form below.', 'mythemeshop'); ?></p>
							<?php get_search_form(); ?>
						</div><!--noResults-->
					</div>
				<?php endif; ?>
				<?php if ($options['mts_pagenavigation'] == '1') { ?>
					<?php pagination($additional_loop->max_num_pages);?>
				<?php } else { ?>
					<div class="pnavigation2">
						<div class="nav-previous"><?php next_posts_link( __( '&larr; '.'Older posts', 'mythemeshop' ) ); ?></div>
						<div class="nav-next"><?php previous_posts_link( __( 'Newer posts'.' &rarr;', 'mythemeshop' ) ); ?></div>
					</div>
				<?php } ?>			
			</div>
		</article>
		<?php get_sidebar(); ?>
<?php get_footer(); ?>