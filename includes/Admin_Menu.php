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
            "Query Post",
            "Query Post",
            "administrator",
            "wpseemol_query_post",
            array($this, "query_post_callback")
        );
    }

    public function query_post_callback()
    {
        ?>
        <div class="wrap">

            <h1>hello world</h1>
        </div>

        <?php
    }


}