<?php

return [

    'seat-notification' => [
        'seatgroup_sync'  => Herpaderpaldent\Seat\SeatGroups\Http\Controllers\Notifications\SeatGroupSyncController::class,
        'seatgroup_error' => Herpaderpaldent\Seat\SeatGroups\Http\Controllers\Notifications\SeatGroupErrorController::class,
    ],

];
