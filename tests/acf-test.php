<?php
/**
 * Start with WP-CLI: wp eval-file acf-test.php
 */


// EDIT here
$post_id = 1;


$fields = get_fields($post_id);
//var_dump($fields);

foreach ($fields as $key => $_) {
    echo $key, ':', "\n";
    // raw value
    echo '  '; var_dump(get_field($key, $post_id, false));
    // formatting applied
    echo '  '; var_dump(get_field($key, $post_id, true));
}
