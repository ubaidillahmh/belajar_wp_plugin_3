<?php

    add_action( 'admin_menu', 'testimoni_menu' );

    function testimoni_menu() {
        add_menu_page( 'Testimonial', 'Testimonial', 'manage_options', 'plugins/wt1/list.php', 'testimoni_list', 'dashicons-tickets', 6  );
    }

    function testimoni_list(){
        ?>
        <div class="wrap">
            <h2>Testimoni List</h2>
        </div>

        <?php
        global $blog_id;
    
        global $wpdb;
        if(isset( $_GET['id'] ))
        {
            $check = $wpdb->get_row("SELECT * FROM testimonial WHERE blog_id=$blog_id");
            // var_dump($check);die;
            if($blog_id == $check->blog_id)
            {
                $del = $wpdb->delete('testimonial', array('id' => $_GET['id']));
            }
        }
        $result = $wpdb->get_results("SELECT * FROM testimonial WHERE blog_id=$blog_id");
        
        ?>

        <table border="1px">
            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>testimonial</td>
                <td>action</td>
            </tr>
            <?php
            foreach ($result as $item) {
                echo '<tr><td>'.$item->name.'</td>';
                echo '<td>'.$item->email.'</td>';
                echo '<td>'.$item->phone_number.'</td>';
                echo '<td>'.$item->testimonial.'</td>';
                echo '<td><a href="admin.php?page=plugins/wt1/list.php&id='.$item->id.'">delete</a><td></tr>';
            }
            ?>
        </table>
        <?php
    }

?>