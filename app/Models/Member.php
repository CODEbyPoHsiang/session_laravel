<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'member'; //自訂義要存取資料庫的資料表名稱

    public $fillable = ['name','ename','phone','email','sex','city','township','postcode','address','notes'];//
}
