<!--========================================
MAILCHIMP EMBED
===========================================-->
<?
  $mailchimpSignupUrl = '';
  if (!empty(get_field('mailchimp_signup_url'))) {
    $mailchimpSignupUrl = get_field('mailchimp_signup_url');
  } else if (!empty(get_field('mailchimp_signup_url', 'option'))) {
    $mailchimpSignupUrl = get_field('mailchimp_signup_url', 'option');
  }
?>

<!-- Begin Mailchimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
  <form action="<?= $mailchimpSignupUrl ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
      <!-- If it's not the footer, show phone and name -->
      <? if (get_field('show_phone_and_name')) { ?>
        <div class="flex-row">
          <div class="mc-field-group">
            <input type="text" value="" name="FNAME" placeholder="Name" class="" id="mce-FNAME">
          </div>
          <div class="mc-field-group size1of2">
            <input type="text" name="PHONE" placeholder="Phone" class="" value="" id="mce-PHONE">
          </div>
        </div>
      <? } ?>
      <div class="mc-field-group email-field">
        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address">
      </div>
      <div id="mce-responses" class="clear">
        <div class="response" id="mce-error-response" style="display:none"></div>
        <div class="response" id="mce-success-response" style="display:none"></div>
      </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
      <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_80b5f814a966438603500a482_7d0bf84247" tabindex="-1" value=""></div>
      <div class="clear button-row">
        <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="link-btn">
          <? if (!empty(get_field('newsletter_button_text'))) { ?>
            <?  the_field('newsletter_button_text') ?>
          <? } else if (!empty(get_field('newsletter_button_text', 'option'))) { ?>
            <?  the_field('newsletter_button_text', 'option') ?>
          <? } else { ?>
            Join
          <? } ?>
          <span class="arrow">
            <? get_template_part( 'template-parts/vector', 'arrow' ); ?>
          </span>
        </button>
      </div>
    </div>
  </form>
</div>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/vendor/local-mc-validate.js"></script>
<!-- <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script> -->
<script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='MMERGE3';ftypes[3]='text';fnames[4]='MMERGE4';ftypes[4]='text';fnames[5]='MMERGE5';ftypes[5]='text';fnames[6]='MMERGE6';ftypes[6]='text';fnames[7]='MMERGE7';ftypes[7]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->
