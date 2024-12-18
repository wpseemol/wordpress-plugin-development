<?php


namespace WP_seemol\includes;

if (!defined(ABSPATH)) {
    return;
}


class Post_Type
{
    public function __construct()
    {
        add_action("init", array($this, "init_callback"));


        add_filter("the_content", array($this, "the_content_callback"));
    }


    public function init_callback()
    {

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
            "show_in_rest" => true,
            "supports" => array(
                "title",
                "editor",
                "page-attributes",
                "thumbnail"
            ),
            "hierarchical" => true,
            "menu_position" => 3,
            "has_archive" => true,
            "menu_icon" => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="#fff"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M96 0C43 0 0 43 0 96L0 416c0 53 43 96 96 96l288 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64c17.7 0 32-14.3 32-32l0-320c0-17.7-14.3-32-32-32L384 0 96 0zm0 384l256 0 0 64L96 448c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16zm16 48l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>'),

        );

        register_post_type("book", $args);


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

    }


    public function the_content_callback($content)
    {

        if (!is_singular("book")) {
            return $content;
        }

        $terms = wp_get_post_terms(get_the_ID(), "book_category");



        ob_start()
            ?>


        <ul>
            <?php foreach ($terms as $term): ?>
                <li>
                    <a href="<?php echo get_term_link($term, "book_category"); ?>">
                        <?php echo $term->name; ?>
                    </a>

                </li>
            <?php endforeach; ?>
        </ul>


        <?php
        $html = ob_get_clean();


        return $content . $html;
    }
}
