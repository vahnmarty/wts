<?php

if (! function_exists('format_money')) {
    function format_money($amount, $decimal = 2)
    {
        return '₱ '.number_format($amount, $decimal);
    }
}
