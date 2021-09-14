<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Faker\Provider\Image;
use Illuminate\Http\Request;

class BackendBaseController extends Controller
{
    function __construct()
{
    $this->image_path = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $this->folder_name . DIRECTORY_SEPARATOR;
}

    protected function __loadDataToView($viewPath)
    {
        view()->composer($viewPath,function ($view)
        {
            $view->with('panel',$this->panel);
            $view->with('folder',$this->folder);
            $view->with('base_route',$this->base_route);
            $view->with('title',$this->title);

        });
return $viewPath;
    }

    protected function uploadImage(Request $request,$image_field_name)
    {
        $image  =$request->file($image_field_name);
        $image_name =rand(6785,9814).'_'.$image->getClientOriginalName();
        $image->move($this->image_path,$image_name);
       // foreach (config('image_dimension.image_dimensions.'.$this->folder_name. '.image')as $dimension)
       // {
            $img=\Intervention\Image\Facades\Image::make($this->image_path.$image_name)->resize(500,600);
           $img->save($this->image_path.'1200_600_'.$image_name);
       // }
        return $image_name;

    }
}
