<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $fillable = [
        'product',
        'soldp',
        'gtnum',
        'desc',
        'plantkey',
        'shipp',
        'bildoc',
        'bildt',
        'vin',
        'color',
        'amount',
        'paid',
        'paidby' ,
        'datepaid',
        'ordernum',
        'paidtype',
        'paidbya',
        'reference',
        'done',
        'paidbya',
        'newreference',
    ];
}
