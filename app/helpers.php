<?php
function extractHashtags(string $st)
{
    $pos = strpos($st,"#");
    $array = [];
    $word = "";
    if($pos === false)
        return $array;
    for($i = $pos; $i< strlen($st); $i++)
    {
        if($st[$i] != " ")
        {
            $word .=$st[$i];
        }
        else
        {
            $array[] =$word;
            $word ="";
            $i = strpos($st,"#",$i);
            if($i === false)
                break;
            --$i;
        }
    }
    if($word !="")
        $array[] = $word;
    return $array;
}
