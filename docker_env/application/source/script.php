<script>
<?php 
    $nombreDeSlider = 10;
    for ($i=1; $i < $nombreDeSlider; $i++) { 

    echo 'let slider'.$i.'_sliderItem = $("#slider'.$i.' .slider-item")

for (let i = 0; i < slider'.$i.'_sliderItem.length; i++) {
    slider'.$i.'_sliderItem[i].style.transform = "translateX(" + i*300 + "px)";
}

let slider'.$i.'_decalage2 = 0;
let slider'.$i.'_decalage = slider'.$i.'_sliderItem.length - 4
$("#slider'.$i.' .arrow-right").click(function(){
    if (slider'.$i.'_decalage - 4 > 0) {
        slider'.$i.'_decalage -= 4;
        slider'.$i.'_decalage2 -= 100;
        console.log("yes");
        $("#slider'.$i.' .slider").css("transform", "translateX(" + slider'.$i.'_decalage2 + "%)")
    }
    else if (!(slider'.$i.'_decalage == 0)) {

        slider'.$i.'_decalage2 -= slider'.$i.'_decalage * 25;
        slider'.$i.'_decalage -= slider'.$i.'_decalage;
        $("#slider'.$i.' .slider").css("transform", "translateX(" + slider'.$i.'_decalage2 + "%)")
    }
    console.log(slider'.$i.'_decalage);
})

$("#slider'.$i.' .arrow-left").click(function(){
    if (slider'.$i.'_decalage + 4 < slider'.$i.'_sliderItem.length - 4) {
        slider'.$i.'_decalage += 4;
        slider'.$i.'_decalage2 += 100;
        console.log("test");
        $("#slider'.$i.' .slider").css("transform", "translateX(" + slider'.$i.'_decalage2 + "%)")
    }
    else if (!(slider'.$i.'_decalage + 4 == slider'.$i.'_sliderItem.length)) {
        console.log(slider'.$i.'_decalage2);
        slider'.$i.'_decalage2 += (slider'.$i.'_decalage + 4 - slider'.$i.'_sliderItem.length) * -25;
        slider'.$i.'_decalage = slider'.$i.'_sliderItem.length - 4;
        $("#slider'.$i.' .slider").css("transform", "translateX(" + slider'.$i.'_decalage2 + "%)")

      console.log(slider'.$i.'_decalage + 4 - slider'.$i.'_sliderItem.length);  
    }
    console.log(slider'.$i.'_decalage);
})
';} ?>
</script>

