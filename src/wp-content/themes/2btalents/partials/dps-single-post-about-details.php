
<?php $mainImageId = get_post_meta(get_the_ID(), 'main_image', true); ?>
<div class="content-close-button"></div>
<div class="person-about">
  <div class="person">
    <a href="#">
      <div class="person-image">
        <?= wp_get_attachment_image( $mainImageId, 'medium'); ?>
      </div>
      <div class="person-title">
        <?= get_the_title(); ?>
      </div>
    </a>
  </div>
</div>