<?php

get_header();
pageBanner();

 ?>


 <style>
div.fond-annonce:hover {
background-size:100% auto;
  border: 1px solid #000000;
}

.fond-annonce{
background-size:100% auto;
border: 1px solid #DADADA;

}
</style>




<div class="container container--narrow page-section">
<?php



  $url = "http://localhost:8888/wordpress" . "/wp-json/wp/v2/annonce";

  $json = file_get_contents($url);
  $array = json_decode($json, true);


?>

<div class="container container--narrow page-section">
          
    <div class="generic-content">


<?php 

foreach($array as $array){

$ID = $array["id"];
$title = get_the_title($ID);
$categorie = get_field("categories-2",$ID);
$prix = get_field('prix', $ID);
$localisation = get_field('localisation', $ID);
$image = get_field('image', $ID);
$user = get_the_author_meta($ID);




?>

<div class="fond-annonce">
  <a style="text-decoration:none" href="<?php get_permalink($ID); ?>">

  <div align="center" class='one-third' href="<?php get_permalink($ID); ?>">
<?php 

$size = 'medium';
 // (thumbnail, medium, large, full or custom size)
if( $image ) {

  $id_img = $image["id"];

    echo wp_get_attachment_image( $id_img, $size);
}

?>

  </div>


  <div class='two-thirds'>

    <h3 align="center"><?php echo $title; ?></h3>
    <h2 align="center"><?php echo $prix; ?> €</h2>
    <h5 align="center"><?php echo $categorie; ?></h5>
    <h5 align="center"><?php echo $user; ?></h5>
    <h5 align="center"><?php echo $localisation; ?></h5>


  </div>

</a>
</div>
<br>




<?php 
};

?>





</div>
</div>
</div>
<hr>




</div>
</div>
</div>



<?php 

get_footer();

?>