<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apply;

class Pdf extends Model
{
    use HasFactory;
    protected $table = 'pdf';
	protected $primaryKey = 'id';
    protected $fillable =[
        'user_id','pdf'
    ];
    public function apply(){
        return $this->belongsTo(Apply::class, 'user_id','id');
    }
}
