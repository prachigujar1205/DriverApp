<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiries extends Model
{
    use HasFactory;
    public $table = 'enquries';
    protected $fillable = [
        'customer_name',
        'customer_email',
        'mobile_no',
        'alternate_mobile_no',
        'address',
        'pincode',
        'package_type',
        'hours_count',
        'days_count',
        'package_count',
        'total',
    ];
    public $primaryKey = 'enquiry_id';
}
