<?php

namespace App\Http\Controllers;

use App\Contents\File;
use App\Contents\FileCat;
use App\Contents\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __construct()
    {
            $this->middleware('ProfileComplete');

    }


    public function index($catId)
    {

        $files = File::where('cat_id', $catId)->paginate(30);
        $fileCats = FileCat::paginate(30);
        $filesId = $catId;

        return view('files.list', compact('files', 'fileCats', 'filesId'));
    }


    public function search(Request $request)
    {
        $files = File::where('title', 'LIKE', '%' . $request->input . '%')->orwhere('description', 'LIKE', '%' . $request->input . '%')->orderby('id', 'desc')->paginate(25);
        $tags = Tag::where('title', 'LIKE', '%' . $request->input . '%')->paginate(25);

//        $files2 = File::whereIn('id', $tags->file->id )->orderby('id', 'desc')->paginate(25);

//        $files = $tags->files;
//        $keyword = $request->input;
//        $files = DB::table('files')
//            ->join('files_tag', 'files_tag.files_id', '=', 'files.id')
//            ->join('tags', 'tags.id', '=', 'files_tag.tags_id')
//            ->where(function($query)  use ($keyword)
//            {
//                $query->where('files.title', 'LIKE', '%' . $keyword . '%');
//                $query->where('tags.title',  'LIKE', '%' . $keyword . '%');
//            })
//            ->orWhere(function($query) use ($keyword)
//            {
//                $query->where('files.title' ,'LIKE', '%' . $keyword . '%');
//                $query->where('tags.title',  'LIKE', '%' . $keyword . '%');
//            })
//            ->select('files.*')
//            ->get();
//        $files->all();


        $fileCats = FileCat::paginate(30);
        $filesId = '0';


        return view('files.listS', compact('tags','files', 'fileCats', 'filesId'));
    }


    public function cats()
    {

        $fileCats = FileCat::paginate(30);

        return view('files.category2', compact('fileCats'));
    }


    public function upload(Request $request)
    {
        $id = Auth::id();

        if (File::having('size', $_FILES['file']['size'])->first() !== null && File::having('name', $_FILES['file']['name'])->first() !== null) {

            $path = File::where('name', $_FILES['file']['name'])->where('size', $_FILES['file']['size'])->first()->link;

            $file = new File();

            $result = $file->create([
                'users_id' => $id,
                'cat_id' => $request->cat_id,
                'title' => $request->title,
                'type' => $_FILES['file']['type'],
                'name' => $_FILES['file']['name'],
                'size' => $_FILES['file']['size'],
                'link' => $path,
                'description' => $request->description,
            ]);

        } else {

            $path = $request->file('file')->store('general');

            $file = new File();

            $result = $file->create([
                'users_id' => $id,
                'cat_id' => $request->cat_id,
                'title' => $request->title,
                'type' => $_FILES['file']['type'],
                'name' => $_FILES['file']['name'],
                'size' => $_FILES['file']['size'],
                'link' => $path,
                'description' => $request->description,
            ]);
        }


        $tagDetail = explode(',', $request->tags);

        foreach ($tagDetail as $tag) {

            $tag_ = Tag::where('title', $tag)->first();
            if ($tag_ != null){

                $file_ = File::find($result->id);
                $file_->tag()->save($tag_);

            }else{

                $tag_n = Tag::create([
                    'users_id' => $id,
                    'title' => $tag,
                    'intro' => 'null',
                    'view' => '1',
                ]);

                $file_ = File::find($result->id);
                $file_->tag()->save($tag_n);
            }
        }

        return back()->with('message', 'فایل با موفقیت آپلود شد');
    }


    public function delete($id)
    {
        $file = File::find($id);
        Storage::delete($file->link);
        $delete = $file->delete();

        return back()->with('message', 'فایل با موفقیت حذف شد');
    }


}
