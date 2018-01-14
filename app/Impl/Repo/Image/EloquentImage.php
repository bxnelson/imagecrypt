<?php namespace App\Impl\Repo\Image;

//use Impl\Repo
use Illuminate\Database\Eloquent\Model;

class EloquentImage implements ImageInterface {

    protected $image;
    protected $cache;

    //Class dependency: Eloquent model
    public function __construct(Model $image)
    {
        $this->image = $image;
    }

    /**
     * Get paginated images
     * 
     * @param int Current Page
     * @param int Number of images per page
     * @return StdClass Object with $items and $totalItems for pagination
     */
    public function byPage($page=1, $limit=10)
    {
        $result = new \StdClass;
        $result->page = $page;
        $result->limit =$limit;
        $result->totalItems =0;
        $result->items = array();

        $images = $this->image->where('user_id', '1')//TODO fix me
                    ->orderBy('created_at', 'desc')
                    ->skip( $limit * ($page-1))
                    ->take($limit)
                    ->get();

        $result->items = $images->all();
        $result
    }



}