
<?php $mainImageId = get_post_meta(get_the_ID(), 'main_image', true); ?>
<div class="person">
  <div class="person-legend">
    <div class="info content-activator"
      data-target-class="<?= get_post_meta(get_the_ID(), 'css_class', true) ?>"
      data-main-class="person-list-items--about">
    </div>
    <a target="_blank" href="<?= get_post_meta(get_the_ID(), 'url', true) ?>">
      <div class="kinopoisk"></div>
    </a>
  </div>
  <a href="#">
    <div class="person-image">
      <?= wp_get_attachment_image( $mainImageId, 'medium'); ?>
    </div>
    <div class="person-title">
      <?= get_the_title(); ?>
    </div>
  </a>
</div>
