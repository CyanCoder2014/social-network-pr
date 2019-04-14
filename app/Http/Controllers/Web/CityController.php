<?php

namespace App\Http\Controllers\Web;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getcities($id){
        return json_encode(City::select('id','name')->where('province_id',$id)->get()->toarray());

    }
    public function find(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }

        $tags = City::search($term)->limit(5)->get();

        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->name];
        }

        return \Response::json($formatted_tags);
    }
}
