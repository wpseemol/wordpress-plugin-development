<?php

namespace Wpseemol\plugin;

class Admin_Menu
{


    public function __construct()
    {
        add_action("admin_menu", array($this, "admin_menu_callback"));
    }


    public function admin_menu_callback()
    {
        add_menu_page(
            "Query Posts",
            "Query Posts",
            "administrator",
            "wpseemol_query_post",
            array($this, "query_post_callback")
        );
    }

    public function query_post_callback()
    {

        $filter_cat = 0;

        if (isset($_GET["filter_cat"])) {
            $filter_cat = $_GET["filter_cat"];
        }

        $args = array(
            "post_type" => "post",
            "post_per_page" => 5,


        );

        if (!empty($filter_cat)) {
            $args['cat'] = $filter_cat;
        }

        $posts = get_posts($args);

        $terms = get_terms(array(
            "taxonomy" => "category"
        ));


        include WPSEEMOL_PLUGIN_PATH . "includes/templates/query-post.php";
    }


}