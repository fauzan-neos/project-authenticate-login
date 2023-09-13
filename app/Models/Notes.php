<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notes extends Model
{
    protected $guarded = [
        'id'
    ];
    
    protected $with = [
        'author'
    ];

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                $query->where('author', 'like', '%' . $search . '%');
            });
        });
         
        $query->when($filters['author'] ?? false, function($query, $author) {
            return $query->whereHas('author', function($query) use ($author) {
                $query->where('author', $author);
            });
        });
    }

    public function author() {
        return $this->hasOne(User::class, 'id', 'author_id')->select('*');
    }
    public function user() {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
