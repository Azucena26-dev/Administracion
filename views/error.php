<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Panel administrador admin" />
    <meta name="author" content="admin" />
    <title>Página no encontrada | <?php echo GlobalValuesPage::TitleGlobal; ?></title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="<?php echo $this->linkTo('fonts/font-awesome/css/font-awesome.min.css', 'Assets') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->linkTo('fonts/material-design-icons/material-icon.css', 'Assets') ?>" rel="stylesheet" type="text/css" />
    <!-- bootstrap -->
    <link href="<?php echo $this->linkTo('plugins/bootstrap/css/bootstrap.min.css', 'Assets') ?>" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="<?php echo $this->linkTo('css/pages/extra_pages.css', 'Assets') ?>">
    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo $this->linkTo('img/KodiGo.png', 'Assets') ?>" />
</head>
<body>
<div class="limiter">
    <div class="container-login100 page-background">
        <div class="wrap-login100">
            <form class="form-404">
					<span class="login100-form-logo">
						<img alt="" src="<?php echo $this->linkTo('img/KodiGo.png', 'Assets') ?>">
					</span>
                <span class="form404-title p-b-34 p-t-27">
						Error 404
					</span>
                <p class="content-404">La página que está buscando no existe o se produjo otro error.</p>
                <div class="container-login100-form-btn">
                    <a href="<?php echo $this->linkTo('') ?>" class="login100-form-btn">
                       Ir a la página principal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- start js include path -->
<script src="<?php echo $this->linkTo('plugins/jquery/jquery.min.js', 'Assets') ?>" ></script>
<!-- bootstrap -->
<script src="<?php echo $this->linkTo('plugins/bootstrap/js/bootstrap.min.js', 'Assets') ?>" ></script>
<script src="<?php echo $this->linkTo('js/pages/extra-pages/pages.js', 'Assets') ?>" ></script>
<!-- end js include path -->
</body>
</html>