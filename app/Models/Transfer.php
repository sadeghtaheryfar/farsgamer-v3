<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;

class Transfer extends \Bavix\Wallet\Models\Transfer
{
    use LogsActivity;

    protected static $logAttributes = ['*'];
    protected static $dontLogIfAttributesChangedOnly = ['updated_at'];
    protected static $logOnlyDirty = true;
}