# Custom Post Type Initialization

This guide demonstrates how to register a custom post type in WordPress using the `init` hook.

## Usage

Add the following code to your theme's `functions.php` file or in a custom plugin:

```php
function register_custom_post_type() {
    $args = [
        'label'               => 'Custom Post',
        'public'              => true,
        'show_in_rest'        => true,
        'supports'            => ['title', 'editor', 'thumbnail'],
        'has_archive'         => true,
        'rewrite'             => ['slug' => 'custom-posts'],
    ];

    // more data arg
    $args = array(
            "public" => true,
            "labels" => array(
                "name" => "Books",
                "singular_name" => "Book",
                "add_new_item" => "Add New Book",
                "search_items" => "Search Book",
                "view_item" => "View Book",
                "not_found" => "No Books found"
            ),
            "show_in_rest" => true
        );

    register_post_type('custom_post', $args);
}
add_action('init', 'register_custom_post_type');
```

## Explanation

-   **`label`**: Name displayed in the WordPress admin.
-   **`public`**: Determines whether the post type is accessible to the public.
-   **`show_in_rest`**: Enables Gutenberg editor and REST API support.
-   **`supports`**: Features supported by the custom post type (e.g., title, editor, thumbnail).
-   **`has_archive`**: Enables archive pages for the post type.
-   **`rewrite`**: Sets a custom URL slug.

## Installation

1. Copy the code to your theme or plugin.
2. Save the changes.
3. Visit the WordPress admin panel to verify the custom post type appears in the menu.

## License

This code is provided under the [MIT License](LICENSE).
