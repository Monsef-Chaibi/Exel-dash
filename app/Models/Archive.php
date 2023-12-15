<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;
    protected $fillable = [
        'iditem',
        'paidby',
        'status',
        'datepaid',
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
