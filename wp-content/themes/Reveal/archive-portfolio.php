<?php
	get_header();
?>
  <section id="portfolio" class="wow fadeInUp">
    <div class="container">
      <div class="section-header">
        <h2>Naš Portfolio</h2>   
      </div>
    </div>

    <div class="container-fluid">
      <div class="row no-gutters">
      <?php
        echo daj_portfolio(); 
      ?>  
      </div>
    </div>
  </section><!-- #portfolio -->   
<?php
	get_footer();
?>
