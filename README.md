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
