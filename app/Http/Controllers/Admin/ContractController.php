<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ContractController extends Controller
{
    public function create()
    {
        return view('contracts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'client_name'            => 'required|string|max:255',
            'client_company'         => 'nullable|string|max:255',
            'developer_name'         => 'required|string|max:255',
            'country'                => 'required|string|max:255',
            'contract_date'          => 'required|date',
            'project_details'        => 'required|string',
            'start_date'             => 'required|date',
            'schedule_text'          => 'required|string',
            'total_fee'              => 'required|numeric',
            'advance_fee'            => 'nullable|numeric',
            'invoice_due_days'       => 'required|integer',
            'late_fee_percent'       => 'required|numeric',
            'support_after_acceptance' => 'sometimes|boolean',

            'section_2_2_text'       => 'nullable|string',
            'section_2_4_text'       => 'nullable|string',
            'section_4_text'         => 'nullable|string',
            'section_5_6_text'       => 'nullable|string',
            'section_6_text'         => 'nullable|string',
            'section_10_1_text'      => 'nullable|string',
            'section_11_3_text'      => 'nullable|string',
            'section_11_5_text'      => 'nullable|string',
            'governing_law_country'  => 'required|string|max:255',
        ]);

        // checkbox ka fix
        $data['support_after_acceptance'] = $request->has('support_after_acceptance');

        $contract = Contract::create($data);

        return redirect()->route('contracts.show', $contract);
    }

    public function show(Contract $contract)
    {
        return view('contracts.show', compact('contract'));
    }

    // PDF generate
    public function pdf(Contract $contract)
    {
        $pdf = Pdf::loadView('contracts.show', compact('contract'));
        return $pdf->download('contract-'.$contract->id.'.pdf');
        // ya ->stream() agar browser me open karna ho
    }
}
