<?php

use Illuminate\Database\Seeder;

class CancelPolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cancel_policies')->insert([
        [
            'name' => 'Flexible',
            'description' => '<p>100% payout for cancellations made within 24 hours of the booking start time.</p>',
        ],
        [
            'name' => 'Moderate',
            'description' => '<p>100% payout for cancellations made within 2 days of the booking start time.</p><p>50% payout for cancellations made between 2-5 days of the booking start time.</p>',
        ],
        [
            'name' => 'Strict',
            'description' => '<p>100% payout for cancellations made within 14 days of the booking start time.<p></p>50% payout for cancellations made between 14-30 days of the booking start time.</p>',
        ]
    ]);
    }
}
