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

        $new_columns = array();


        foreach ($columns as $key => $column) {


            if ("title" === $key) {
                $new_columns["id"] = "ID";
                $new_columns["images"] = "Images";
            }

            $new_columns[$key] = $column;
        }




        return $new_columns;
    }


    public function manage_page_posts_custom_column_callback($column_name, $post_id)
    {

        if ("images" === $column_name) {

            $url = get_the_post_thumbnail_url($post_id, "thumbnail");

            $title = get_the_title($post_id);

            if ($url) {
                echo "<img src='$url' alt='$title' />";
            }

            echo "<p>$title</p>";



            return;
        }


        if ("id" === $column_name) {
            echo $post_id;
            return;
        }


    }

    public function manage_page_sortable_columns_callback($columns)
    {

        $columns["id"] = "id";



        return $columns;
    }

}
;


