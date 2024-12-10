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

        $filePath = storage_path("app/{$this->invoice->file_path}");
        
        return $this->view('emails.invoice_created')
            ->subject('Nouvelle facture créée')
            ->attach($filePath)
            ->with(['invoice' => $this->invoice]);
    }
}