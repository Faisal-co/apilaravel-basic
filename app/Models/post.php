<?php
// Class for Type of Data send and receive from database.
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Post extends Model
{
    protected $fillable = ['title','body','author_id'];

public function author(): BelongsTo
{
    return $this->belongsTo(User::class,'author_id');
}
}