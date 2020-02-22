<?php
namespace App\Models\Traits;


use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
trait GetFillables {

    public function getFillablesWithDefaultValue($defaultValue = null, $ignoreProperty = null){

        return collect( $this->fillable )->map(function($item) use(&$defaultValue, &$ignoreProperty){
            if( is_array( $ignoreProperty ) && in_array( $item ,$ignoreProperty ) )
                return [$item => $this->$item];
            else if( is_array( $ignoreProperty ) && in_array( '*' ,$ignoreProperty ) )
                return [$item => $this->$item];
            else if( is_string( $ignoreProperty ) && $ignoreProperty == $item )
                return [$item => $this->$item];
            
            return [$item => $defaultValue];
        })->collapse()->toArray();

    }

    public function saveWithPropertys(SaveableFillable $the_model, $on_data, $withoutPropery = null){
        foreach($the_model->getFillables() as $property => $nullValue ){

            if(  is_array( $withoutPropery ) && in_array($property, $withoutPropery) )
                continue;
            else if( is_string($withoutPropery) && $withoutPropery == $property )
                continue;
            else $the_model->$property = $on_data->input( $property, null );
        }

        $the_model->save();
    }

}