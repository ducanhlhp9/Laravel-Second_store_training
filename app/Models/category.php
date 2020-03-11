<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table    =   'category';
    protected $guarded  =   [''];

    const STATUS_PUBLIC     =   1;
    const STATUS_PRIVATE    =   0;

    protected $status =[
        1   =>  [
            'name'  =>  'public',
            'class' =>  'btn-info'
        ],
        0   =>  [
            'name'  =>  'private',
            'class' =>  'btn-danger'
        ]
    ];
    public function getStatus()
    {
        return array_get($this->status,$this->c_active,'[N\A]');
    }
}
