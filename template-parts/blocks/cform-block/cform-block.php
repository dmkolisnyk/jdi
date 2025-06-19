<?php

$block_fields = get_fields();
$heading = $block_fields['heading'];

?>
<section id="contact" class="section cform-block">

    <div class="container">
        <?php if( !empty( $heading ) ) : ?>

            <h2><?php _e( $heading, 'jdi' ); ?></h2>

        <?php endif; ?>

                <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

                <form id="contact-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                    <input type="hidden" name="action" value="sendForm">
                    <?php wp_nonce_field('post_form', 'form_nonce'); ?>

                    <p>
                        <input name="name" type="text" value="" placeholder="<?php _e( 'Your name', 'jdi' ); ?>" required>
                    </p>

                    <p>
                        <input name="email" type="email" value="" placeholder="<?php _e( 'Your email', 'jdi' ); ?>" required>
                    </p>

                    <p>
                        <textarea name="message" placeholder="<?php _e( 'Your message', 'jdi' ); ?>" required></textarea>
                    </p>

                    <!-- Cloudflare Turnstile -->
                    <div class="cf-turnstile" data-sitekey="0x4AAAAAABhf0-eMFN4MgsM7"></div>

                    <p><input type="submit" value="Submit"></p>
                </form>
            </div>
        </section>