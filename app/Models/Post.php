<?php

namespace App\Models;

use App\Events\PostUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\PostCreated;
use App\Events\PostDeleted;

class Post extends Model
{
    use HasFactory;

           /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'thumbnail_image',
        'publication_status',
        
    ];

    protected $dispatchesEvents=[
        'created' => PostCreated::class,
        'updated' => PostUpdated::class,
        'deleted' => PostDeleted::class
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
