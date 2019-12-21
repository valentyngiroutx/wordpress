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
	  $bannerinfos = get_field('image-fond-infos');
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
	<p class="titre-section"><?php the_field('conference_title'); ?></p>
	<p class="paragraphe"><?php the_field('conference_text'); ?></p>
</section>

<section class="section-3">
	<div class="bandeau-img">
		<img class="bandeau" src="<?php echo $bandeau['url']; ?>" alt="" />
	</div>
	
	<p class="titre-section"><?php the_field('programme_titre'); ?></p>
	<div class="program-grid">
		
	<div class="gauche">
		<p class="titles"><?php the_field('programme_text1'); ?></p>
		<div class="horaire">
			<?php 
				$programs = get_field("programme_edtmatin");
				foreach ($programs as $program){
 					echo "<div class='flex'><p class='horaire-text1'>".$program["programme_horaire"]."</p>";
 					echo "<p class='description-text1'>".$program["programme_description"]."</p></div>";
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
 					echo "<div class='flex1'><p class='horaire_text2'>".$program["programme_horaire2"]."</p>";
 					echo "<p class='description-text2'>".$program["programme_description2"]."</p></div>";
				}
				?>
			</p>
		</div>
	</div>
			
	</div>
	<div class="buton">
		<a href="#"><?php the_field('banner_register_link'); ?></a>
	</div>
</section>

<section class="section-4">

	<div class="orateur">
		<p class="titre-section"><?php the_field('orateur-title')?></p>
		<p class="section-4-utitle"><?php the_field('sous-texte-orateur')?></p>
		<div class="champs-repeteur-orateur">
		<?php 
			$orateurs = get_field("champ-repeteur-orateur");
			foreach ($orateurs as $orateur){
				echo "<div class='each-orateur'>";
				echo "<img class='img-orateur' src=".$orateur['image-orateur1']['url'].">";
				echo "<p class='nom-orateur'>".$orateur["nom-orateur1"]."</p>";
				echo "<p class='text-orateur'>".$orateur["texte-orateur1"]."</p>";
				echo "<div class='buton-orateur'><a href='#'>".$orateur["bouton-orateur1"]."</a></div></div>";
			}
		?>
		</div>
	</div>

</section>

<section class="section-5">

	<div class="infos-pratiques">
		<p class="titre-section"><?php the_field('titre-infos');?></p>
		<div class="infos-pratiques-parent" style="background-image: url('<?php echo $bannerinfos['url']; ?>'); background-size: cover; height: 100%; width: 100%; background-repeat: no-repeat;">
			<div class='infos-pratiques-vert'>
			<img class="img-map" src="<?php echo get_template_directory_uri(); ?>/assets/img/picto-map.svg" alt="">
			<img class="img-time" src="<?php echo get_template_directory_uri(); ?>/assets/img/picto-time.svg" alt="">
			<img class="img-dinner" src="<?php echo get_template_directory_uri(); ?>/assets/img/picto-dinner.svg" alt="">
				<?php 
					$infos = get_field("champ-repeteur-infos");
					foreach ($infos as $info){
						echo "<p class='text-infos'>".$info['lieu-infos']."</p>";
						echo "<p class='text-infos'>".$info["date-infos"]."</p>";
						echo "<p class='text-infos'>".$info["description-infos"]."</p>";
					}
				?>
			</div>
			<!-- echo "<div class='buton-orateur'><a href='#'>".$orateur["bouton-orateur1"]."</a></div> -->
		</div>
	</div>

</section>

<section class="section-6">

	<div class="videos">
		<p class="titre-section"><?php the_field('titre-videos')?></p>
		<div class="videos-grille">
		<?php
			$videos = get_field("repeteur-images-videos");
			foreach ($videos as $video) {
				echo "<div class='interieurgridvideos'>";
				echo "<div class='video1'><img class='imgvideos1' src=".$video['image1-videos']['url'].">";
				echo "<p class='titre-videos '>".$video['titre-surimages-videos1']."</p>";
				echo "<p class='text-videos'>".$video['description-surimages1']."</p></div>";
				echo "<div class='video2'><img class='imgvideos2' src=".$video['image2-videos']['url'].">";
				echo "<p class='titre-videos'>".$video['titre-surimages-videos2']."</p>";
				echo "<p class='text-videos'>".$video['description-surimages2']."</p></div>";
				echo "</div>";
			}
		?>
		</div>

		<div class="videos-grille2">
			<?php
				$videos1 = get_field("repeteur2-videos");
				foreach ($videos1 as $video1) {
					echo "<div class='img1'>";
					echo "<img class='imgvideos3' src=".$video1['image-bas-videos']['url'].">";
					echo "<p class='titre-video-bas'>".$video1['titre-bas-videos']."</p>";
					echo "<p class='resume-video-bas'>".$video1['resume-bas-videos']."</p>";
					echo "</div>";

					echo "<div class='img2'>";
					echo "<img class='imgvideos3' src=".$video1['image-bas-videos2']['url'].">";
					echo "<p class='titre-video-bas'>".$video1['titre-bas-videos2']."</p>";
					echo "<br/>";
					echo "<p class='resume-video-bas'>".$video1['resume-bas-videos2']."</p>";
					echo "</div>";

					echo "<div class='img3'>";
					echo "<img class='imgvideos3' src=".$video1['image-bas-videos3']['url'].">";
					echo "<p class='titre-video-bas'>".$video1['titre-bas-videos3']."</p>";
					echo "<p class='resume-video-bas'>".$video1['resume-bas-videos3']."</p>";
					echo "</div>";

					echo "<div class='img4'>";
					echo "<img class='imgvideos3' src=".$video1['image-bas-videos4']['url'].">";
					echo "<p class='titre-video-bas'>".$video1['titre-bas-videos4']."</p>";
					echo "<p class='resume-video-bas'>".$video1['resume-bas-videos4']."</p>";
					echo "</div>";
				}
			?>
	</div>

</section>
	
</div>

<?php get_footer(); ?>