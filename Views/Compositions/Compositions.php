<div class="card">
<h2 id="plaisir_doffrir">Plaisir d'offrir</h2>
<div class="card_content">
<?php 
    $dir = dirname(dirname(dirname(__FILE__))). "/styles/img/compositions/Plaisir_Doffrir/";
    
    foreach(scandir($dir) as $picture) {
        if(strcmp($picture, '.') != 0 && strcmp($picture, '..') != 0) {
           $pictureInfo = getimagesize('./styles/img/compositions/Plaisir_Doffrir/'. $picture);
        ?><img class="thumbnail" src="<?php echo BASE_DIR. '/styles/img/compositions/Plaisir_Doffrir/' .$picture ?>" alt="<?php echo str_replace('_', ' ',explode('\.', $picture)[0]) ?>" normalHeight="<?php echo $pictureInfo[1] ?>" normalWidth="<?php echo $pictureInfo[0] ?>"/><?php
    
        }
        }
?>
</div>
</div>
<div class="card">
<h2 id="anniversaire">Anniversaire</h2>
<div class="card_content">
<?php 
    $dir = dirname(dirname(dirname(__FILE__))). "/styles/img/compositions/Anniversaire/";
    
    foreach(scandir($dir) as $picture) {
        if(strcmp($picture, '.') != 0 && strcmp($picture, '..') != 0) {
            $pictureInfo = getimagesize('./styles/img/compositions/Anniversaire/'. $picture);
        ?><img class="thumbnail" src="<?php echo BASE_DIR. '/styles/img/compositions/Anniversaire/' .$picture ?>" alt="<?php echo str_replace('_', ' ',explode('\.', $picture)[0]) ?>" normalHeight="<?php echo $pictureInfo[1] ?>" normalWidth="<?php echo $pictureInfo[0] ?>"/><?php
    
        }
        }
?>
</div>
</div>
<div class="card">
<h2 id="deuil">Deuil</h2>
<div class="card_content">
<?php 
    $dir = dirname(dirname(dirname(__FILE__))). "/styles/img/compositions/Deuil/";
    
    foreach(scandir($dir) as $picture) {
        if(strcmp($picture, '.') != 0 && strcmp($picture, '..') != 0) {
            $pictureInfo = getimagesize('./styles/img/compositions/Deuil/'. $picture);
        ?><img class="thumbnail" src="<?php echo BASE_DIR. '/styles/img/compositions/Deuil/' .$picture ?>" alt="<?php echo str_replace('_', ' ',explode('\.', $picture)[0]) ?>" normalHeight="<?php echo $pictureInfo[1] ?>" normalWidth="<?php echo $pictureInfo[0] ?>"/><?php
    
        }
        }
?>
</div>
</div>
<div class="card">
<h2 id="mariage">Mariage</h2>
<div class="card_content">
<?php 
    $dir = dirname(dirname(dirname(__FILE__))). "/styles/img/compositions/Mariage/";
    
    foreach(scandir($dir) as $picture) {
        if(strcmp($picture, '.') != 0 && strcmp($picture, '..') != 0) {
            $pictureInfo = getimagesize('./styles/img/compositions/Mariage/'. $picture);
        ?><img class="thumbnail" src="<?php echo BASE_DIR. '/styles/img/compositions/Mariage/' .$picture ?>" alt="<?php echo str_replace('_', ' ',explode('\.', $picture)[0]) ?>" normalHeight="<?php echo $pictureInfo[1] ?>" normalWidth="<?php echo $pictureInfo[0] ?>"/><?php
    
        }
        }
?>
</div>
</div>
<div class="card">
<h2 id="seminaires">Seminaires</h2>
<div class="card_content">
<?php 
    $dir = dirname(dirname(dirname(__FILE__))). "/styles/img/compositions/Seminaires/";

    if(count(scandir($dir)) <= 2) {
        echo "Aucune photo pour cette cat&eacute;gorie";    
    }
    
    foreach(scandir($dir) as $picture) {
        if(strcmp($picture, '.') != 0 && strcmp($picture, '..') != 0) {
            $pictureInfo = getimagesize('./styles/img/compositions/Seminaires/'. $picture);
        ?><img class="thumbnail" src="<?php echo BASE_DIR. '/styles/img/compositions/Seminaires/' .$picture ?>" alt="<?php echo str_replace('_', ' ',explode('\.', $picture)[0]) ?>"normalHeight="<?php echo $pictureInfo[1] ?>" normalWidth="<?php echo $pictureInfo[0] ?>" /><?php
    
        }
        }
?>
</div>
</div>
<div id="fade">
    <i id="previous" class="material-icons">keyboard_arrow_left</i>
    <img src="" alt="Photo agrandie" />
    <i id="next" class="material-icons">keyboard_arrow_right</i>
    <i id="close" class="material-icons validate">clear</i>
</div>