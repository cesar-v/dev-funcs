<?php

if ( ! function_exists('de'))
{
    /**
     * Dumps vars to Cesar's email.
     * 
     * @param mixed ...
     */
    function de()
    {
        $args = array();
        foreach (\func_get_args() as $arg)
        {
            $args[] = \var_export($arg, true);
        }
        
        $date = date('M d, Y H:i:s:u', microtime(true));
        \mail('cesar.vega@wnc.edu', 'debug ' . $date, implode("\n", $args));
    }
}

if ( ! function_exists('dd'))
{
    /**
     * Short cut to var_dump; exit;
     * 
     * @param mixed ...
     */
    function dd()
    {
        var_dump(\func_get_args());
        exit;
    }
}

if ( ! function_exist('d'))
{
    /**
     * Short cut to var_dump();
     * 
     * @param mixed ...
     */
    function d()
    {
        var_dump(\func_get_args());
    }
}