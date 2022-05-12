<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pdf;

class Apply extends Model
{
    use HasFactory;
    protected $table = 'apply';
	protected $primaryKey = 'id';
    protected $fillable =[
        'jabatan','email','telp','lahir',
    ];
    public function berkas(){
        return $this->hasMany(Pdf::class,'user_id','id');
    }
}

