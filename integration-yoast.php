<?php

if (!defined("ABSPATH")) {
  exit;
}

function mcp_yoast_rest_helper_meta_auth_callback(
  $allowed,
  $meta_key,
  $post_id = null,
  $user_id = null,
  $cap = null,
  $caps = null
) {
  if (is_bool($allowed) && !$allowed) {
    return false;
  }

  if ($post_id) {
    return current_user_can("edit_post", $post_id);
  }

  return current_user_can("edit_posts") || current_user_can("edit_pages");
}

function mcp_yoast_rest_helper_get_meta_keys() {
  $meta_keys = [
    "_yoast_wpseo_title" => [
      "type" => "string",
      "sanitize_callback" => "sanitize_text_field",
    ],
    "_yoast_wpseo_metadesc" => [
      "type" => "string",
      "sanitize_callback" => "sanitize_textarea_field",
    ],
    "_yoast_wpseo_focuskw" => [
      "type" => "string",
      "sanitize_callback" => "sanitize_text_field",
    ],
    "_yoast_wpseo_focuskw_synonyms" => [
      "type" => "string",
      "sanitize_callback" => "sanitize_textarea_field",
    ],
    "_yoast_wpseo_focuskeywords" => [
      "type" => "string",
      "sanitize_callback" => "sanitize_textarea_field",
    ],
    "_yoast_wpseo_keywordsynonyms" => [
      "type" => "string",
      "sanitize_callback" => "sanitize_textarea_field",
    ],
    "_yoast_wpseo_canonical" => [
      "type" => "string",
      "sanitize_callback" => "esc_url_raw",
    ],
    "_yoast_wpseo_meta-robots-noindex" => [
      "type" => "integer",
      "sanitize_callback" => "absint",
    ],
    "_yoast_wpseo_meta-robots-nofollow" => [
      "type" => "integer",
      "sanitize_callback" => "absint",
    ],
    "_yoast_wpseo_opengraph-title" => [
      "type" => "string",
      "sanitize_callback" => "sanitize_text_field",
    ],
    "_yoast_wpseo_opengraph-description" => [
      "type" => "string",
      "sanitize_callback" => "sanitize_textarea_field",
    ],
    "_yoast_wpseo_twitter-title" => [
      "type" => "string",
      "sanitize_callback" => "sanitize_text_field",
    ],
    "_yoast_wpseo_twitter-description" => [
      "type" => "string",
      "sanitize_callback" => "sanitize_textarea_field",
    ],
  ];

  return apply_filters("mcp_yoast_meta_keys", $meta_keys);
}

function mcp_yoast_rest_helper_register_meta() {
  if (!function_exists("register_post_meta")) {
    return;
  }

  $post_types = get_post_types(["show_in_rest" => true], "names");
  $post_types = apply_filters("mcp_yoast_meta_post_types", $post_types);
  $meta_keys = mcp_yoast_rest_helper_get_meta_keys();

  if (!is_array($post_types) || !is_array($meta_keys)) {
    return;
  }

  foreach ($post_types as $post_type) {
    foreach ($meta_keys as $meta_key => $config) {
      if (is_int($meta_key)) {
        $meta_key = $config;
        $config = [];
      }

      if (!is_string($meta_key) || $meta_key === "") {
        continue;
      }

      $args = [
        "type" => isset($config["type"]) ? $config["type"] : "string",
        "single" => true,
        "show_in_rest" => true,
        "auth_callback" => "mcp_yoast_rest_helper_meta_auth_callback",
      ];

      if (isset($config["sanitize_callback"])) {
        $args["sanitize_callback"] = $config["sanitize_callback"];
      }

      $args = apply_filters(
        "mcp_yoast_meta_args",
        $args,
        $meta_key,
        $post_type
      );

      register_post_meta($post_type, $meta_key, $args);
    }
  }
}

add_action("init", "mcp_yoast_rest_helper_register_meta");
