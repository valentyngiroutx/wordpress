<?php get_header(); ?>

<div class="container">

<?php
if ( have_posts() ) {
  while ( have_posts() ) {
    /**
     * La méthode the_post() permet de charger le post courant
     * Un post est un type de contenu, par exemple une actualité ou une page
     **/
    the_post(); 

    /**
     * La méthode the_content() affiche le contenu du post en cours
     * Il s'agit du contenu que vous avez renseigné dans le back-office
     * Il existe d'autres méthodes, par exemple pour afficher le Titre du contenu, on peut utiliser la méthode the_title()
     */
    the_content();
	  $banner = get_field('banner_background_image');
	  $bandeau = get_field('conference_bandeau');
  }
}
?>

<section class="section-1" style="background-image: url('<?php echo $banner['url']; ?>'); background-size: cover; height: 100%; width: 100%; background-repeat: no-repeat;">
	<div>
		<p class="section-title"><?php the_field('banner_baseline'); ?></p>
		<p class="marron-title"><?php the_field('banner_title_brown'); ?></p>
		<p class="green-title"><?php the_field('banner_title_green'); ?></p>
	
		<div class="buton">
			<a href="#"><?php the_field('banner_register_link'); ?></a>
		</div>
	</div>
</section>
	
<section class="section-2">
	<p class="section-title2"><?php the_field('conference_title'); ?></p>
	<p class="paragraphe"><?php the_field('conference_text'); ?></p>
</section>

<section class="section-3">
	<div class="bandeau-img">
		<img class="bandeau" src="<?php echo $bandeau['url']; ?>" alt="" />
	</div>
	
	<p class="programme"><?php the_field('programme_titre'); ?></p>
	<div class="program-grid">
		
	<div class="gauche">
		<p class="titles"><?php the_field('programme_text1'); ?></p>
		<div class="horaire">
			<?php 
				$programs = get_field("programme_edtmatin");
				foreach ($programs as $program){
 					echo "<div class='flex'><p class='horaire-text'>".$program["programme_horaire"]."</p>";
 					echo "<p class='horaire-text1'>".$program["programme_description"]."</p></div>";
				}
				?>
			</p>
		</div>
	</div>	
	
	<div class="droite">
		<p class="titles"><?php the_field('programme_text2'); ?></p>
		<div class="horaire2">
			<p class="horaire1">
				<?php 
				$programs = get_field("programme_edtaprem");
				foreach ($programs as $program){
 					echo "<div class='flex'><p class='horaire_text'>".$program["programme_horaire2"]."</p>";
 					echo "<p class='horaire-text1'>".$program["programme_description2"]."</p></div>";
				}
				?>
			</p>
		</div>
	</div>
			
	</div>
</section>
	
</div>

<?php get_footer(); ?>