<?php

namespace App\Models\Chat;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body'
    ];

    protected $appends = [
        'selfOwned'
    ];

    public function getSelfOwnedAttribute()
    {
        return $this->user_id === auth()->id() ? true : false;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
