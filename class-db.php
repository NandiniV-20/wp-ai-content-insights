<?php
class WPAI_DB {
    public static function create_table() {
        global $wpdb;
        $table = $wpdb->prefix . 'wpai_insights';
        $charset = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE $table (
            id INT AUTO_INCREMENT PRIMARY KEY,
            post_id INT NOT NULL,
            keywords TEXT,
            readability FLOAT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) $charset;";
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }
    public static function insert($post_id, $keywords, $readability) {
        global $wpdb;
        $wpdb->insert(
            $wpdb->prefix . 'wpai_insights',
            [
                'post_id' => $post_id,
                'keywords' => $keywords,
                'readability' => $readability
            ]
        );
    }
}
