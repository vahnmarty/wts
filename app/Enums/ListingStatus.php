<?php

namespace App\Enums;

enum ListingStatus : string
{
    case OPEN = 'open';
    case PENDING = 'pending';
    case PROCESSING = 'processing';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';
    case REFUNDED = 'refunded';
}
