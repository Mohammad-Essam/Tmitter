<?php

namespace App\Casts;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class datehuman implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes)
    {
        $date = Carbon::parse($value)->diffForHumans();
        $i = 0;
        $result = "";
        for (; $i < strlen($date); $i++) {
            if(is_numeric($date[$i]))
                $result.=$date[$i];
            else
                break;
        }
        $result .= $date[$i+1];
        // return $value;
        return $result;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        // return Carbon::parse($value)->diffForHumans() ;
        return $value;
    }
}
