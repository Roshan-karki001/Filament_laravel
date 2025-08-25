<?php
namespace App\Models\StudyCase;

use Illuminate\Database\Eloquent\Model;

class CaseImage extends Model
{
    protected $table = 'case_images';

    protected $fillable = [
        'case_id',
        'image',
    ];

    public function caseStudy()
    {
        return $this->belongsTo(CaseStudy::class, 'case_id');
    }
}
