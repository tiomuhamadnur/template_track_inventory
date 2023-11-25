<?php

function formatRupiah($nominal, $prefix = false)
{
    if ($prefix){
        return "Rp." . number_format($nominal, 0, ',', '.');
    }
        return number_format($nominal,0, ',', '.');
}


