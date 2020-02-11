<!-- start sidebar menu -->
<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll" class="left-sidemenu">
            <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <?php require_once "_user_sidebar.php";?>
                <!--menu estatico-->
                <li>                    
                    <a href="<?php echo $this->_helpers->linkTo('index/dashboard') ?>" class="">
                        <i class="material-icons">dashboard</i>
                        <span class="title">
                            inicio
                        </span>
                    </a>
                </li>
                <?php
                $ruta = "";
                $subMenu = "";
                $clase = "";
                    if (isset ( $_SESSION['id_menu'] )) {                    
                        foreach ( $_SESSION['id_menu'] as $m ) {
                            if($m['id_menu_padre'] == 0){
                                if (strlen($m['clase'])!=0) {
                                    $clase = "arrow open";
                                }else{
                                    $clase = "";
                                }
                ?>
                <li class="nav-item start">
                    
                    <a href="<?php echo $this->_helpers->linkTo($m['ruta']) ?>" class="<?php echo $m['clase'] ?>">
                        <i class="material-icons"><?php echo $m['icono'] ?></i>                        
                        <span class="title">
                            <?php echo $m['menu']; ?>
                        </span>
                        <span class="selected"></span>
                        <span class="<?php echo $clase; ?>"></span>
                    </a>
                    <ul class="sub-menu">
                        <?php                           
                            foreach ($_SESSION['id_menu'] as $sm) {
                                if ($sm['id_menu_padre']==$m['id_menu']) {
                                    if ($sm['activo']==1) {
                                        $ruta = $sm['ruta'];
                                        $subMenu = $sm['menu'];
                                    }
                        ?>
                        <li class="nav-item">
                            <a href="<?php echo $this->_helpers->linkTo($ruta) ?>" class="nav-link">
                                <span class="title">
                                    <?php echo $subMenu; ?>
                                </span>                                
                            </a>
                        </li>
                        <?php
                                }
                            }                     
                        ?>
                    </ul>
                </li>
                 <?php  
                            }
                        }
                    }
                 ?>
                <!--menu estatico-->
            </ul>
        </div>
    </div>
</div>
<!-- end sidebar menu -->