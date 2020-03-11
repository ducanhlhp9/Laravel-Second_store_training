<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table    =   'articles';
    protected $guarded  =   [''];

    const STATUS_PUBLIC     =   1;
    const STATUS_PRIVATE    =   0;
    protected $status =[
        1   =>  [
            'a_name'  =>  'public',
            'class' =>  'btn-info'
        ],
        0   =>  [
            'a_name'  =>  'private',
            'class' =>  'btn-danger'
        ]
    ];
    public function getStatus()
    {
        return array_get($this->status,$this->a_active,'[N\A]');
    }
}
