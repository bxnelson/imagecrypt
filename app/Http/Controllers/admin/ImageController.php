<?php

use Impl\Repo\Status\StatusInterface;
use Impl\Repo\image\ImageInterface;
use Impl\Service\Form\image\imageForm;

class ImageController extends BaseController {

    protected $layout = 'layout';

    protected $image;
    protected $imageform;
    protected $status;

    public function __construct(ImageInterface $image, ImageForm $imageform, StatusInterface $status)
    {
        $this->image     = $image;
        $this->imageform = $imageform;
        $this->status    = $status;
    }

    /**
     * List images
     * GET /admin/image
     */
    public function index()
    {
        $page = Input::get('page', 1);

        // Candidate for config item
        $perPage = 3;

        $pagiData = $this->image->byPage($page, $perPage, true);

        $images = Paginator::make($pagiData->items, $pagiData->totalItems, $perPage);

        $this->layout->content = View::make('admin.image_list')->with('images', $images);
    }

    /**
     * Show single image. We only want to show edit form
     * @param  int $id image ID
     * @return Redirect
     */
    public function show($id)
    {
        return Redirect::to('/admin/image/'.$id.'/edit');
    }

    /**
     * Create image form
     * GET /admin/image/create
     */
    public function create()
    {
        $statuses = $this->status->all();

        $this->layout->content = View::make('admin.image_create', array(
            'statuses' => $statuses,
            'input' => Session::getOldInput(),
        ));
    }

    /**
     * Create image form processing
     * POST /admin/image
     */
    public function store()
    {
        $input = array_merge(Input::all(), array('user_id' => 1));

        if( $this->imageform->save( $input ) )
        {
            // Success!
            return Redirect::to('/admin/image')
                    ->with('status', 'success');
        } else {

            return Redirect::to('/admin/image/create')
                    ->withInput()
                    ->withErrors( $this->imageform->errors() )
                    ->with('status', 'error');
        }
    }

    /**
     * Create image form
     * GET /admin/image/{id}/edit
     */
    public function edit($id)
    {
        $image = $this->image->byId($id);
        $statuses = $this->status->all();


        $this->layout->content = View::make('admin.image_edit', array(
            'image' => $image,
            'statuses' => $statuses,
            'input' => Session::getOldInput()
        ));
    }

    /**
     * Create image form
     * PUT /admin/image/{id}
     */
    public function update()
    {
        $input = array_merge(Input::all(), array('user_id' => 1));

        if( $this->imageform->update( $input ) )
        {
            // Success!
            return Redirect::to('admin/image')
                    ->with('status', 'success');
        } else {

            // Need image ID
            return Redirect::to('admin/image/'.Input::get('id').'/edit')
                    ->withInput()
                    ->withErrors( $this->imageform->errors() )
                    ->with('status', 'error');
        }
    }

}