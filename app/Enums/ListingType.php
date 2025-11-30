<?php

namespace App\Enums;

enum ListingType: string
{
    case SELL = 'sell';
    case BUY = 'buy';
    case SWAP = 'swap';
}
