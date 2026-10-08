<?php
//calculations
    // casting
   $distanceKm = (float)$rawDistance;
   $baseFee = BASE_FEE ;
   $distanceFee = $distanceKm*FEE_PER_KM ;

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
   $status = $canDeliver ? "ACCEPTED" : "BLOCKED";
   $finalTotal = $canDeliver ? $total:0 ;

?>