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

        $posts = get_posts(array(
            "post_type" => "post",
            "post_per_page" => 5,

        ));


        include WPSEEMOL_PLUGIN_PATH . "includes/templates/query-post.php";
    }


}