<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','content','category_id','user_id','tags'];


/*************  ✨ Codeium Command ⭐  *************/
    /**
     * The category that this post belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
/******  3822c065-ebad-4a86-beaa-a2903f147846  *******/
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
