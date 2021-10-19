<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

if (!function_exists('handleFilesIfPresent')) {
    function handleFilesIfPresent(string $cmsPage, array $inputData, Model $model): array
    {
        foreach ($inputData as $index => $inputDatum) {
            if (is_array($inputDatum)) {
                $inputData[$index] = handleFilesIfPresent($cmsPage, $inputDatum);
            }
            if ($inputDatum instanceof UploadedFile) {
                $fileName = '/assets/uploads/' . $cmsPage . '/' . $inputDatum->hashName();
                $inputData[$index] = $fileName;
                if (File::exists(public_path($model->$index))) {
                    File::delete(public_path($model->$index));
                }
                $inputDatum->move(
                    public_path('assets/uploads/' . $cmsPage), $fileName
                );
            }
        }
        return $inputData;
    }
}
?>
