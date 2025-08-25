<?php

namespace App\Models\StudyCase;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseWorkOutcome extends Model
{
    use SoftDeletes;

    protected $table = 'cases_works_outcome';

    protected $fillable = [
        'case_work_id',
        'title',
        'slug',
        'stats',
    ];

    public function caseWork()
    {
        return $this->belongsTo(CaseWork::class, 'case_work_id');
    }
}
