<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait storageImageTrait
{

	public static function storageTraitUpload($request, $fieldname, $folderName) {
		if ($request->hasFile($fieldname)) {
			$file = $request->$fieldname;
			$filenameOrigin = $file->getClientOriginalName();
			$filenameHash = Str::random(20). '.' . $file->getClientOriginalExtension();
			$filepath = $request->file($fieldname)->storeAs('public/'.  $folderName . '/' .auth()->id(), $filenameHash);

			$dataUploadTrait = [
				'file_name' => $filenameOrigin,
				'file_path' => Storage::url($filepath)
			];
			return $dataUploadTrait;
		}

		return null;
	}

	public static function storageTraitUploadMultiple($file, $folderName) {


		$filenameOrigin = $file->getClientOriginalName();
		$filenameHash = Str::random(20). '.' . $file->getClientOriginalExtension();
		$filepath = $file->storeAs('public/'.  $folderName . '/' .auth()->id(), $filenameHash);

		$dataUploadTrait = [
			'file_name' => $filenameOrigin,
			'file_path' => Storage::url($filepath)
		];
		return $dataUploadTrait;

	}
}







