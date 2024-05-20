<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
class TransmittalofAppointee extends Model
{
    use HasFactory;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id','notes'
    ];
    protected $dates = ['deleted_at'];

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }
}