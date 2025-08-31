<?php

namespace App\Models\StudyCase;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseImage extends Model
{
    use HasFactory;

    protected $table = 'case_images';

    protected $fillable = [
        'case_id',
        'image',
    ];

    /**
     * Relationship: A CaseImage belongs to a CaseStudy
     */
    public function caseStudy()
    {
        return $this->belongsTo(CaseStudy::class, 'case_id');
    }
}
