<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table ="transactions";
    protected $guarded=['*'];
    const STATUS_DONE       =   1;
    const STATUS_DEFAULT       =   0;

    public function user(){
        return $this->belongsTo(user::class,'tr_user_id');
    }
//    protected $status =[
//        1   =>  [
//            'name'  =>  'Đã Xử Lý',
//            'class' =>  'btn-info'
//        ],
//        0   =>  [
//            'name'  =>  'Chờ Xử Lý',
//            'class' =>  'btn-danger'
//        ]
//    ];
    public function getStatus()
    {
        return array_get($this->status,$this->tr_status,'[N\A]');
    }
}
