<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['title', 'description','salary','location','type',
'required_skills','view_count', 'company_id','job_category_id'])]
class JobVacancy extends Model
{
    use HasFactory, HasUuids,SoftDeletes;

    protected $table = 'job_vacancies';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $dates = ['deleted_at'];
    protected function casts(): array
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id','id');
    }
    public function job_category()
    {
        return $this->belongsTo(JobCategory::class,'job_category_id','id');
    }
    public function job_applications()
    {
        return $this->hasMany(JobApplication::class,'job_vacancy_id','id');
    }

}
