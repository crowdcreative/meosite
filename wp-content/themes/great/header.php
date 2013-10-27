<!DOCTYPE html>
<?php $options = get_option('great'); ?>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?></title>
	<?php mts_meta(); ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_enqueue_script("jquery"); ?>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php mts_head(); ?>
	<?php wp_head(); ?>
	
	<link href='http://fonts.googleapis.com/css?family=Sanchez:400,400italic|Radley:400,400italic' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="./wp-content/themes/great/images/favicon.png">

</head>
<?php flush(); ?>
<body id ="blog" <?php body_class('main'); ?>>
	<header class="main-header">
		<div id="header"">
			<div class="container">
				<?php if ($options['mts_logo'] != '') { ?>
					<?php if( is_front_page() || is_home() || is_404() ) { ?>
							<h1 id="logo">
								<a href="<?php echo home_url(); ?>"><img src="./wp-content/themes/great/images/logo.png" alt="<?php bloginfo( 'name' ); ?>"></a>
							</h1><!-- END #logo -->
					<?php } else { ?>
						  <h2 id="logo">
								<a href="<?php echo home_url(); ?>"><img src="./wp-content/themes/great/images/logo.png" alt="<?php bloginfo( 'name' ); ?>"></a>
							</h2><!-- END #logo -->
					<?php } ?>
				<?php } else { ?>
					<?php if( is_front_page() || is_home() || is_404() ) { ?>
							<h1 id="logo">
								<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
							</h1><!-- END #logo -->
					<?php } else { ?>
						  <h2 id="logo">
								<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
							</h2><!-- END #logo -->
					<?php } ?>
				<?php } ?> 
				
				<div id="apresentacao">
					<span><div id="seusua" style="float: left; padding-right: 6px;">Seu</div> <i style="background: none repeat scroll 0% 0% rgb(130, 255, 0); padding: 0px 3px;" id="target"></i> <div id="destacado" style="float: left; padding-right: 6px;">destacado</div> na internet.</span>
					<span>Somos uma rede de profissionais <i>criativos</i>;<br>
					 um <i>e-commerce</i> de produtos/serviços e<br>
					 uma revista digital de <i>conteúdo</i> didático.</span>
					<span>Tudo focado em web e marketing.</span>
				</div>
				
				<div id="orc-descricao">
					Quero fazer um site e minhas ações digitais com vocês!
				</div>
				
				<div id="orcamento">
					<span>Orçamento grátis</span>
				</div>
				
				<div class="secondary-navigation" style="display:none">
					<nav id="navigation" >
						<?php if ( has_nav_menu( 'primary-menu' ) ) { ?>
							<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'menu', 'container' => '' ) ); ?>
						<?php } else { ?>
							<ul class="menu">
								<?php wp_list_categories('title_li='); ?>
							</ul>
						<?php } ?>
					</nav>
				</div>     
			</div>        
		</div><!--#header-->  
	</header>
	<?php if (is_single() || is_page()) { ?>
			<div class="breadcrumbs-wrap">
				<div class="breadcrumbs">
					<div class="breadcrumb"><?php the_breadcrumb(); ?></div>
				</div>
			</div>
	<?php } ?>
<div class="main-container">