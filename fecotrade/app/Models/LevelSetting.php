<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelSetting extends Model
{
    use HasFactory;

    public $table = 'level_settings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        '0' => 'inactive',
        '1' => 'active',
    ];

    protected $fillable = [
        'level_1',
        'level_2',
        'level_3',
        'level_4',
        'level_5',
        'level_6',
        'level_7',
        'level_8',
        'level_9',
        'level_10',
        'level_11',
        'level_12',
        'level_13',
        'level_14',
        'level_15',
        'level_16',
        'level_17',
        'level_18',
        'level_19',
        'level_20',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
