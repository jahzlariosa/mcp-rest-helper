=== MCP REST Helper ===
Contributors: jahzlariosa
Tags: rest-api, seo, yoast, mcp
Requires at least: 6.0
Tested up to: 6.9
Requires PHP: 7.4
Stable tag: 0.1.4
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Provides REST API helper integrations (like Yoast SEO meta) for MCP tooling.

== Description ==
MCP REST Helper exposes helper integrations through the WordPress REST API so MCP tools can update metadata without extra configuration.
It is intended for use with the WordPress MCP server: https://github.com/jahzlariosa/wordpress-mcp.

Current integrations:
* Yoast SEO meta fields (including Premium keyphrase fields when Yoast Premium is active).

== Installation ==
1. Copy the `mcp-rest-helper` folder into `wp-content/plugins/`.
2. Activate "MCP REST Helper" in the WordPress admin.

== Frequently Asked Questions ==
= Does this require Yoast Premium? =
No. Standard Yoast fields work with free Yoast SEO. Premium-only fields are registered but require Yoast Premium to take effect.

== Changelog ==
= 0.1.4 =
* Remove disallowed headers and auto-loading translations.
* Remove hidden files from the distribution package.

= 0.1.3 =
* Rename plugin to comply with WordPress.org naming rules.

= 0.1.2 =
* Documentation updates and WordPress MCP server reference.

= 0.1.1 =
* Add GPL-2.0-or-later license file and WordPress.org readme metadata updates.

= 0.1.0 =
* Initial release.

== Upgrade Notice ==
= 0.1.4 =
* Compliance fixes for WordPress.org submission.

= 0.1.3 =
* Rename plugin to MCP REST Helper for WordPress.org compliance.

= 0.1.2 =
* Documentation updates for WordPress MCP server compatibility.

= 0.1.1 =
* Metadata and licensing updates for WordPress.org compliance.
