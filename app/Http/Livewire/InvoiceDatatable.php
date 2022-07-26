<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\apbinvoice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;

class InvoiceDatatable extends LivewireDatatable
{
    // public function render()
    // {
    //     return view('livewire.invoice-datatable');
    // }
    // $id = Auth::id();
    // public $today= Carbon::now();
    public function builder()
    {
    return apbinvoice::query()
        ->join('users','users.unitid','=','APB_invoice.unitid')
        // ->selectRaw("(select fAPB_getpayment(APB_invoice.id)) as status")
        ->where('users.id',Auth::id())
        ->whereYear('APB_invoice.trdate',Carbon::now()->year);
    }
    public function columns()
    {
        return [
            Column::name('id')
                ->label('Invoice No')
                ->defaultSort('asc')
                ->sortBy('id')
                ->searchable()
                ->alignCenter(),
            Column::name('unitid')
                ->label('Unit ID')
                ->searchable()
                ->alignCenter(),
            Column::name('unitiddesc')
                ->label('Unit Desc'),
            Column::raw('DATE_FORMAT(trdate, "%d-%b-%Y")')
                ->label('Invoice Date')
                ->searchable()
                ->alignCenter(),
            Column::raw('DATE_FORMAT(paymentsch, "%d-%b-%Y")')
                ->label('Due Date')
                ->alignCenter(),
            NumberColumn::name('netamt')
                ->label('Amount')
                ->view('tables.amount'),
            Column::raw("IF(fAPB_getpayment(APB_invoice.id)=0,'UnPaid','Paid')")
                ->label('Status')
                ->view('tables.paid')
                ->searchable(),
            Column::callback(['id','trdate'], function ($id,$trdate) {
                    return view('tables.table-action', ['id' => $id,'trdate'=>$trdate]);
                })->unsortable()->label('Action')
        ];
    }
    public function cellClasses($row, $column)
    {
    return 'fitcolumncustom';
    }
}
