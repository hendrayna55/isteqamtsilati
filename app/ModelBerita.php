<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelBerita extends Model
{
    protected $table = 'berita';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(ModelBeritaKategori::class, 'kategori_id', 'id');
    }
}
