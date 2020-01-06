<?php
// function Check taxaonomy
function check_taxaonomy($data_taxaonomy){
    foreach ($data_taxaonomy as $item):
        $check = $item->slug;
        if($check == '360-marquee')
            return true;
        return false;
    endforeach;
}
