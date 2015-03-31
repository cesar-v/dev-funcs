Development Functions
=====================

Quick development shortcuts and functions.

Examples
--------

var_dump($vars) is too long:

    d($vars);

var_dump($vars); exit(); is too long:

    dd($vars);

Benchmark snippet of code:

    speed($callback, $iterations = 25, $displayResults = false);

When screen output has been muddled up:

    de($vars);

^^ Will dump $vars to... my email :).  (Would a way to not hard code my own email into it)