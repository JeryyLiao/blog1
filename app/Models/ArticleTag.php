<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ArticleTag extends Pivot
{
    use HasFactory;
    protected $fillable = ['article_id' , 'tag_id'];
}