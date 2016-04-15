<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateF29Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f29_s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cte_id')->unsigned();
            $table->string('C03_rut');
            $table->datetime('C15_period');
            $table->double('C062_net_ppm_det',16,5);  
            $table->double('C110_qty_receipt_documents',16,5);  
            $table->double('C111_debits_receipts',16,5); 
            $table->double('C115_first_category_ppm_rate',16,5); 
            $table->double('C142_sells_or_services_exempt_or_not',16,5); 
            $table->double('C151_10_percent_rate_retention_over_rent',16,5); 
            $table->double('C502_debt_issued_invoices',16,5); 
            $table->double('C503_qty_issued_invoices',16,5); 
            $table->double('C509_qty_credit_memo',16,5); 
            $table->double('C510_debt_issued_credit_memo',16,5); 
            $table->double('C511_credit_iva_tax_electronic_documents',16,5); 
            $table->double('qty_buy_invoice_rec_ret_tot_e',16,5);
            $table->double('C519_qty_invoices_received_from_activity',16,5);
            $table->double('C520_credit_rec_reint_fact_from_activity',16,5);
            $table->double('qty_received_credit_memo',16,5);
            $table->double('credit_recup_reint_credit_memo',16,5);
            $table->double('C537_total_credits',16,5);
            $table->double('C538_total_debits',16,5);
            $table->double('C547_determined_total',16,5);
            $table->double('C089_iva_tax_det',16,5);
            $table->double('C563_taxable_income',16,5);
            $table->double('C573_previous_remainder_change_suj_per',16,5);
            $table->double('net_amount_buy_invoices_received',16,5);
            $table->double('C595_sub_total_determined_tax_front',16,5);
            $table->double('C598_imputable_changable_advances_suj',16,5);
            $table->double('C723_total_imputable_catch_credit',16,5);
            $table->double('C724_rem_catch_credit_pediod',16,5);
            $table->double('C07_folio',16,5);
            $table->double('C527_qty_received_credit_memo',16,5);
            $table->double('C528_credit_recup_reint_credit_memo',16,5);
            $table->double('C515_qty_buy_invoice_rec_ret_tot_e',16,5);
            $table->double('C587_net_amount_buy_invoices_received',16,5);

                       
            
            
            $table->timestamps();
            
            $table->foreign('cte_id')->references('id')->on('ctes')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('f29_s');
    }
}
