<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = ['_token'];

    public function manager()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function isModerate()
    {
        return $this->is_moderate === 1;
    }
}
