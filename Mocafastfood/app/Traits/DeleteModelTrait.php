<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait DeleteModelTrait
{

	public function DeleteModelTrait($id, $model)
	{
		try {
			$model->find($id)->delete();
			return response()->json([
				'code'=>200,
				'message'=>'success'
			], 200);

		} catch (Exception $e) {
			Log::error('Messeage: ' . $e->getMessage() . 'Line: ' . $e->getLine());
			return response()->json([
				'code'=>500,
				'message'=>'fail'
			], 500);
		}
	}
}







