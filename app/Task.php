<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Task extends Model
{
    // enable all to be fillable for the test
    protected $guarded= [
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
