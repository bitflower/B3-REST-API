# B3 REST API Extensions

This plugin extends the [WP-API](https://github.com/WP-API/WP-API) in order to retrieve data not yet handled by the official plugin, such as settings, menus and sidebars.

[![Build Status](https://scrutinizer-ci.com/g/B3ST/B3-REST-API/badges/build.png?b=master)](https://scrutinizer-ci.com/g/B3ST/B3-REST-API/build-status/master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/B3ST/B3-REST-API/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/B3ST/B3-REST-API/?branch=master)

## Warning

**The official WP API is undergoing substantial changes and may break compatibility with B3 at any time.**

It is recommended that you either use [the version on WordPress.org](https://wordpress.org/plugins/json-rest-api/) or at the very least stick to the [master branch](https://github.com/WP-API/WP-API) in order to minimize issues.

Also, please bear in mind that B3 is a work in progress and can't (yet) be considered ready for production use. Do so at your own risk.

## Installation

1. Install the official [WP-API](https://wordpress.org/plugins/json-rest-api/) plugin and activate it.
2. Clone the `B3-REST-API` repository into the _plugins_ folder of your WordPress install.
3. Navigate to _Plugins_ in the WordPress Admin, look for "B3 REST API Extensions" and activate it.
4. As with the WP-API plugin, the B3 REST API Extensions require pretty permalinks to be enabled.

## Endpoints

The B3 REST API Extensions plugin enables the following additional endpoints.

To make it easier to tell B3 extensions apart from the other endpoints, all of our additions are prepended by `b3_`.

### Comments

We provide an alternative implementation of the Comments resource that allows retrieving comments without having to know which post they belong to.

* `GET` `/b3_comments/<id>`
* `GET` `/b3_comments/<id>/b3_replies`
* `POST` `/b3_comments/<id>/b3_replies`
* `GET` `/media/<id>/b3_replies`
* `POST` `/media/<id>/b3_replies`
* `GET` `/pages/<id>/b3_replies`
* `POST` `/pages/<id>/b3_replies`
* `GET` `/posts/<id>/b3_replies`
* `POST` `/posts/<id>/b3_replies`

### Media

This endpoint provides a way to fetch a media attachment by its slug.

* `GET` `/media/b3_slug:<slug>`

### Posts

This endpoint provides a way to fetch a post by its slug.

* `GET` `/posts/b3_slug:<slug>`

### Menus

We provide endpoints to fetch all Menus registered by the theme as well as the menu items configured in the WordPress Admin.

* `GET` `/b3_menus`
* `GET` `/b3_menus/<location>`

### Sidebars

Similar to Menus, we allow fetching all widget areas registered by the theme as well as their widgets and widget content.

* `GET` `/b3_sidebars`
* `GET` `/b3_sidebars/<index>`

### Settings

Finally, this plugin exposes WordPress settings through the API.  It wraps the `get_bloginfo()` function but exposes a few additional site options as well as the pretty permalinks table.

* `GET` `/b3_settings`
* `GET` `/b3_settings/<option>`

### ACF (Advanced Custom Fields) Options Page fields

Exposes all fields from a ACF options page if available.

* `GET` `/b3_acf/options`
