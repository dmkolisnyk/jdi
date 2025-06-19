<?php
if (!empty($_POST['action']) && ($_POST['action'] === 'sendForm')) {

    if (isset($_POST['form_nonce']) && wp_verify_nonce($_POST['form_nonce'], 'post_form')) {

        $token = $_POST['cf-turnstile-response'] ?? '';
        if (empty($token)) {
            echo '<p>Turnstile verification failed. Please try again.</p>';
            exit;
        }

        $secret_key = '0x4AAAAAABhf0626C6sKXZSNN74xpij4B1c';
        $response = wp_remote_post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'body' => [
                'secret' => $secret_key,
                'response' => $token,
            ],
        ]);

        $body = wp_remote_retrieve_body($response);
        $result = json_decode($body);

        if (isset($result->success) && $result->success === true) {

            $name = sanitize_text_field($_POST['name']);
            $email = sanitize_email($_POST['email']);
            $message = sanitize_textarea_field($_POST['message']);

            wp_mail(get_option('admin_email'), 'New Contact Form Submission', "Name: $name\nEmail: $email\nMessage: $message");

            echo '<p>Form submitted successfully!</p>';
            echo '<a href='. esc_url( home_url() ) .'>Go to website</a>';
        } else {
            echo '<p>Turnstile verification failed. Please try again.</p>';
        }
    } else {
        echo '<p>Invalid nonce. Please refresh the page and try again.</p>';
    }
}
