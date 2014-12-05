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

if ( ! function_exists('d'))
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

if ( ! function_exists('speed'))
{
    /**
     * Check speed of given call back.
     * 
     * @param closure $callback
     * @param int $iterations
     * @param boolean $displayDetails
     * @return int
     */
    function speed($callback, $iterations = 25, $displayDetails = false)
    {
        $times = array();

        for($i = 0; $i < $iterations; $i++) {

            $start = microtime(true);
            call_user_func($callback);
            $elapsedTime = microtime(true) - $start;

            $times[] = $elapsedTime;

            if ($displayDetails) {
                echo 'Iteration ' . $i . ': ' . $elapsedTime . '<hr/>';
            }
        }

        $average = array_sum($times) / $iterations;

        if ($displayDetails) {
            echo 'Average: ' . $average;
        } 

        return $average;
    }
}