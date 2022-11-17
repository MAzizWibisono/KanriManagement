<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function project_manager()
    {
        return $this->belongsTo(ProjectManager::class);
    }

    public function project_sdms()
    {
        return $this->hasMany(ProjectSdm::class);
    }

    public function daily_reports()
    {
        return $this->hasMany(DailyReport::class);
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }
}
