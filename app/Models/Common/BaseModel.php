<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Validator;

class BaseModel extends Model
{
    public $autoValidate = true;
	protected static $rules;
	protected static $errors;
	protected static $request;

	protected static $niceNames = [];
    protected static $modelName;
    protected static function boot(){
        parent::boot();      
        static::saving(function($model)
        {
            $check = true;
            if($model->autoValidate){ 
               	$check = $model->validate($model);
            }
            return $check;
        });
    }

    public static function validate($model){
        $model_name = class_basename(get_class($model));
		$request = $model->getAttributes();
		$c_request = array();
		$request_key = array_keys($request);
		$_rule = [];
        foreach ($request_key as $key) {
            if( isset(static::$rules[$key])){
                $_rule[$model_name . '_' . $key] = static::$rules[$key];
                $c_request[$model_name . '_' . $key] = $request[$key];
            }
        }

        // if(\App::getLocale() == 'jp' && static::$option){
        // 	foreach (static::$option as $key => $value) {
        // 		unset($_rule[$value]);
        // 	}
        // }
        $validator = Validator::make($c_request,$_rule);

        if($validator->fails())	{
        	static::$errors = $validator->messages();
			return false;	
		}
 		else { 
 			return true; 
 		}        
    }

    public function errors(){
        return static::$errors;
    }
}
