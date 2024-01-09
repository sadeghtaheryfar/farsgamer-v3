<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;

class Role extends \Spatie\Permission\Models\Role
{
    use LogsActivity;

    protected static $logAttributes = ['*'];
    protected static $dontLogIfAttributesChangedOnly = ['updated_at'];
    protected static $logOnlyDirty = true;
}