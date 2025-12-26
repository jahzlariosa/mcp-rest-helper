<?php
/**
 * Plugin Name: MCP REST Helper
 * Plugin URI: https://github.com/jahzlariosa/mcp-rest-helper
 * Description: Provides REST API helper integrations (like Yoast SEO meta) for MCP tooling, designed for the WordPress MCP server.
 * Version: 0.1.4
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: Joseph Lariosa
 * Author URI: https://github.com/jahzlariosa
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: mcp-rest-helper
 */

if (!defined("ABSPATH")) {
  exit;
}

if (!defined("MCP_REST_HELPER_VERSION")) {
  define("MCP_REST_HELPER_VERSION", "0.1.4");
}

if (!defined("MCP_REST_HELPER_PATH")) {
  define("MCP_REST_HELPER_PATH", __DIR__);
}

if (!defined("MCP_REST_HELPER_URL")) {
  define("MCP_REST_HELPER_URL", plugin_dir_url(__FILE__));
}

$integration_files = [
  MCP_REST_HELPER_PATH . "/integration-yoast.php",
];

foreach ($integration_files as $integration_file) {
  if (file_exists($integration_file)) {
    require_once $integration_file;
  }
}
