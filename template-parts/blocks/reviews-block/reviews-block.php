<?php

$block_fields = get_fields();

$heading = $block_fields['heading'];

$reviews = get_posts(array(
    'post_type' => 'reviews',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'ASC',
));

if( !empty($reviews) ) :
?>
<section id="reviews" class="section review-block">

    <div class="container">

        <?php if( !empty( $heading ) ) : ?>

            <h2><?php _e( $heading, 'jdi' ); ?></h2>

        <?php endif; ?>

        <div class="reviews-carousel swiper">

            <div class="swiper-wrapper">

                <?php
                        
                    foreach( $reviews as $review ) : setup_postdata( $review );
                        $thumb_id = get_post_thumbnail_id($review);
                        $thumb_url = get_the_post_thumbnail_url($review);
                        $alt_text = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                    
                ?>
                    <div class="swiper-slide">

                        <div class="review-card">

                            <div class="review-card__person">

                                <div class="review-card__person-left">
                                        <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr($alt_text); ?>" loading="lazy" />
                                </div>

                                <div class="review-card__person-right">
                                    <div><?php echo get_the_title( $review ); ?></div>
                                </div>

                            </div>

                            <div class="review-card__content">

                                <?php if( !empty( get_the_excerpt( $review ) ) ) : ?>

                                    <p class="review-card__body">

                                        <?php echo get_the_excerpt( $review ); ?>

                                    </p>

                                <?php else: ?>

                                    <p class="review-card__body">

                                        <?php 
                                            _e(
                                                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                            Donec mattis elit eget neque imperdiet posuere. 
                                            Nullam congue auctor ligula. Maecenas facilisis rutrum porttitor. 
                                            Quisque posuere nisi eget placerat auctor. Sed.', 
                                            'jdi'
                                            );     
                                        ?>
                                    </p>

                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                <?php 

                    endforeach; 

                    wp_reset_postdata(); 
                    
                ?>

            </div>
            
            <div class="reviews-carousel__pagination swiper-pagination"></div>
            
        </div>

    </div>

</section>
        
<?php endif;