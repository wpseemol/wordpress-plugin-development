<h1>Query Posts</h1>

<h2> <a href="https://developer.wordpress.org/reference/hooks/admin_menu/"> `add_menu` Hook</a></h2>

The `add_menu` hook allows developers to add or customize menus in the WordPress admin area. It is typically used to create new top-level menu items or add submenus to existing menus.

### Usage

To use the `add_menu` hook, you can add a callback function that registers your menu items. This is done using the `add_action` function.

### Example: Adding a Custom Menu

```php
add_action('admin_menu', 'my_custom_menu');

function my_custom_menu() {
    add_menu_page(
        'Custom Menu Title',  // Page title
        'Custom Menu',        // Menu title
        'manage_options',     // Capability required to access
        'custom-menu-slug',   // Menu slug
        'custom_menu_page',   // Callback function for page content
        'dashicons-admin-generic', // Icon (Dashicons class or URL)
        90                    // Position in the menu
    );
}

function custom_menu_page() {
    echo '<h1>Welcome to the Custom Menu Page</h1>';
    echo '<p>This is where you can manage your custom settings.</p>';
}
```

---

## Search: `wordpress plugin dir path`

## `plugin_dir_path()` Function

The `plugin_dir_path()` function in WordPress returns the absolute file system path of a plugin's directory. This is commonly used to include or require files within the plugin.

### Syntax

```php
plugin_dir_path( string $file ): string
```

## `WP_Query` and `get_posts()` in WordPress

WordPress provides two primary ways to retrieve posts from the database: `WP_Query` and `get_posts()`. Both are used to fetch posts based on specific criteria, but they have some differences in how they're used.

### `WP_Query`

`WP_Query` is a powerful class that allows you to query posts in a very flexible way. It provides more control over how the query is executed, and it's typically used when you need advanced query parameters.

#### Example Usage:

```php
$args = array(
    'post_type' => 'post',       // Post type
    'posts_per_page' => 5,       // Number of posts to retrieve
    'orderby' => 'date',         // Order by date
    'order' => 'DESC',           // Sort order (DESC or ASC)
);

$query = new WP_Query( $args );

// Check if there are posts
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        // Output post content
        the_title('<h2>', '</h2>');
        the_excerpt();
    }
} else {
    echo 'No posts found';
}

// Reset post data after custom query
wp_reset_postdata();
```

### `wp_date( string $format, int $timestamp = null, DateTimeZone $timezone = null ): string|false`
