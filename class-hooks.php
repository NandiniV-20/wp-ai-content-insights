<?php
class WPAI_Hooks {
    public function __construct() {
        add_action('publish_post', [$this, 'analyze_post']);
        add_action('admin_menu', [$this, 'admin_menu']);
    }
    public function analyze_post($post_id) {
        $post = get_post($post_id);
        if (!$post) return;
        $result = WPAI_API::analyze($post->post_content);
        if ($result) {
            WPAI_DB::insert(
                $post_id,
                implode(',', $result['keywords']),
                $result['readability']
            );
        }
    }
    public function admin_menu() {
        add_menu_page(
            'AI Content Insights',
            'AI Insights',
            'manage_options',
            'wpai-insights',
            function () {
                include WPAI_PATH . 'admin/admin-page.php';
            }
        );
    }
}
