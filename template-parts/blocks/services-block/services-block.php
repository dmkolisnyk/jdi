<?php

$block_fields = get_fields();

$heading = $block_fields['heading'];
$services = $block_fields['services'];

if( !empty( $block_fields ) ) :
?>
<section id="services" class="section services-block">

    <div class="container">

        <?php if( !empty( $heading ) ) : ?>

            <h2><?php _e( $heading, 'jdi' ); ?></h2>

        <?php endif; ?>

        <?php if( !empty( $services ) ) : ?>

            <div class="services-table">

                <?php
                    foreach( $services as $service ) :
                        $service_title = isset( $service['title'] ) ? $service['title'] : '';
                        $service_description = isset( $service['description'] ) ? $service['description'] : '';
                        $service_icon = isset( $service['icon'] ) ? $service['icon'] : '';
                ?>

                    <div class="service-card">
                        <?php if( !empty( $service_title ) || !empty( $service_description ) ) : ?>
                            <div class="service-card__body">
                                <?php if( !empty( $service_title ) ) : ?>

                                    <h3 class="service-card__title">
                                        <?php _e( $service_title, 'jdi' ); ?>
                                    </h3>

                                <?php endif; ?>

                                <?php if( !empty( $service_description ) ) : ?>

                                    <div class="service-card__description">
                                        <?php _e( $service_description, 'jdi' ); ?>
                                    </div>
                                
                                <?php endif; ?>

                            </div>
                        
                        <?php endif; ?>

                        <?php if( !empty( $service_icon ) ) : ?>

                            <div class="service-card__icon">
                                <img 
                                    src="<?php echo esc_url( $service_icon['url'] ); ?>" 
                                    alt="<?php echo esc_attr( $service_icon['alt'] ); ?>"
                                    loading="lazy"
                                    />
                            </div>

                        <?php endif; ?>    
                    </div>

                 <?php endforeach; ?>


            </div>
        
        <?php endif; ?>

    </div>

</section>
<?php endif;