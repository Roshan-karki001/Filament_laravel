<?php
namespace App\Models\StudyCase;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseStudy extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cases';

    protected $fillable = [
        'title',
        'slug',
        'discription',
        'link',
        'thumbnail',
        'company',
        'year',
        'industry',
        'cases_tags',
    ];

    public function works()
    {
        return $this->hasMany(CaseWork::class, 'case_id');
    }

    public function images()
    {
        return $this->hasMany(CaseImage::class, 'case_id');
    }
}
