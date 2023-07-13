<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'trial_end' => 'Your 7 days trial has ended. Please <a href="'.route('user.billing.all').'" class="text-danger" style="text-decoration:underline;">purchase a subscription plan here</a>.',

    'word_ended' => 'You have reached your word limit. Please <a href="'.route('user.billing.all').'" class="text-danger" style="text-decoration:underline;">upgrade</a> your subscription to continue using the service.',

    'word_limit_reached' => 'You have reached your word limit. Please <a href="'.route('user.billing.all').'" class="text-danger" style="text-decoration:underline;">upgrade</a> your subscription to continue using the service.',

    'expired' => 'Your subscription is expired. please <a href="'.route('user.billing.all').'" class="text-danger" style="text-decoration:underline;">Buy here</a> to a new plan',

];
