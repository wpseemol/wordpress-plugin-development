<?php

namespace WP_seemol\includes;


if (!defined("ABSPATH")) {
    return;
}

class BooK_Custom_Column
{

    public function __construct()
    {
        add_filter("manage_book_posts_columns", array($this, "manage_book_post_columns_callback"));

        // add_action("manage_page_posts_custom_column", array($this, "manage_page_posts_custom_column_callback"), 10, 2);

        // add_filter("manage_edit-page_sortable_columns", array($this, "manage_page_sortable_columns_callback"));
    }


    public function manage_book_post_columns_callback($columns)
    {
        $new_columns = array();

        foreach ($columns as $key => $column) {
            if ("title" === $key) {
                $new_columns["id"] = "ID";

            }
            $new_columns[$key] = $column;
            if ("title" === $key) {
                $new_columns["images"] = "Images";
            }

        }




        return $new_columns;
    }




}
;


