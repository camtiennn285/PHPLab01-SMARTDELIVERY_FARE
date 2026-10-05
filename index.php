<?php 
//constants 
const CURRENCY = "VND" ;
const BASE_FEE = 20000; //PHÍ CƠ BẢN
const FEE_PER_KM = 5000; //PHÍ TRÊN 1 KM
const HEAVY_WEIGHT_MIN = 5 ; //CÂN NẶNG TỐI THIỂU (KG)
const HEAVY_SURCHARGE = 10000; //phụ phí 
const EXPRESS_RATE = 0.3 ; //tỉ lệ chuyển phát
const PREMIUM_MIN = 100000; 
const PREMIUM_DISCOUNT_RATE = 0.1 ;
const TAX_RATE = 0.08;
//raw data 

$rawDistance = "8.5" ;
$weight = 6.5 ;
$priority = "EXPRESS" ;
$customerType = "PREMIUM" ;
$serviceAvailable = true ;

//check data type before casting 
echo "RAW DATA - BEFORE CASTING \n" ;
var_dump( $rawDistance );
var_dump( $weight );
var_dump($priority);
var_dump($customerType);
var_dump($serviceAvailable);n

?>