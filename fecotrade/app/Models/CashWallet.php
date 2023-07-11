<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Models\AdminWallet;
class CashWallet extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'cash_wallets';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'pending'  => 'pending',
        'approved' => 'approved',
        'rejected' => 'rejected',
    ];

    protected $fillable = [
        'user',
        'amount',
        'type',
        'method',
        'description',
        'receiver',
        'received_from',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }
      public function user()
    {

         return $this->belongsTo(User::class, 'user_id');

    }
    public function receiver()
    {
        return $this->belongsTo(User::class,'receiver_id');
    }
    public function sender()
    {
        return $this->belongsTo(User::class,'received_from');
    }
    public function merchant()
    {
        return $this->belongsTo(AdminWallet::class,'wallet_id');
    }
}
