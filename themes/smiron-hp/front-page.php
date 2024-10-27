<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '｜', true, 'right' ); bloginfo('name');?></title>
<?php addThemeAssets(['src/css/app.css', 'src/css/app-fa.css'], ['src/js/app.js']); ?>
<?php wp_head(); ?>
</head>
<body>

<h1>エスエム鉄工のホームページ <i class="fa-solid fa-user"></i></h1>

<?php wp_footer(); ?>

</body>
</html>