<?php

namespace App\AtemschutzmaskenClasses;

use Automattic\WooCommerce\Client;

class ProductService{

    public function fetchProductNames($project_id){
        if($project_id == 1){
            $endPoint = env('WOO_ENDPOINT');
            $clientKey = env('WOO_CK');
            $clientSecret = env('WOO_CS');
        }elseif ($project_id == 2){
            $endPoint = env('WOO_ENDPOINT_FLIPFLOP');
            $clientKey = env('WOO_CK_FLIPFLOP');
            $clientSecret = env('WOO_CS_FLIPFLOP');
        }

        $woocommerce = new Client( $endPoint, $clientKey, $clientSecret,
            [
                'wp_api' => true,
                'version' => 'wc/v3',
                'query_string_auth' => true,
            ]
        );

        $params = [
            'per_page' => 100,
            'orderby' => 'date'
        ];

        $products = $woocommerce->get('products', $params);

        foreach ($products as $product){
            $apiProductNames[] = $product->name;
        }

        $product = new Product();
        foreach($apiProductNames as $productName){

            if ($productName === 'TYP II') {
                $product->typII = 'TYP II';
            }
            elseif ($productName === 'HUM Chirurgische Einwegmasken Typ IIR'){
                $product->typIIR = 'TYP IIR';
            }
            elseif ($productName === 'Atemschutzmasken N95 / KN95 / FFP2 (HG-002)'){
                $product->hg002 = 'N95 HG-002';
            }
            elseif ($productName === 'Gesichtsschutzmaske mit Kunststoffschild (HG-005)'){
                $product->hg005 = 'SHILD HG-005';
            }
            elseif ($productName === 'Bedruckbare Maske für das Gesicht (für Mund und Nase)'){
                $product->redMask = 'HYG ROTE MASKEN';
            }
            elseif ($productName === 'Doorhandler'){
                $product->doorHandler = 'DOORHANDLER';
            }
            elseif ($productName === 'Medical'){
                $product->medEinweg = 'MED EINWEG';
            }
            elseif ($productName === 'WELTNEUHEIT - Stoffmasken mit FFP2 Eigenschaften'){
                $product->stoff = 'STOFFMASKEN';
            }
            elseif ($productName == 'Trennwände aus Plexiglas im eleganten Design'){
                $product->trennwand = 'TRENNWAND';
            }
            elseif ($productName == 'Infrarot Thermometer'){
                $product->thermometer = 'THERMOMETER';
            }
            elseif ($productName == "Similasan Handdesinfektion 90 ml"){
                $product->handSmilsan = 'HANDDESINF SMILSAN';
            }
            elseif ($productName == 'Handdesinfektionsmittel 1Liter'){
                $product->handsmittel = 'HANDDESINFEKTIONSMITTEL';
            }
            elseif ($productName == 'Oberflächendesinfektionsmittel 1Liter'){
                $product->flachendes = 'FLÄCHENDES.';
            }
            elseif ($productName == 'Spender für Handdesinfektion'){
                $product->handSpender = 'HAND SPENDER';
            }
        }
        return $product;
        //dd($product);
    }


}