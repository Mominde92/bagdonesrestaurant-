<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'message',
        'module',
        'action',
    ];
    public static function saveLog($message, $module = 'database', $action = 'create')
    {
        return Log::create(['message' => json_encode($message), 'module' => $module, 'action' => $action]);
    }
}
