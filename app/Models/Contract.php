<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'client_name',
        'client_company',
        'developer_name',
        'country',
        'contract_date',
        'project_details',
        'start_date',
        'schedule_text',
        'total_fee',
        'advance_fee',
        'invoice_due_days',
        'late_fee_percent',
        'support_after_acceptance',
        'section_2_2_text',
        'section_2_4_text',
        'section_4_text',
        'section_5_6_text',
        'section_6_text',
        'section_10_1_text',
        'section_11_3_text',
        'section_11_5_text',
        'governing_law_country',
    ];
}
