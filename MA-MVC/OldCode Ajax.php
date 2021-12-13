<?php
if ($q == $MA_WORD_SELECTED) {
    if (stristr($MA_WORD_SELECTED, $q)) {
        if ($hint=="") {
            $hint="<a href='?input_mean=" . $MA_WORD_SELECTED . "'>" . $MA_WORD_SELECTED . "</a> ";
        } else {
            $hint=$hint . "<br /><a href='?input_mean=" . $MA_WORD_SELECTED . "' target='_blank'>" . $MA_WORD_SELECTED . "</a>";
        }
    }
} elseif ($q == $MA_MEAN_SELECTED){
    if (stristr($MA_MEAN_SELECTED, $q)) {
        if ($hint=="") {
            $hint="<option><a href='?input_mean=" . $MA_MEAN_SELECTED . "'>" . $MA_MEAN_SELECTED . "</a> </option>";
        } else {
            $hint=$hint . "<br /><option><a href='?input_mean=" . $MA_MEAN_SELECTED . "' target='_blank'>" . $MA_MEAN_SELECTED . "</a></option>";
        }
    }
} elseif ($q == $MA_COLLECTION_SELECTED){
    if (stristr($MA_MEAN_SELECTED, $q)) {
        if ($hint=="") {
            $hint="<option><a href='?input_mean=" . $MA_COLLECTION_SELECTED . "'>" . $MA_COLLECTION_SELECTED . "</a></option>";
        } else {
            $hint=$hint . "<br /><option><a href='?input_mean=" . $MA_MEAN_SELECTED . "' target='_blank'>" . $MA_MEAN_SELECTED . "</a></option>";
        }
    }
}  elseif (($q != $MA_WORD_SELECTED) or ($q != $MA_COLLECTION_SELECTED) or ($q != $MA_COUNTER_SELECTED) or ($q != $MA_MEAN_SELECTED) or ($q != $MA_GLOSSARYYoF_SELECTED) or ($q != $MA_SINGLE_SELECTED)){
    $hint=" ";
}


// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
    $response="<p style='line-height: 26px;padding-right: 2px;'>عفوا لا يوجد مقترحات</p>";
} else {
    $response=$hint;
}
//output the response
echo "<pre>";
print_r($response);
echo "</pre>";
?>