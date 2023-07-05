
<?php 
/**
 * Custom Bootstrap Nav Walker
 */
class Fastbreak_Wrap extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth=0)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<button class=\"navbar-toggle tag\">|||</button>
        <ul class=\"sub-menu\">\n";
    }
    function end_lvl(&$output, $depth)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
} 

