<?php
/*
Plugin Name: Simple Contact Form
Description: Adds a basic contact form with name, email, and message fields.
Version: 1.0
Author: Your Name
*/

// Add contact form shortcode
function simple_contact_form_shortcode() {
    ob_start();
    ?>
    <div class="simple-contact-form">
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="message">Message:</label>
            <textarea name="message" required></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('simple_contact_form', 'simple_contact_form_shortcode');

// Handle form submission
function handle_contact_form_submission() {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["name"], $_POST["email"], $_POST["message"])) {
        $name = sanitize_text_field($_POST["name"]);
        $email = sanitize_email($_POST["email"]);
        $message = sanitize_textarea_field($_POST["message"]);

        // You can add additional processing logic here, like sending an email

        // For this example, let's just display a success message
        echo '<div class="contact-form-success">Thank you for your message!</div>';
    }
}

add_action('init', 'handle_contact_form_submission');
?>
