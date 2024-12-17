# Custom Columns

# `manage_{$post->post_type}_posts_custom_column`

## Description

This dynamic action hook is used to render custom content in custom columns for the WordPress admin list table of specific post types.

## Usage

1. **Define Custom Columns**: Use the `manage_{$post_type}_posts_columns` filter to add new columns.
2. **Add Custom Content**: Use the `manage_{$post_type}_posts_custom_column` action to render content for the custom column.

## Example

```php
// Add a custom column for 'product' post type
add_filter( 'manage_product_posts_columns', function ( $columns ) {
    $columns['custom_column'] = 'Custom Column';
    return $columns;
} );

// Render content for the custom column
add_action( 'manage_product_posts_custom_column', function ( $column_name, $post_id ) {
    if ( 'custom_column' === $column_name ) {
        echo esc_html( get_post_meta( $post_id, '_custom_meta_key', true ) );
    }
}, 10, 2 );
```

# `manage_posts_columns`

## Description

The `manage_posts_columns` filter allows you to modify the columns displayed in the WordPress admin list table for posts of a specific post type.

## Usage

Use this filter to add, remove, or modify the columns in the admin list table. It provides access to the default columns and the post type being displayed.

## Parameters

-   **`$posts_columns`** (`array`): The current array of column headers. Keys are column IDs, and values are column titles.
-   **`$post_type`** (`string`): The post type of the posts being listed.

## Example

### Add a Custom Column

```php
// Add a custom column for 'product' post type
add_filter( 'manage_posts_columns', function ( $columns, $post_type ) {
    if ( 'product' === $post_type ) {
        $columns['custom_column'] = 'Custom Column';
    }
    return $columns;
}, 10, 2 );
```
