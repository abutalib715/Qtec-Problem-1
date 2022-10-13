<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    use HasFactory;

    protected $appends = ['entry_time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getEntryTimeAttribute()
    {
        return date('d-m-Y h:i:s A',strtotime($this->created_at));
    }
}
