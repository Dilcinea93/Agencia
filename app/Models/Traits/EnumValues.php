<?php
namespace App\Models\Traits;

use Illuminate\Support\Str;
use DB;

/**
 * Este trait se utiliza en los modelos para extraer
 * los valores de un enum de la tabla perteneciente a un modelo especifico

 You import and use a trait on a model file to
 have it's functions available as a model function (it's a way of "inheritance")

Each model that uses this trait, will retrieve it's ENUM fields values (Only values).

 so, you can access it's data in the view by typing:

 @foreach (App\Models\GeologyLivingPlace::getEnumValues()[6] as $value)
    <option value="{{ $value }}" {{ !is_null( old( 'erosion_por', $erosion_por ) ) && old( 'erosion_por', $erosion_por ) == $value ? 'selected' : '' }}>
        {{ $value }}
    </option>
@endforeach


HE did this because he used some Enum Fields and he want to AHORRAR lines on the controller, so he don't have to get (on the controller) all the Model fields and after send them to the view.  EN CAMBIO he sends to the view a colection with objects of the models that uses the trait, so the view don't has A NORMAL VARIABLE available, but it has A COLLECTION (that is a variable too) of objects.

So in the view when we foreach the colection
 */
trait EnumValues {
	public  function getTableName(){
        return $this->table;
    }

static function getInstance(){
        return (new static())->getTableName();
    }
    /**
     * Retorna el resultado de la consulta SHOW COLUMNS FROM [table]
     *
     * @param string $from_table
     * @return ResultSet
     */
static function getFields( $from_table ){
        return DB::select(
            DB::raw("SHOW COLUMNS FROM ".$from_table)
        );
    }

static function clearEnumRegex($str){
        $clear_enum = \preg_replace("/enum\(\'|\'\)|\,\'/", " ", $str);
        return preg_split("/\'+\s/", $clear_enum) ;
    }

static function getEnumValues(){

        /**
         * El metodo filter filtra unicamente aquellos que son campos de tipo Enum
         * El primer map retorna unicamente el array con los valores aceptados
         * El segundo map elimina los espacios en blanco de los strings de cada valor aceptado
         */
        $collect_res = collect( 
            static::getFields(static::getInstance() ) 
        )
        ->filter(function($item, $key){
            return Str::is("enum*", $item->Type);
        })
        ->map( function($item, $key){
            return  static::clearEnumRegex($item->Type);
        } );

        return $collect_res;
    }
}


?>