<?php

namespace App\Http\Controllers\Admin;

class ArtisanCommand
{
    public function storageLink()
    {
        dd(\Artisan::call('storage:link'));
    }
}