<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="content">
      <div class="content-spacing person"></div>
      <div class="person-details--gallery">
        <div class="swiper">
          <div class="swiper-wrapper">
            <?php foreach (get_post_meta(get_the_ID(), "gallery_image") as $id): ?>
              <div class="swiper-slide">
                <div class="zoom-stop">
                  <div class="zoom-stop-icon zoom-hide"></div>
                </div>
                <?php echo wp_get_attachment_image($id, 'large', false, []); ?>
                <div class="zoom-start"></div>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      </div>
      <div class="person-details">
        <div class="person-details--left">
          <div class="person-details--icons">
            <a href="#"><div class="video"></div></a>
            <a target="_blank" href="<?php echo get_post_meta(get_the_ID(), "url_kinopoisk", true); ?>">
              <div class="kinopoisk"></div>
            </a>
          </div>
        </div>
        <div class="person-details--text">
          <div class="person-details--main">
            <?php $fio = implode(' ', [get_field("first_name"), get_field("surname"), get_field("last_name")]); ?>
            <h2 class="person-details--title"><?= $fio; ?></h2>
            <p><br /></p>
            <div class="person-details--title"><?php echo get_field("birthday"); ?></div>
            
          </div>
          <div class="person-details-jobs">
            <div class="person-details-jobs--item">
              <?php echo get_field("description")['main_description'] ?? 'no content'; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>