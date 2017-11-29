<?php
$g_debug_mode = false;

/**
 * @param $i_value
 * @param null $i_name
 */
function logit($i_value, $i_name = null) {
    global $g_debug_mode;
    if ($g_debug_mode) {
        $l_string = serialize($i_value);
        if (is_null($i_name)) {
            echo '<span style="color: blue">' . $l_string . '</span><br>';
        } else {
            echo '<span style="color: blue"><b>' . $i_name . ' = </b>' . $l_string . '</span><br>';
        }
    }
}

?>