<?php
// Class for Type of Data send and receive from database.
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','body','author_id'];
}
