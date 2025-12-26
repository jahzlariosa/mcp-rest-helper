# WordPress MCP Helper

Exposes helper integrations through the WordPress REST API so MCP tools can
update metadata without extra configuration.

## Install

1) Copy `mcp-rest-helper` into `wp-content/plugins/`.
2) Activate "WordPress MCP Helper" in the WordPress admin.

## Integrations

### Yoast SEO

Exposes Yoast SEO meta fields in the REST API so MCP tools can update SEO
metadata. Premium keyphrase fields (synonyms and related keyphrases) are also
registered; they require Yoast Premium to be active to have an effect.

Premium meta keys exposed:

- `_yoast_wpseo_focuskw_synonyms`
- `_yoast_wpseo_focuskeywords`
- `_yoast_wpseo_keywordsynonyms`

## Extending

- Filter `mcp_yoast_meta_keys` to add/remove Yoast meta keys.
- Filter `mcp_yoast_meta_post_types` to control which post types are registered.
- Filter `mcp_yoast_meta_args` to customize `register_post_meta` arguments.
- Add new integration files and include them from
  `mcp-rest-helper/mcp-rest-helper.php`.

## License

GPL-2.0-or-later.
