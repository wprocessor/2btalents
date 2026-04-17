<?php
/**
 * @package WordPress
 * @subpackage Theme_Compat
 * @deprecated 3.0.0
 *
 * This file is here for backward compatibility with old themes and will be removed in a future version
 */
_deprecated_file(
	/* translators: %s: Template name. */
	sprintf( __( 'Theme without %s' ), basename( __FILE__ ) ),
	'3.0.0',
	null,
	/* translators: %s: Template name. */
	sprintf( __( 'Please include a %s template in your theme.' ), basename( __FILE__ ) )
);
?>

      <div class="footer mt-7915">
        <footer>
          <div class="footer-left">
            <hr />
          </div>
          <div class="footer-right">
            <div class="footer-menu ls-25">
              <div class="footer-menu-item">
                <a href="/">главная</a>
              </div>
              <div class="footer-menu-item--skip">
                •
              </div>
              <div class="footer-menu-item">
                <a href="/about.html">о нас</a>
              </div>
              <div class="footer-menu-item--skip">
                •
              </div>
              <div class="footer-menu-item">
                <a href="/2talents.html">талантам</a>
              </div>
            </div>
            <div class="footer-menu-contacts">
              <a href="tel:+79164606622"><div class="phone"></div></a>
              <a href="mailto:t@2btalents.ru"><div class="mail"></div></a>
            </div>
          </div>
        </footer>
      </div>


</div>

<!-- Gorgeous design by Michael Heilemann - http://binarybonsai.com/ -->
<?php /* "Just what do you think you're doing Dave?" */ ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
		<?php wp_footer(); ?>
</body>
</html>
