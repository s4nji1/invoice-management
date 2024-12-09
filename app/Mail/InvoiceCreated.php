<?php

namespace App\Mail;
use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceCreated extends Mailable{ 
    
    use Queueable, SerializesModels;
    
    public $invoice;
    
    public function __construct(Invoice $invoice){
        $this->invoice = $invoice;
    }

    public function build(){
        return $this->view('emails.invoice_created')
            ->subject('Nouvelle facture créée')
            ->attach(storage_path('app/invoices/example.pdf'))
            ->with(['invoice' => $this->invoice]);
    }
}