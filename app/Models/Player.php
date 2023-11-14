<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $appends = ['date'];
    protected $guarded = ['id'];

    public function getDateAttribute(){
        return $this->created_at->diffForHumans();
    }


}
