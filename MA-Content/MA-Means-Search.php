<?php

require_once "MA-Classes/MA-Connection.php";
$q=$_GET["q"];
$MA_Connection = new MA_Connection('arabic');
$MA_SEARCH_QUERY   = "SELECT *FROM means WHERE word  LIKE '%$q%' OR mean  LIKE '%$q%' OR collection LIKE '%$q%' OR counter LIKE '%$q%' OR GlossaryOf LIKE '%$q%' OR single LIKE '%$q%'";
$MA_SEARCHED_WORDS = $MA_Connection->MA_SQL_QUERY($MA_SEARCH_QUERY,true,array($q, $q, $q, $q, $q, $q),null,'All');

//lookup all links from the xml file if length of q>0

if (strlen($q) > 0) {

    foreach ($MA_SEARCHED_WORDS as $MA_WORD ){
        $MA_WORD_SELECTED        = $MA_WORD['word'];
        $MA_MEAN_SELECTED        = $MA_WORD['mean'];
        $MA_COLLECTION_SELECTED  = $MA_WORD['collection'];
        $MA_COUNTER_SELECTED     = $MA_WORD['counter'];
        $MA_GLOSSARYYoF_SELECTED = $MA_WORD['GlossaryOf'];
        $MA_SINGLE_SELECTED      = $MA_WORD['single'];
        if ($q == ($MA_MEAN_SELECTED or  $MA_WORD_SELECTED or $MA_COLLECTION_SELECTED or $MA_COUNTER_SELECTED or $MA_GLOSSARYYoF_SELECTED or $MA_SINGLE_SELECTED)) {
            echo "<a href='?input_mean=" . $MA_WORD_SELECTED . "'>" . $MA_WORD_SELECTED . "</a>";
        } else{
            $MA_ERROR =  "عفوا الكلمة المطلزبة غير موجوده";
        }
    }
}
