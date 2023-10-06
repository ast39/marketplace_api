<?php

namespace App\Enums;

/**
 * Basic statuses
 */
enum BasicStatusEnum: int {

    # Off
    case Hidden = 0;

    # On
    case Visible = 1;

}
