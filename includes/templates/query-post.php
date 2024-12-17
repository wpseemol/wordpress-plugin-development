<div class="wrap">
    <h1>
        Query Posts
    </h1>

    <div class="tablenav top">
        <div class="alignleft actions">
            <form action="" method="GET">


                <select name="cat" id="cat" class="postform">
                    <option value="0">All category</option>
                    <?php foreach ($terms as $term): ?>

                        <option value="<?php echo $term->term_id; ?>"><?php echo $term->name ?></option>
                    <?php endforeach; ?>
                </select>

                <input type="submit" class="button" value="Filter" name="filter_action">
            </form>
        </div>

    </div>

    <table class="wp-list-table widefat fixed striped table-view-list posts">
        <caption class="screen-reader-text">Table ordered by Date. Descending.</caption>
        <thead>
            <tr>
                <th>
                    Title
                </th>
                <th>
                    Author
                </th>
                <th>
                    Categories
                </th>
                <th>
                    Date
                </th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($posts as $post): ?>
                <tr>

                    <td>
                        <strong>
                            <?php echo $post->post_title; ?>
                        </strong>
                    </td>
                    <td>
                        <?php


                        $user = get_user_by("id", $post->post_author);

                        echo $user->display_name;



                        ?>
                    </td>
                    <td>

                        <?php

                        $category_array = wp_get_post_terms($post->ID, "category");

                        $category_names = array_map(function ($element) {
                            return $element->name;
                        }, $category_array);


                        echo implode(",", $category_names);

                        ?>
                        </pre>

                    <td>
                        <?php echo wp_date("d F, Y", strtotime($post->post_date));
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>





    </table>
</div>