<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BasketTest extends TestCase
{
    use RefreshDatabase;

    public function test_total_1(): void
    {

        $products = ['B01', 'G01'];
        $total = 37.85;

        $this->totals($products, $total);
    }

    public function totals(array $products, float $total)
    {
        $this->authUser();

        collect($products)->each(function ($code) use (&$response) {
            $response = $this->postJson('api/basket-products', [
                'code' => $code,
            ]);

        }
        );

        $this->assertEquals($response->original->total, $total, 'Total: '.$total.' Basket: '.$response->original->total);
    }

    public function test_total_2(): void
    {
        $products = ['R01', 'R01'];
        $total = 54.37;

        $this->totals($products, $total);
    }

    public function test_total_3(): void
    {
        $products = ['R01', 'G01'];
        $total = 60.85;

        $this->totals($products, $total);
    }

    public function test_total_4(): void
    {
        $products = ['B01', 'B01', 'R01', 'R01', 'R01'];
        $total = 98.27;

        $this->totals($products, $total);
    }
}
