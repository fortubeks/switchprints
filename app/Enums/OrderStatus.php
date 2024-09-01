<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDING  = 'Pending';
    case IN_PROGRESS = 'In Progress';
    case COMPLETE = 'Complete';
}
