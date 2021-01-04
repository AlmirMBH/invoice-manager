<?php

namespace App\AtemschutzmaskenClasses;

class OrderTransformer{

    public static function save($allOrders)
    {
        foreach ($allOrders as $item) {
            $savedOrder[] = (new OrderTransformer)->createOrder($item);
        }

        return $savedOrder;
    }

    public function createOrder($item)
    {
        $order = new Order;
        $order->id = $item->id;
        $order->order_status = $item->order_status;
        $order->order_date = $item->order_date;
        $order->customer_note = $item->customer_note;
        $order->payment_method_title = $item->payment_method_title;
        $order->order_total_amount = $item->order_total_amount;
        $order->order_total_tax_amount = $item->order_total_tax_amount;

        $order->billing_company = $item->billing_company;
        $order->billing_first_name = $item->billing_first_name;
        $order->billing_last_name = $item->billing_last_name;
        $order->billing_address = $item->billing_address;
        $order->billing_city = $item->billing_city;
        $order->billing_state_code = $item->billing_state_code;
        $order->billing_post_code = $item->billing_post_code;
        $order->billing_country_code = $item->billing_country_code;
        $order->billing_email = $item->billing_email;
        $order->billing_phone = $item->billing_phone;
        $order->shipping_company = $item->shipping_company;
        $order->shipping_first_name = $item->shipping_first_name;
        $order->shipping_last_name = $item->shipping_last_name;
        $order->shipping_address = $item->shipping_address;
        $order->shipping_city = $item->shipping_city;
        $order->shipping_state_code = $item->shipping_state_code;
        $order->shipping_post_code = $item->shipping_post_code;
        $order->shipping_country_code = $item->shipping_country_code;
        $order->products = $item->products;

        foreach(json_decode($order->products) as $product){         

            $sku01 = '001';
            $sku02 = '001-1-1';
            $sku03 = '001-1';
            $sku04 = '002';
            $sku05 = '003';
            $sku06 = 'Hyg';
            $sku07 = '004';
            $sku08 = 'Med';
            $sku09 = '14-01';
            $sku10 = '006';
            $sku11 = '009';
            $sku12 = '007';
            $sku13 = '008';
            $sku14 = '00-11';
            $sku15 = '14-01-1';
          
        }

        return $order;
    }
    public function getProductQuantity($quantities){
        $quantity = $quantities[0];
        for ($i = 1; $i < count($quantities); $i++) {
            $quantity += $quantities[$i];
        }
        return $quantity;

    }
}
