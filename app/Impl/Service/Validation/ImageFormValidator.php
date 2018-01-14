<?php namespace App\Impl\Service\Validation;

class ImageFormValidator extends AbstractLaravelValidator
{
    /**
     * Validation rules
     * 
     * @var Array
     */
    protected $rules = array(
        'title' => 'required',
        'name' => 'required',
        'user_id' => 'required|exists:users,id'
    );

    /**
     * Validation messages
     * 
     * @var Array
     */
    protected $messages = array(
        'user_id.exists' =>'That user does not exist'
    );

}
