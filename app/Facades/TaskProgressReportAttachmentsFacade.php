<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class TaskProgressReportAttachmentsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "task-progress-report-attachments";
    }
}