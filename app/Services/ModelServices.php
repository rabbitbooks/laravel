<?php

namespace App\Services;


class ModelServices
{
    static function prepareNewsData($request, $news)
    {
        $request->flash();

        $data = $request->except(['_method', '_token']);
        $data['image'] = FileServices::imgStore($request->file('image'));

        self::storeUpdate($data, $news);
    }

    static function storeUpdate($data, $model)
    {
        $model->fill($data)->save();

        return $model;
    }
}
