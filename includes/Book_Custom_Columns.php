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

        add_action("manage_book_posts_custom_column", array($this, "manage_book_posts_custom_column_callback"), 10, 2);

        add_filter("manage_edit-book_sortable_columns", array($this, "manage_book_sortable_columns_callback"));
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

                $new_columns["categories"] = "Categories";
                $new_columns["images"] = "Images";
            }

        }
        return $new_columns;
    }



    // custom column value add
    public function manage_book_posts_custom_column_callback($column_name, $post_id)
    {

        if ("id" === $column_name) {
            echo $post_id;
            return;
        }

        // categories filed value set
        if ("categories" === $column_name) {

            $categories = get_the_terms($post_id, "book_category");

            if (!empty($categories) && !is_wp_error($categories)) {
                $category_names = array_map(function ($cat) {
                    return $cat->name;
                }, $categories);

                echo implode(",", $category_names);
            } else {
                echo "No Categories";
            }


            return;
        }

        if ("images" === $column_name) {
            $url = get_the_post_thumbnail_url($post_id, "thumbnail");

            $title = get_the_title($post_id);
            if ($url) {
                echo "<img src='$url' alt='$title' style='width:50px; height:50px; border-radius: 100%; '   />";
            }
            echo "<p>$title</p>";
            return;
        }
    }


    public function manage_book_sortable_columns_callback($columns)
    {
        $columns["id"] = "id";
        return $columns;
    }




}



