<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Basic Product
        $basic = Product::create([
            'name' => 'Basic',
            'stripe_product' => 'prod_I0ycGK5Hse4TSJ'
        ]);

        //Basic Monthly
        Plan::create([
            'price' => '1000',
            'time_frame' => 'monthly',
            'product_id' => $basic->id,
            'stripe_plan' => 'price_1HQwevDCGStqo9iGaxpfhKmJ'
        ]);

        //Basic Yearly
        Plan::create([
            'price' => '10000',
            'time_frame' => 'yearly',
            'product_id' => $basic->id,
            'stripe_plan' => 'price_1HQwevDCGStqo9iGXCAx4R3V'
        ]);



        //Pro Product
        $pro = Product::create([
            'name' => 'Pro',
            'stripe_product' => 'prod_I0ydKR1zXZFPCU'
        ]);

        //Pro Monthly
        Plan::create([
            'price' => '2500',
            'time_frame' => 'monthly',
            'product_id' => $pro->id,
            'stripe_plan' => 'price_1HQwfnDCGStqo9iGzcdaDVRy'
        ]);

        //Pro Yearly
        Plan::create([
            'price' => '25000',
            'time_frame' => 'yearly',
            'product_id' => $pro->id,
            'stripe_plan' => 'price_1HQwfoDCGStqo9iGJtqeD2vC'
        ]);



        //Enterprise Product
        $enterprise = Product::create([
            'name' => 'Enterprise',
            'stripe_product' => 'prod_I0ydAPixAMbVRu'
        ]);

        //Enterprise Monthly
        Plan::create([
            'price' => '10000',
            'time_frame' => 'monthly',
            'product_id' => $enterprise->id,
            'stripe_plan' => 'price_1HQwgQDCGStqo9iGDkTKiHpu'
        ]);

        //Enterprise Yearly
        Plan::create([
            'price' => '100000',
            'time_frame' => 'yearly',
            'product_id' => $enterprise->id,
            'stripe_plan' => 'price_1HQwgQDCGStqo9iGC8qzO6Xh'
        ]);
    }
}
