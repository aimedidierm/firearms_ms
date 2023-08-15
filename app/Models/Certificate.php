<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
}
