<?php namespace App\Impl\Service\Form\Image;

use App\Impl\Service\Validation\ValidableInterface;
use App\Impl\Repo\Image\ImageInterface;

class ImageForm
{
    /**
     * Form Data
     * 
     * @var array
     */
    protected $data;

    /**
     * Validator
     * 
     * @var \Impl\Service\Form\Contracts\ValidableInterface
     */
    protected $validator;

    /**
     * Image repository
     * 
     * @var \Impl\Repo\Image\ImageInterface
     */
    protected $image;

    public function __construct(
        ValidableInterface $validator,
        ImageInterface $image
        )
        {
            $this->validator = $validator;
            $this->image     = $image;
        }
    
        /**
         * Create a new image
         * 
         * @return boolean
         */
        public function save(array $input)
        {
            //TODO put code here
        }

        /**
         * update an existing image
         * 
         * @return boolean
         */
        public function update(array $input)
        {
            //TODO put code here
        }

        /**
         * Return any validation errors
         * 
         * @return array
         */
        public function errors()
        {
            return $this->validator->errors();
        }

        /**
         * Test if form validator passes
         * 
         * @return boolean
         */
        protected function valid(array $input)
        {
            return $this->validator->with($input)->passes();
        }


}

