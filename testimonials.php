<?php
defined('ABSPATH') || exit;

function show_testimonials()
{

?>
    <div id="phonewr">
        <div id="phone">
            <img id="phonecase" src="/wp-content/uploads/2023/06/phone-case.webp" alt="">
            <div id="testiphotowr">
                <div id="testiphoto">
                    <?php
                    $testimonials = carbon_get_theme_option('testimonials');
                    foreach ($testimonials as $testimonial) {
                        $photo = $testimonial['photo_testimonial'];
                    ?>
                        <div class="thetestimonial">
                            <img src="<?php echo $photo; ?>" alt="">
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php

}
