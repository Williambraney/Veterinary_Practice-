<?php
// this is called mass population
$owner = Owner::create([ 
    "first_name" => "Britney",
    "last_name" => "Green",
    "telephone" => "09978564735",
    "address_1" => "67 Bahama Road",
    "town" => "Ipswich",
    "postcode" => "IP16DF",
]);

    protected $fillable = ["first_name", "last_name", "telephone", "address_1", "address_2", "town", "postcode"];  //used in order to use mass assignment above which is used to quickly populate tables.