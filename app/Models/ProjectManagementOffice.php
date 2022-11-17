<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ProjectManagementOffice extends Authenticatable
{
    use HasFactory;
    protected $guard='project_management_office';
}
