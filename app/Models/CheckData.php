<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckData extends Model
{
    use HasFactory;

    protected $fillable = ['appointment_id', 'user_id'];
    protected $table = 'check_datas';


   // protected $dates = ['deleted_at'];

   public function appointment() {
    return $this->belongsTo(Appointment::class, 'appointment_id');
}

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
