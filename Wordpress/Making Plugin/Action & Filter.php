<?php
//http://codex.wordpress.org/Function_Reference/add_action 
//add_action($tag, $function_to_add, $priority, $accepted_args);
add_action('hookname','hello_world', 10, 1);
function function_name()
{
echo "Hello World";
}

//add_filter( $tag, $function_to_add, $priority, $accepted_args );
add_filter('filtername','hello_world');
function function_name()
{
echo "Hello World";
}

?>