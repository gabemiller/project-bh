<?php

namespace Site;

use Divide\CMS\Document;
use Divide\CMS\DocumentCategory;
use View;

class DocumentController extends \BaseController
{

    protected $layout = '_frontend.master';

    /**
     * Display a listing of the resource.
     * GET /site\document
     *
     * @return Response
     */
    public function index($category = null)
    {
        View::share('title', 'Dokumentumok');

        if (isset($category)) {

            $cat = DocumentCategory::where('slug','=',$category)->first();

            $doc = Document::whereHas('categories', function ($q) use($cat) {
                $q->where('documentcategory_id', '=', $cat->id);

            })->paginate(10);


        } else {
            $doc = Document::paginate(10);
        }

        $this->layout->content = View::make('site.document.index')
            ->with('documents', $doc)
            ->with('categories', DocumentCategory::all(['id','name','slug']));;
    }

    /**
     *
     */
    public function form()
    {
        View::share('title', 'Dokumentumok');

        $cat = DocumentCategory::where('slug','=','nyomtatvanyok')->first();

        $doc = Document::whereHas('categories', function ($q) use($cat) {
            $q->where('documentcategory_id', '=', $cat->id);
        })->paginate(10);

        $this->layout->content = View::make('site.document.form')
            ->with('documents', $doc)
            ->with('categories', DocumentCategory::all(['id','name','slug']));
    }

    /**
     *
     */
    public function download($form)
    {
        View::share('title', 'Dokumentumok');

        $doc = Document::where('name','=',urldecode($form))->first();

        if($doc){
            return \Response::download(public_path().$doc->path);
        }

        if(file_exists(public_path().'/documents/'.$form)){
            return \Response::download(public_path().'/documents/'.$form);
        }

        \App::abort(404);
    }

}
