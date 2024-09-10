<?php


namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Module\LMS\Models\CourseModel;

class SearchController extends Controller
{
    protected $cacheKeys = ['recent1', 'recent2', 'recent3', 'recent4'];

    public function search(Request $request)
    {
        $data['courses'] = CourseModel::active()
            ->where('title', 'LIKE', '%' . $request->search . '%')
            ->paginate(12);

        if ($request->search) {
            $newSearch = $request->search;
            $searches = [];
            foreach ($this->cacheKeys as $key) {
                $searches[] = Cache::get($key);
            }
            if (!in_array($newSearch, $searches)) {
                array_unshift($searches, $newSearch);
                $searches = array_slice($searches, 0, 4);
                foreach ($this->cacheKeys as $index => $key) {
                    Cache::put($key, $searches[$index]);
                }
            }
        }
        return view('frontend-1.pages.course.index-frontend', $data);
    }

    public function liveSearchAutofill(Request $request){
        $text = $request->input('Text');
        if ($text){
            $autofillSearchResult = CourseModel::where('title', 'like', '%'.$text.'%')->select('title')->get();
        }
        else{
            $autofillSearchResult = '';
        }
        return $autofillSearchResult;
    }

}
