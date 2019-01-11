<?php
	get_header();
?>
<section id="team" class="wow fadeInUp">
    <div class="container">
        <div class="section-header">
            <h2>Naš Team</h2>
        </div>
        <div class="row">
            <?php echo daj_zaposlenike();?>
        </div>
    </div>
</section>  
<?php
	get_footer();
?>
