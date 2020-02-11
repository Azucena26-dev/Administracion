<li class="sidebar-user-panel">
    <div class="user-panel">
        <div class="pull-left profile-userpic">
            <img src="<?php echo !empty($_SESSION["imagen_perfil"]) ? $this->_helpers->linkTo($_SESSION["imagen_perfil"], 'Assets') : $this->_helpers->linkTo('img/KodiGo.png', 'Assets') ?>" alt="User Image" />
            <br>
            <span><b><?php echo $_SESSION['username'] ?></b></span><br>
            <span>Bienvenido!</span>
        </div>
    </div>
</li>