    <script>
     /*   if (window.location.protocol == 'http:'){
            window.location.href = "https://" + window.location.host+window.location.pathname;
        } */
   </script>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="<?php echo $this->_helpers->linkTo('fonts/simple-line-icons/simple-line-icons.min.css', 'Assets') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo $this->_helpers->linkTo('fonts/font-awesome/css/font-awesome.min.css', 'Assets') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $this->_helpers->linkTo('fonts/material-design-icons/material-icon.css', 'Assets') ?>" rel="stylesheet" type="text/css" />
    <!--bootstrap -->
    <link href="<?php echo $this->_helpers->linkTo('plugins/bootstrap/css/bootstrap.min.css', 'Assets') ?>" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="<?php echo $this->_helpers->linkTo('plugins/material/material.min.css', 'Assets') ?>">
    <link rel="stylesheet" href="<?php echo $this->_helpers->linkTo('css/pages/formlayout.css', 'Assets') ?>"/>
    <link rel="stylesheet" href="<?php echo $this->_helpers->linkTo('css/material_style.css', 'Assets') ?>">
    <!-- Jquery Toast css -->
    <link rel="stylesheet" href="<?php echo $this->_helpers->linkTo('plugins/jquery-toast/dist/jquery.toast.min.css', 'Assets') ?>">
    <!-- Theme Styles -->
    <link href="<?php echo $this->_helpers->linkTo('css/theme/light/theme_style.css', 'Assets') ?>" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="<?php echo $this->_helpers->linkTo('css/plugins.min.css', 'Assets') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo $this->_helpers->linkTo('css/theme/light/style.css', 'Assets') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo $this->_helpers->linkTo('css/responsive.css', 'Assets') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo $this->_helpers->linkTo('css/theme/light/theme-color.css', 'Assets') ?>" rel="stylesheet" type="text/css" />
    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo $this->_helpers->linkTo('img/KodiGoIco.png', 'Assets') ?>" />
    <!-- Sweet-Alert  -->
    <link href="<?php echo $this->_helpers->linkTo('plugins/bootstrap-sweetalert/sweet-alert.css', 'Assets') ?>" rel="stylesheet" type="text/css">
      <!-- data tables -->
    <link href="<?php echo $this->_helpers->linkTo('plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css', 'Assets') ?>" rel="stylesheet" type="text/css"/>


    <!-- steps -->
    <link href="<?php echo $this->_helpers->linkTo('plugins/steps/steps.css', 'Assets') ?>" rel="stylesheet" type="text/css">
    <!-- data tables -->
    <style>
        .error {
            color: red;
        }
    </style>

    <script >
        var localRuta = '<?php echo GlobalValuesPage::Host; ?>';
    </script>
    <script>
        if(window.history.forward(1) != null)   window.history.forward(1);
    </script>