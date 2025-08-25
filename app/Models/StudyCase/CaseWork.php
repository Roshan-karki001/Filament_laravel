<?php

namespace App\Models\StudyCase;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseWork extends Model
{
    use SoftDeletes;

    protected $table = 'cases_works';

    protected $fillable = [
        'case_id',
        'title',
        'slug',
        'discription',
    ];

    public function caseStudy()
    {
        return $this->belongsTo(CaseStudy::class, 'case_id');
    }

    public function outcomes()
    {
        return $this->hasMany(CaseWorkOutcome::class, 'case_work_id');
    }
}
