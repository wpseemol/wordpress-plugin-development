# Custom Columns

# `manage_{$post_type}_posts_columns`

## Description

The `manage_{$post_type}_posts_columns` filter allows you to customize the columns displayed in the WordPress admin list table for a specific post type.

## Usage

Use this filter to add, modify, or remove columns for a specific post type in the admin area.

## Dynamic Hook Name

Replace `{$post_type}` with the specific post type slug to target. For example:

-   `manage_post_posts_columns` for the default "Posts" post type.
-   `manage_page_posts_columns` for the "Pages" post type.
-   `manage_product_posts_columns` for a custom post type called "Product."

## Parameters

-   **`$columns`** (`array`): The array of columns. Keys are column IDs, and values are column titles.

## Example

### Add a Custom Column

```php
// Add a custom column for 'product' post type
add_filter( 'manage_product_posts_columns', function ( $columns ) {
    $columns['custom_column'] = 'Custom Column';
    return $columns;
} );


// Rename the 'title' column for the 'post' post type
add_filter( 'manage_post_posts_columns', function ( $columns ) {
    if ( isset( $columns['title'] ) ) {
        $columns['title'] = 'Custom Title';
    }
    return $columns;
} );


// Remove the 'date' column for the 'page' post type
add_filter( 'manage_page_posts_columns', function ( $columns ) {
    unset( $columns['date'] );
    return $columns;
} );


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

# `manage_{$post->post_type}_posts_custom_column`

## Description

The `manage_page_posts_custom_column` action allows you to output custom content for custom columns in the WordPress admin list table for the "Pages" post type.

## Parameters

-   **`$column_name`** (`string`): The name of the custom column being rendered.
-   **`$post_id`** (`int`): The ID of the current page being processed.

## Usage

Use this hook to display custom values in custom columns for the "Pages" post type.

## Example

```php
// Add custom content to a custom column for "Pages"
add_action( 'manage_page_posts_custom_column', function ( $column_name, $post_id ) {
    if ( 'custom_column' === $column_name ) {
        // Fetch and display custom meta value
        echo esc_html( get_post_meta( $post_id, '_custom_meta_key', true ) );
    }
}, 10, 2 );
```

# `manage_{$this->screen->id}_sortable_columns`

## Description

The `manage_{$this->screen->id}_sortable_columns` filter allows you to define which columns in the WordPress admin list table are sortable for a specific screen.

## Dynamic Hook Name

Replace `{$this->screen->id}` with the screen ID. For example:

-   `manage_edit-post_sortable_columns` for the "Posts" list table.
-   `manage_edit-page_sortable_columns` for the "Pages" list table.

## Parameters

-   **`$sortable_columns`** (`array`): An associative array where the key is the column ID and the value is the meta key or query variable used for sorting.

## Usage

### Example: Add a Custom Sortable Column

```php
add_filter( 'manage_edit-post_sortable_columns', function ( $sortable_columns ) {
    $sortable_columns['custom_column'] = 'custom_meta_key';
    return $sortable_columns;
} );
```
