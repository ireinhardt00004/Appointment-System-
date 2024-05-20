<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
class No33BAFA extends Model
{
    use HasFactory;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'transaction_number','user_id', 'fullname','position_title','salary_grade','status','office_unit_dept',
        'compensation_rate_words','compensation_rate_num','appointment_nature','vice','plantilla_page_number','plantilla_item_number', 'selection'
    ];
    protected $dates = ['deleted_at'];

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }
}