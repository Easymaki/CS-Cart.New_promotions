<?php

function fn_amount_products($condition, $product)
{
    $products_count = count($product['products']);
    if ($products_count == $condition['value']) {
        return true;
    } else {
        return false;
    }
}

function fn_cheap_product($condition, &$cart, &$cart_products)
{
    $min = [];
    foreach ($cart_products as $key => $value) {
        if (!(empty($value))) {
            $min = min(array($min, $value['price']));
            if ($value['price'] == $min) {
                $key_product = $key;
            }
        }
    }

    foreach ($cart_products as $key => &$value) {
        if ($key == $key_product) {
            $value['price'] = $min - $condition['value'];
        }

        if ($value['price'] < 0) {
            $value['price'] = 0;
        }
    }

    $cart['discount'] += $condition['value'];
    $cart['use_discount'] = true;
}
