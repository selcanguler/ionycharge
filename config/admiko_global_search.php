<?php
/** Admiko global search configuration**/



/**IMPORTANT: this page will be overwritten and any change will be lost!!
 ** use admiko_global_search_custom.php to add your models into global search!!
 **/
return [
    [
        'name' => 'Customer Management',
        'route_id' => 'customer',
        'model' => 'Customer',
        'fields' => [
            ["field"=>"firstname","show"=>1],
			["field"=>"lastname","show"=>1],
			["field"=>"email","show"=>1]
        ]
    ],
    [
        'name' => 'Contact Form Management',
        'route_id' => 'contact_form',
        'model' => 'ContactForm',
        'fields' => [
            ["field"=>"name","show"=>1],
			["field"=>"email","show"=>1],
			["field"=>"body","show"=>0]
        ]
    ],
    [
        'name' => 'Reservation Management',
        'route_id' => 'booking',
        'model' => 'Booking',
        'fields' => [
            ["field"=>"booking_date","show"=>1]
        ]
    ],
];
