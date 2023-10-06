<?php

namespace App\Enums;

/**
 * Order statuses
 */
enum OrderTypeEnum: int {

    # Cancelled
    case Canceled = -1;

    # New order (created)
    case Created = 0;

    # Order in processing
    case InProcessing = 1;

    # Order processed (waiting payment)
    case Processed = 2;

    # Order was paid
    case Paid = 3;

    # Order was sent
    case Sent = 4;

    # Order was delivered (waiting in pick-up point)
    case Awaiting = 5;

    # Completed
    case Completed = 9;

}
