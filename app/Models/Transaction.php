<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;

class Transaction extends \Bavix\Wallet\Models\Transaction
{
    use LogsActivity;

    protected static $logAttributes = ['*'];
    protected static $dontLogIfAttributesChangedOnly = ['updated_at'];
    protected static $logOnlyDirty = true;
}