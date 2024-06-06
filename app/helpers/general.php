<?php

use Illuminate\Support\Facades\Http;

function getLocale(){
    return app()->getLocale();
}

function apiGetLocale(){
    if(app()->getLocale() == 'ar'){
        return 'AR';
    }else{
        return 'EN';
    }
}

function getLocale2(){
    if(app()->getLocale() == 'ar'){
        return 'NA';
    }else{
        return 'FO';
    }
}

function getInput($input, $trans, $locale='en'){
    $values = [];
    foreach ($input as $index => $field) {
        foreach ($trans as $tran) {
            if ($index == $tran) {
                $values[$index] = $field;
                unset($input[$index]);
            }
        }
    }
    $input[$locale] = $values;
    unset($input['locale']);
    return $input;
}

function generalUpload($model, $file){
    if ($file) {
        if (config('app.WITH_PUBLIC')){
            $dir = 'public/uploads/' . $model;
        }else{
            $dir = 'uploads/' . $model;
        }

        if (!file_exists($dir)) {
            try {
                \File::makeDirectory($dir);
            } catch (\Exception $e) {
            }
        }

        $name = rand(0, 99999) . time();
        $ext = $file->getClientOriginalExtension();
        $fileName = $name . '.' . $ext;

        $newDir = $dir . '/' . $fileName;

        $status = \File::copy($file, $newDir);

        if ($status) {
            return 'uploads/'.$model.'/'.$fileName;
        }
    }
}
function deleteUpload($path){
    if(\File::exists(public_path($path))){
        \File::delete(public_path($path));
        return true;
    }else{
        return true;
    }
}
function acceptImageType($val=1){
    if($val==0){
        return 'png,svg,jpg,jpeg,webp';
    }
    return '.png, .svg, .jpg, .jpeg, .webp';
}
function acceptFileType($val=1){
    if($val==0){
        return 'pdf,ppt,pptx,doc,docx,xls,xlsx,rtf';
    }
    return '.pdf, .ppt, .pptx, .doc, .docx, .xls, .xlsx, .rtf';
}
function getMaxSize($type=null){
    if($type == 'mb'){
        return 2;
    }
    return 2048;
}
