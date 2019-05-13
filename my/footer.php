<a href="#header-lift-anchor" class="go-top" style=" display: none;"><i class="	fa fa-chevron-up"></i></a>
<footer class="site-footer">
    <div class="container-elastic">
        <ul class="contact-info">
            <li>
                <a href="mailto:<?php echo get_theme_mod('mail', ''); ?>"><span
                        class="fa fa-envelope"> </span> <?php echo get_theme_mod('mail', ''); ?></a>
            </li>
            <li>
                <a target="_blank" href="<?php echo get_theme_mod('address-map', ''); ?>"><span
                        class="fa fa-map-marker"> </span>

                    <?php
                    if (get_locale() == 'uk_UA') {
                        echo get_theme_mod('address', '');
                    } elseif (get_locale() == 'en_US') {
                        echo get_theme_mod('address-en', '');
                    } ?></a>
            </li>
        </ul>

        <?php my_social_media_icons(); ?>

    </div>
</footer>


<?php wp_footer(); ?>

</body>
</html>
