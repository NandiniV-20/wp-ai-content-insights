<?php
class WPAI_API {
    public static function analyze($content) {
        $response = wp_remote_post('http://localhost:5000/analyze', [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode(['text' => $content]),
            'timeout' => 15
        ]);
        if (is_wp_error($response)) return null;
        return json_decode(wp_remote_retrieve_body($response), true);
    }
}
