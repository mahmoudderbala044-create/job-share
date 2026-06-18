<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


#[Fillable(['name'])]
class Job_Category extends Model
{
    use HasFactory, HasUuids,SoftDeletes;

    protected $table = 'job_categories';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    protected function casts(): array
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }
    public function Job_vacancies()
    {
        return $this->hasMany(Job_Vacancy::class,'job_category_id','id');
    }    
    
}
