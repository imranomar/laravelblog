<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $photo_path = '/images/';

    protected $fillable = [
        'file'
    ];

    public function getFileAttribute($value)
    {
        return $this->photo_path . $value;
    }

    public function deletePhoto()
    {
        unlink(public_path().$this->file);
    }

}
