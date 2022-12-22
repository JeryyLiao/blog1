<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cgy extends Model
{

    use HasFactory;

    // public function articles()
    // {
    //     return $this->hasMany(Article::class);
    // }
    // public function items()
    // {
    //     return $this->hasMany(Item::class);
    // }

    //protected $dates = ['enabled_at'];
    //新增白名單的欄位(['欄位名稱','欄位名稱','欄位名稱'])
    // protected $fillable = ['title', 'desc', 'enabled', 'subjec', 'enabled_at'];
    // protected $fillable = ['title', 'pic', 'sort', 'cgy_id'];
    // protected $guarded = ['*']; //所有欄位均為黑名單(預設為全部黑名單)

    protected $fillable = ['title', 'pic', 'sort'];
    public function items()
    {
        return $this->hasMany(Item::class);

    }

}