<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateF22Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f22_s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cte_id')->unsigned();
            $table->string('rut');
            $table->string('email');
            $table->string('folio');
            $table->datetime('tax_year');
            $table->double('first_category_tax_rent_determ', 16, 5);            
            $table->double('C18_first_category_tax_rent_taxable_base',16,5);
            $table->double('C122_total_assets',16,5);
            $table->double('C123_total_liabilities',16,5);
            $table->double('C628_perceived_or_accrued_income',16,5);
            $table->double('C630_direct_cost_of_goods_and_services',16,5);
            $table->double('C631_remuneration',16,5);
            $table->double('C632_depreciation',16,5);
            $table->double('C635_other_deductible_expenses_gross_income',16,5);
            $table->double('C637_debtor_balance_restatement',16,5);
            $table->double('C638_credit_balance_restatement',16,5);
            $table->double('C643_net_taxable_income_or_tax_loss',16,5);
            $table->double('C645_positive_tax_equity',16,5);
            $table->double('C647_fixed_assets',16,5);
            $table->double('C366_credit_assets_of_physical_property_exercise',16,5);
            $table->double('C629_interest_received_or_accrued',16,5);
            $table->double('C633_interest_paid_or_owed',16,5);
            $table->double('C82_credit_for_training_expenses',16,5);
            $table->double('C839_credit_assets_of_property_from_investments',16,5);
            $table->double('C893_capital_increase',16,5);
            $table->double('C894_capital_decrease',16,5);
            $table->double('C651_other_interest_paid_or_owed',16,5);

            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('f22_s');
    }
}
