
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<link rel="preload" as="image" href="<?= ASSETS ?>/assets/images/preview/fon-mobile.webp" />
    <link rel="icon" href="<?= ASSETS ?>/images/favicon.svg">
    <meta property="og:image" content="<?= ASSETS ?>/images/preview.jpg">
    <?= get_option('header_code') ?>
    <script>
        var ajax = '<?= get_admin_url() ?>admin-ajax.php'
    </script>
    <? wp_head() ?>
</head>
<body>
<header class="header"> 
	<div class="header__wrap">
		<nav class="header__nav-top">
			<?php wp_nav_menu(array(
				'theme_location' => 'top',
				'container' => null
			)); ?>
		</nav>
		<div class="header__fixed-wrap">
			<div class="header__container">
				<?php if (is_front_page(  )) { ?>
					<div class="header__logo">
						<img src="<?= ASSETS ?>/images/header/logo.svg">
						<p>Репетиторы по всем предметам в Кирове</p>
					</div>
				<?php } else { ?>
					<a class="header__logo" href="<?= get_permalink(6) ?>">
						<img src="<?= ASSETS ?>/images/header/logo.svg">
						<p>Репетиторы по всем предметам в Кирове</p>
					</a>
				<?php } ?>

				<nav class="header__nav">
					<?php wp_nav_menu(array(
						'theme_location' => 'bottom',
						'container' => null
					)); ?>
				</nav>
				<div class="header__contact">
					<?php if(get_option('phone')) { ?>
						<a href="tel:<?php echo get_option('phone'); ?>"><?php echo get_option('phone'); ?></a>
					<?php } ?>
					<?php if(get_option('adress')) { ?>
						<p><?php echo get_option('adress'); ?></p>					
					<?php } ?>

				</div>
				<button class="header__btn btn-red" type="button" data-modal="connection">Записаться на пробный урок</button>
				<button class="header__nav-open" type="button"></button>
			</div>			
		</div>

	</div>
</header>
<nav class="header__nav-mobile">
	<?php wp_nav_menu(array(
		'theme_location' => 'bottom',
		'container' => null
	)); ?>
	<?php wp_nav_menu(array(
		'theme_location' => 'top',
		'container' => null
	)); ?>
	<button class="header__nav-btn-mobile btn-red" data-modal="connection" type="button">ЗАПИСАТЬСЯ НА ПРОБНЫЙ УРОК</button>
	<div class="header__nav-contact">
		<?php if(get_option('phone')) { ?>
			<a href="tel:<?php echo get_option('phone'); ?>"><?php echo get_option('phone'); ?></a>
		<?php } ?>
		<?php if(get_option('adress')) { ?>
			<p><?php echo get_option('adress'); ?></p>			
		<?php } ?>

	</div>
	<button class="header__nav-close" type="button">

	</button>
</nav>
<script>
	let btnOpenNav = document.querySelector('.header__nav-open')
	btnOpenNav.addEventListener('click', function() {
		document.querySelector('.header__nav-mobile').classList.add('active')
	})
	let btnCloseNav = document.querySelector('.header__nav-close')
	btnCloseNav.addEventListener('click', function() {
		document.querySelector('.header__nav-mobile').classList.remove('active')
	})
</script>
