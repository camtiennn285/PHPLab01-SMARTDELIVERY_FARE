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
echo "get type rawDistance: " . var_dump( $rawDistance );
echo "get type weight: " . var_dump( $weight );
echo "get type priority: " . var_dump($priority);
echo "get type customerType: " . var_dump($customerType);
echo "get type serviceAvaiable: " . var_dump($serviceAvailable); 
echo "\n" ;
//explicit casting: 
$distanceKm = (float)$rawDistance ;
echo "AFTER CASTING \n" ;
echo "get type rawDistance: " . gettype($rawDistance) ."\n" ;
echo "get type distanceKm: " . gettype($distanceKm) ."\n" ;

//calculations

   $baseFee = BASE_FEE ;
   $distanceFee = $distaneKm*FEE_PER_KM ;

   //PHỤ PHÍ HÀNG NẶNG
   $heavySurcharge = 0;
   if($weight > HEAVY_WEIGHT_MIN){
      $heavySurcharge = HEAVY_SURCHARGE;
   }
   //PHỤ PHÍ EXPRESS 
   $expressSurcharge = 0;
   if($priority === "EXPRESS"){
    $expressSurcharge = ($baseFee + $distanceFee)*EXPRESS_RATE ;
   }

   //PHỤ PHÍ 
   $surcharges = $heavySurcharge + $expressSurcharge ;

   //Tổng trước khi giảm giá premium 
   $amountBeforeDiscount = $baseFee + $distanceFee + $surcharges ;

   //Giảm giá premium 
   $discount = 0;
   if($customerType === "PREMIUM" && $amountBeforeDiscount >= PREMIUM_MIN) {
        $discount = $amountBeforeDiscount*PREMIUM_DISCOUNT_RATE ;
   }

   //TAX
   $taxableAmount = $amountBeforeDiscount - $discount ;
   $tax = $taxableAmount * TAX_RATE ;
   //Tổng phí giao 
   $total = $baseFee + $distanceFee + $surcharges - $discount + $tax  ;

   //delivery gate
   $isDistanceValid = $distanceKm > 0 ;
   $isWeightValid = $weight > 0 ;
   $isServiceAvailable = $serviceAvailable === true ;
   $isPriorityValid = $priority === "NORMAL" || $priority === "EXPRESS" ;

   $canDeliver = $isDistanceValid && $isWeightValid && $isServiceAvailable && $isPriorityValid;




 


?>