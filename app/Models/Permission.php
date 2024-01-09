<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;

class Permission extends \Spatie\Permission\Models\Permission
{
    use LogsActivity;

    protected static $logAttributes = ['*'];
    protected static $dontLogIfAttributesChangedOnly = ['updated_at'];
    protected static $logOnlyDirty = true;
}