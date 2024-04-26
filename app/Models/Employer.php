<?php

namespace App\Models;

use App\Policies\EmployerPolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
    ];
    protected $policies = [
        Employer::class => EmployerPolicy::class,
    ];

    public function my_job(): HasMany
    {
        return $this->hasMany(myJob::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
