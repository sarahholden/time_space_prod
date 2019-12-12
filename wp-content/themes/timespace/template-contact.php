<?php /* Template Name: Contact */ ?>

<? get_header(); ?>
<main class="site-content">

  <div class="container secondary page-contact">
    <h1><?= the_field('main_heading') ?></h1>

    <div class="cols-2-1">
      <div>
        <? if (have_rows('contact_section')) { ?>
          <? while( have_rows('contact_section') ): the_row(); ?>
          <div class="cols-2">
            <? if(get_sub_field('heading')) { ?>
              <h2 class="cell"><? the_sub_field('heading'); ?></h2>
            <? } ?>
            <? if(get_sub_field('desc')) { ?>
              <div class="desc cell">
                <?= the_sub_field('desc') ?>
              </div>
            <? } ?>
          </div>
          <? endwhile; ?>
        <? } ?>
      </div>
      <?
      echo do_shortcode('[wpforms id="75" title="false" description="false"]');
      ?>
    </div>

  </div>



</main>
<? get_footer(); ?>
