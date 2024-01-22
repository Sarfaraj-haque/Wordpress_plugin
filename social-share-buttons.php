<?php
/*
Plugin Name: Social Share Buttons
Description: Adds social media share buttons to your posts.
Version: 1.0
Author: Your Name
*/

// Add share buttons to single post content
function add_social_share_buttons($content) {
    if (is_single()) {
        $post_url = get_permalink();
        $post_title = get_the_title();

        $share_buttons = '
            <div class="social-share-buttons">
                <a href="https://www.facebook.com/sharer/sharer.php?u=' . esc_url($post_url) . '" target="_blank" class="share-button facebook">Share on Facebook</a>
                <a href="https://twitter.com/intent/tweet?url=' . esc_url($post_url) . '&text=' . esc_attr($post_title) . '" target="_blank" class="share-button twitter">Share on Twitter</a>
                <a href="https://www.linkedin.com/shareArticle?url=' . esc_url($post_url) . '&title=' . esc_attr($post_title) . '" target="_blank" class="share-button linkedin">Share on LinkedIn</a>
            </div>
        ';

        $content .= $share_buttons;
    }

    return $content;
}

add_filter('the_content', 'add_social_share_buttons');
?>
