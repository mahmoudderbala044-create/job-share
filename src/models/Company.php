<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


#[Fillable(['name', 'address', 'industry','website','owner_id'])]
class Company extends Model
{
    use HasFactory,HasUuids,SoftDeletes;

    protected $table = 'companies';
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
        return $this->belongsTo(User::class,'owner_id','id');
    }
    public function job_vacancies()
    {
        return $this->hasMany(Job_vacancy::class,'company_id','id');
    }  
    
    public function job_applications()
    {
        return $this->hasManyThrough(Job_Application::class, Job_vacancy::class,'company_id','job_vacancy_id','id','id');
    }
    
}
