<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/** Migration to fill tariffs table. */
class FillTariffsTable extends Migration
{
    private $data = [
        [
            'name' => 'Detox',
            'price' => '5500',
            'mon' => true,
            'tue' => false,
            'wed' => true,
            'thu' => false,
            'fri' => true,
            'sat' => false,
            'sun' => false,
        ],
        [
            'name' => 'Express Fit',
            'price' => '5370',
            'mon' => true,
            'tue' => true,
            'wed' => true,
            'thu' => false,
            'fri' => false,
            'sat' => false,
            'sun' => false,
        ],
        [
            'name' => 'Super Fit',
            'price' => '5490',
            'mon' => false,
            'tue' => false,
            'wed' => true,
            'thu' => true,
            'fri' => true,
            'sat' => false,
            'sun' => false,
        ],
        [
            'name' => 'Fit',
            'price' => '6000',
            'mon' => true,
            'tue' => true,
            'wed' => true,
            'thu' => true,
            'fri' => true,
            'sat' => true,
            'sun' => true,
        ],
        [
            'name' => 'mFit',
            'price' => '5940',
            'mon' => false,
            'tue' => true,
            'wed' => true,
            'thu' => true,
            'fri' => true,
            'sat' => true,
            'sun' => false,
        ],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        DB::table('tariffs')->insert($this->data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        DB::table('tariffs')->whereIn('name', $this->data)->delete();
    }
}
