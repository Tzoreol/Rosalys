<img src="<?php echo BASE_DIR; ?>/styles/img/rosalys_logo.png" alt="Logo Rosalys" /><h1>Rosalys</h1>
<nav class="menu">
    <a class="menu_link <?php echo $this->isActive('home') ?>" href="Accueil">Accueil</a>
    <a class="menu_link <?php echo $this->isActive('compositions') ?>" href="Compositions">Compositions</a>
    <a class="menu_link <?php echo $this->isActive('infos') ?>" href="Infos">Informations pratiques</a>
    <a class="menu_link <?php echo $this->isActive('contact') ?>" href="Contact">Contact</a>
</nav>
<?php $this->hasSubNav() ? $this->includeSubNav() : '' ?>