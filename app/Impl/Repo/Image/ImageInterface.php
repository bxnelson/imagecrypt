<?php namespace App\Impl\Repo\Image;

interface ImageInterface {


    /**
     * Get paginated articles
     * 
     * @param int Current Page
     * @param int Numver of images per page
     * @return obejct Object with $items and $totalItems for pagination
     */
    public function byPage($page=1, $limit=10);

    /**
     * Get single image by URL
     * 
     * @param string URL slug of image
     * @return object Object of image information
     */
    public function bySlug($slug);

    /**
     * Create a new Image
     * 
     * @param array Data to create a new object
     * @return boolean
     */
    public function create(array $data);

    /**
     * Update an existing image
     * 
     * @param array Data to updaet Image
     * @return boolean
     */
    public function update(array $data);
    
}