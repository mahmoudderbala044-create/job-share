<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


#[Fillable(['file_name', 'file_url', 'contact_detail','summary','skills','educations','experiences','user_id'])]
class Resume extends Model
{
    use HasFactory,HasUuids,SoftDeletes;

    protected $table = 'resumes';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $dates = ['deleted_at'];
    protected function casts(): array
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function job_applications()
    {
        return $this->hasMany(Job_Application::class,'resume_id','id');
    }
    
}
