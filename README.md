# Register Taxonomy in WordPress

The `register_taxonomy` function is used to create custom taxonomies in WordPress. This allows you to organize and group your custom post types or default post types like posts and pages.

## Basic Syntax

```php
register_taxonomy(
    string $taxonomy,
    array|string $object_type,
    array|string $args = array()
);
```

### Parameters

-   `$taxonomy` _(string, required)_: The unique identifier for your taxonomy (e.g., `genre`).
-   `$object_type` _(array|string, required)_: The post types to which this taxonomy will apply (e.g., `post`, `page`, or custom post types).
-   `$args` _(array|string, optional)_: An array of arguments to customize the taxonomy's behavior.

### Example

Here is an example of how to register a custom taxonomy named `Genre` for a custom post type `book`:

```php
function create_genre_taxonomy() {
    $labels = array(
        'name'              => _x( 'Genres', 'taxonomy general name' ),
        'singular_name'     => _x( 'Genre', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Genres' ),
        'all_items'         => __( 'All Genres' ),
        'parent_item'       => __( 'Parent Genre' ),
        'parent_item_colon' => __( 'Parent Genre:' ),
        'edit_item'         => __( 'Edit Genre' ),
        'update_item'       => __( 'Update Genre' ),
        'add_new_item'      => __( 'Add New Genre' ),
        'new_item_name'     => __( 'New Genre Name' ),
        'menu_name'         => __( 'Genre' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'genre' ),
    );


    // more taxonomy
    // --------------------------

    $args_taxonomy = array(
            "labels" => array(
                "name" => "Categories",
                "singular_name" => "Category",
                "add_new_item" => "Add New Category"

            ),
            "show_in_rest" => true,
            "hierarchical" => true,
            "rewrite" => array("slug" => "book-category")
        );

        register_taxonomy("book_category", "book", $args_taxonomy);


        $args_tags = array(
            "labels" => array(
                "name" => "Tags",
                "singular_name" => "Tag",
                "add_new_item" => "Add New Tag"

            ),
            "show_in_rest" => true,
            "hierarchical" => false,
        );


        register_taxonomy("book_tags", "book", $args_tags);

        //--------------------------------------



    register_taxonomy( 'genre', array( 'book' ), $args );
}
add_action( 'init', 'create_genre_taxonomy' );
```

### Explanation of `$args`

-   `hierarchical` _(boolean)_: Whether the taxonomy behaves like categories (true) or tags (false). Default is false.
-   `labels` _(array)_: An array of strings used to build the taxonomy's labels.
-   `show_ui` _(boolean)_: Whether to generate a user interface in the WordPress admin. Default is false.
-   `show_admin_column` _(boolean)_: Whether to display the taxonomy in the admin post list. Default is false.
-   `query_var` _(boolean|string)_: Whether to enable the taxonomy in query strings. Default is true.
-   `rewrite` _(array|boolean)_: Customize the URL rewriting rules for the taxonomy.

### Notes

1. Always hook into the `init` action to register taxonomies.
2. Use unique slugs for your taxonomy to avoid conflicts.
3. Test your taxonomy thoroughly in the WordPress admin to ensure it works as expected.

For more details, visit the [WordPress Codex](https://developer.wordpress.org/reference/functions/register_taxonomy/).

---

## Useful Functions for Working with Taxonomies

### `get_term_link()`

The `get_term_link()` function retrieves the URL for a given term in a specific taxonomy.

#### Syntax

```php
get_term_link( int|WP_Term|string $term, string $taxonomy )
```

#### Parameters

-   `$term` _(int|WP_Term|string, required)_: Term ID, WP_Term object, or term slug.
-   `$taxonomy` _(string, required)_: The taxonomy for the term.

#### Example

```php
$term = get_term_by( 'slug', 'fiction', 'book_category' );
if ( $term && ! is_wp_error( $term ) ) {
    $term_link = get_term_link( $term, 'book_category' );
    echo '<a href="' . esc_url( $term_link ) . '">' . esc_html( $term->name ) . '</a>';
}
```

### `wp_get_post_terms()`

The `wp_get_post_terms()` function retrieves the terms assigned to a post for a specific taxonomy.

#### Syntax

```php
wp_get_post_terms( int $post_id, string $taxonomy, array $args = array() )
```

#### Parameters

-   `$post_id` _(int, required)_: The ID of the post.
-   `$taxonomy` _(string, required)_: The taxonomy for which terms are required.
-   `$args` _(array, optional)_: Arguments to modify the query.

#### Example

```php
$post_id = get_the_ID();
$terms = wp_get_post_terms( $post_id, 'book_category' );
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    foreach ( $terms as $term ) {
        echo '<span>' . esc_html( $term->name ) . '</span>';
    }
}
```
