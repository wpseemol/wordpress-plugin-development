<?php

namespace WP_seemol\includes;


if (!defined("ABSPATH")) {
    return;
}

class Custom_Column
{

    public function __construct()
    {
        add_filter("manage_page_posts_columns", array($this, "manage_page_post_columns_callback"));

        add_action("manage_page_posts_custom_column", array($this, "manage_page_posts_custom_column_callback"), 10, 2);

        add_filter("manage_edit-page_sortable_columns", array($this, "manage_page_sortable_columns_callback"));
    }



    public function manage_page_post_columns_callback($columns)
    {
        $columns["id"] = "ID";

        return $columns;
    }


    public function manage_page_posts_custom_column_callback($column_name, $post_id)
    {
        echo $post_id;
    }

    public function manage_page_sortable_columns_callback($columns)
    {

        $columns["id"] = "id";

        return $columns;
    }

}
;


