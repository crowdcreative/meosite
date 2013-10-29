<?php $options = get_option('great'); ?>
<?php get_header(); ?>
<div id="page">
	<div class="content">
		<article class="article">
			<div id="content_box">
			
			
				<?php 
				
				// Mais de um posttype em um Loop --> link: http://wordpress.stackexchange.com/questions/103368/query-multiple-custom-post-types-in-single-loop

				global $query_string;
				$posts = query_posts( array( 'posts_per_page' => -1, 'post_type' => array('post','link','ebooks')));

				
				?>
			
			
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				
				<!-- POST link para um artigo externos -->
				<?php if ('link' == get_post_type()){ ?>
				
					<?php $postID =  get_the_ID(); ?>
					<div class="post ebook excerpt">
						<div class="post-date"><time><?php echo TimeAgo($postID); ?></time></div>
						<header>
							<a href="<?php the_field('link_para_o _artigo_externo');  ?>" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
							<?php if ( has_post_thumbnail() ) { ?> 
							<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail('image-link',array('title' => '')); echo '</div>'; ?>
							<?php } else { ?>
							<div class="featured-thumbnail">
							<img width="580" height="300" src="<?php echo get_template_directory_uri(); ?>/images/nothumb.png" class="attachment-featured wp-post-image" alt="<?php the_title(); ?>">
							</div>
							<?php } ?>
							</a>
					
							<div class="post-info">
								<span class="uppercase"><?php $category = get_the_category(); echo '<a href="'.get_category_link($category[0]->cat_ID).'">' . $category[0]->cat_name .'</a>';?> </span><span>Por <?php the_author_meta("display_name"); ?></span> 
							</div>
					
							<h2 class="title">
								<a href="<?php the_field('link_para_o _artigo_externo'); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a><span class="leitura help" title="Tempo médio de leitura"><?php echo post_read_time(); ?></span>
							</h2>
							
						</header><!--.header-->
						
						<div class="post-content image-caption-format-1">
		
								<?php echo excerpt(35) . "...";?>
								<a class="readMore" href="<?php the_field('link_para_o _artigo_externo');  ?>" title="<?php the_title(); ?>" rel="nofollow">Ler mais &rsaquo;</a>
						
						</div>
						
					</div><!--.post excerpt-->
					
					
				<!-- POST for um ebook para um artigo externos -->	
				<?php }elseif ('ebooks' == get_post_type()){ ?>  
				
					<?php 
		
				 
					// Pega o link do livro para download (url)
					if(get_field('link_do_ebook_para_download')){
						$linkExterno = get_field('link_do_ebook_para_download');
					}elseif(get_field('link_do_ebook_para_download_hospedado')){
						$linkExterno = get_field('link_do_ebook_para_download_hospedado');
					}
					
					// Tempo de leitura do ebook
					$nrPaginas = get_field('paginas');
					$tempoMinutos = $nrPaginas * 64;
					$tempoMinutos = $tempoMinutos / 60;
					$tempoMinutos = floor($tempoMinutos);
					
					if ($tempoMinutos < 60){
						$tempoLeitura = $tempoMinutos . "min.";
					}
					elseif($tempoMinutos >= 60){
						$d = floor($tempoMinutos / 1440);
						$h = floor(($tempoMinutos - $d * 1440) / 60);
						$m = $tempoMinutos - ($d * 1440) - ($h * 60);
						$tempoLeitura = "{$h}h {$m}min.";
					}
					?>
				
					<?php $postID =  get_the_ID(); ?>
					<div class="post excerpt">
					
						
					
						<div class="post-date"><time><?php echo TimeAgo($postID); ?></time></div>
						<header>
							<a href="<?php echo $linkExterno;  ?>" class="post-ebooks" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
							<?php if ( has_post_thumbnail() ) { ?> 
							<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail('image-ebook',array('title' => '')); echo '</div>'; ?>
							<?php } else { ?>
							<div class="featured-thumbnail">
							<img width="580" height="300" src="<?php echo get_template_directory_uri(); ?>/images/nothumb.png" class="attachment-featured wp-post-image" alt="<?php the_title(); ?>">
							</div>
							<?php } ?>
							</a>
							
							<div class="post-info">
								<span class="uppercase"><?php $category = get_the_category(); echo '<a href="'.get_category_link($category[0]->cat_ID).'">' . $category[0]->cat_name .'</a>';?> </span><span>Por <?php the_author_meta("display_name"); ?></span> 
							</div>
					
							<h2 class="title">
								<a href="<?php echo $linkExterno; ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a><span class="leitura help" title="Tempo médio de leitura"><?php echo $tempoLeitura; ?></span>
							</h2>
						</header><!--.header-->
						
						<div class="post-content image-caption-format-1">
		
							<?php 
									// Sistema para mostrar todo o post se ele não tiver imagens
									$postContent =  get_post_field('post_content', $postID);
									$postContentpreview = substr($postContent, 0, 220);
									$postContentcomplete = substr($postContent, 220);
									echo $postContentpreview . "<span class='pontinhos readExpander'>...</span>";
									echo "<span id='contentComplete'>" . $postContentcomplete . "</span>";
								?>
							
							<div class="caracteristicas"><span><b>Autor:</b> <?php the_field('nome_do_autor'); ?></span> <span><b>Nº de páginas:</b> <?php the_field('paginas');?>pag.</span></div>
							
							<a class="readMore" href="<?php echo $linkExterno;  ?>" title="<?php the_title(); ?>" rel="nofollow">Ler o livro &rsaquo;</a>
							
						</div>
						
					</div><!--.post excerpt-->
				<?php }else{ ?>
				
				<!-- Se o o tipo de post for um Post Comum -->
				
					<?php $postID =  get_the_ID(); ?>
					<div class="post excerpt">
						<div class="post-date"><time><?php echo TimeAgo($postID); ?></time></div>
						<header>
							<a href="<?php the_permalink() ?>" class="post-comum"  title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
							<?php if ( has_post_thumbnail() ) { ?> 
							<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail('image-post-normal',array('title' => '')); echo '</div>'; ?>
							<?php } else { ?>
							<div class="featured-thumbnail">
							<img width="580" height="300" src="<?php echo get_template_directory_uri(); ?>/images/nothumb.png" class="attachment-featured wp-post-image" alt="<?php the_title(); ?>">
							</div>
							<?php } ?>
							</a>
					
							<div class="post-info">
								<span class="uppercase"><?php $category = get_the_category(); echo '<a href="'.get_category_link($category[0]->cat_ID).'">' . $category[0]->cat_name .'</a>';?> </span><span>Por <?php the_author_meta("display_name"); ?></span> 
							</div>
					
							<h2 class="title">
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a><span class="leitura help" title="Tempo médio de leitura"><?php echo post_read_time();?></span>
							</h2>
						</header><!--.header-->
						
						<div class="post-content image-caption-format-1">
							<?php if (tem_images($postID) == 'tem'){ ?>
								<?php echo excerpt(35) . "...";?>
								<a class="readMore" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark">Ler mais &rsaquo;</a>
							<?php }else{ ?>
								<?php 
									// Sistema para mostrar todo o post se ele não tiver imagens
									$postContent =  get_post_field('post_content', $postID);
									$postContentpreview = substr($postContent, 0, 220);
									$postContentcomplete = substr($postContent, 220);
									echo $postContentpreview . "<span class='pontinhos'>...</span>";
									echo "<span id='contentComplete'>" . $postContentcomplete . "</span>";
								?>
								<a class="readExpander" title="<?php the_title(); ?>" rel="bookmark">Ler mais &rsaquo;</a>
							<?php } ?>
						</div>
						
					</div><!--.post excerpt-->
				
				<?php } ?>
					
				<?php endwhile;  wp_reset_query(); else: ?>
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