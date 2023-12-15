<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;
    protected $fillable = [
        'iditem',
        'by',
        'status',
        'in',
        'approvedby',
        'approveddate',
        'passedby',
        'passeddate',
        'rejectedby',
        'rejecteddate',
        'uploadedby',
        'uploadeddate',
        'repaymentby',
        'repaymentdate',
    ];
}
