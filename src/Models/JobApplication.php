<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


#[Fillable(['status','ai_generated_score','ai_generated_feedback','user_id', 'job_vacancy_id','resume_id'])]
class JobApplication extends Model
{
    use HasFactory, HasUuids,SoftDeletes;

    protected $table = 'job_applications';
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
    public function job_vacancy()
    {
        return $this->belongsTo(JobVacancy::class,'job_vacancy_id','id');
    }
    public function resume()
    {
        return $this->belongsTo(Resume::class,'resume_id','id');
    }
}
