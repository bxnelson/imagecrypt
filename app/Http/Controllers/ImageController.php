<?php

use Impl\Service\Validation\ImageLaravelValidator;

class ImageController extends BaseController
{
    //Class Dependency: Concrete Class ImageLaravelValidator
    //Note that Laravel resolves this for us
    //We will not need a Service Provider
    public function __construct(ImageLaravelValidator $validator)
    {
        $this->validator = $validator;
    }

    //Get /image/create
    public function create()
    {
        return View::make('admin.image_create', array(
            'input' => Input::old()
        ));
    }
    //POST /image
    public function store()
    {
        if( $this->validator->with( Input::all() )->passes() )
        {
                //TODO FORM PROCESSING

        } else {
            return View::make('admin.image_create')
            ->withInput( Input::all() )
            ->withErrors($validator->errors());
        }
    }
}