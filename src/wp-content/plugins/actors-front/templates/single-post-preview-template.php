<?php if ( $postData ): ?>

<?php $mainImageId = get_post_meta($postData->ID, 'main_image', true); ?>

<div class="person">
  <a href="<?= get_post_permalink($postData->ID) ?>">
    <div class="person-image">
      <?= wp_get_attachment_image( $mainImageId, 'medium') ?>
    </div>
    <div class="person-title"><?= $postData->post_title; ?></div>
  </a>
</div>
<?php endif; ?>