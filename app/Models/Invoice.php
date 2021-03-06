<?php

namespace Invoicing\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'balance',
        'client_id',
        'invoice_number',
        'unique_id',
        'description',
        'due',
        'idempotency_key'
    ];

    protected $dates = [
        'due'
    ];

    protected $touches = [
        'client'
    ];

    public function workOrders()
    {
        return $this->hasMany('Invoicing\Models\WorkOrder');
    }

    public function notes()
    {
        return $this->morphMany('Invoicing\Models\Note', 'subject');
    }

    public function items()
    {
        return $this->hasMany('Invoicing\Models\InvoiceItem');
    }

    public function payments()
    {
        return $this->hasMany('Invoicing\Models\Payment');
    }

    public function client()
    {
        return $this->belongsTo('Invoicing\Models\Client');
    }

    public function uncompletedWorkOrders()
    {
        return $this->hasMany('Invoicing\Models\WorkOrder')->whereCompleted(0);
    }

    public function workOrderTotals()
    {
        return $this->workOrders->reduce(function($total, $workOrder) {
            return $total + $workOrder->amount();
        });
    }

    public function itemTotal()
    {
        return $this->items->sum('amount');
    }

    public function paymentTotal()
    {
        return $this->payments->sum('amount');
    }

    public function billableTotal()
    {
        return $this->itemTotal() + $this->workOrderTotals();
    }

    public function balance()
    {
        return (int) $this->billableTotal() - $this->paymentTotal();
    }

    public function updateBalance()
    {
        $balance = $this->balance();

        $this->update(['balance' => $balance]);

        return $balance;
    }
}
