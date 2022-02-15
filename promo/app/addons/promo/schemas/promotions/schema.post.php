<?php

$schema['conditions']['how_much_add_to_cart'] = array(
    'operators' => array('eq'),
    'type' => 'input',
    'field_function' => array('fn_amount_products', '#this', '@product'),
    'zones' => array('cart'),
);

$schema['bonuses']['cheap_product'] = array(
    'function' => array('fn_cheap_product', '#this', '@cart', '@cart_products'),
    'zones' => array('cart'),
    'type' => 'input',
    'filter' => 'floatval'
);

return $schema;
