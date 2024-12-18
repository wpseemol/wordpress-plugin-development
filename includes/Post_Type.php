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
            "hierarchical" => true
        );

        register_post_type("book", $args);
    }
}
