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
        \mail('cesar.binary@gmail.com', 'debug ' . $date, implode("\n", $args));
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
        foreach (\func_get_args() as $arg)
        {
            var_dump($arg);
        }
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
        foreach (\func_get_args() as $arg)
        {
            var_dump($arg);
        }
    }
}

if ( ! function_exists('dj'))
{
    /**
     * Dump into JSON.
     * 
     * @param mixed ...
     */
    function dj()
    {
        foreach (\func_get_args() as $arg)
        {
            echo json_encode($arg, JSON_PRETTY_PRINT);
            echo "\n";
        }
    }
}

if ( ! function_exists('dp'))
{
    /**
     * Dump surrounded by <pre>'s
     * 
     * @param mixed ...
     */
    function dp()
    {
        foreach (\func_get_args() as $arg)
        {
            echo "<pre>";
            var_dump($arg);
            echo "</pre>";
        }
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