<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Add;
use Carbon\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lang=Add::all();
        $all=Article::all();
        return view('home',compact('lang','all'));
    }
    public function articleLanguage(Request $request){
        $id=$request->id;
        #lang
        $lang=Article::where('lang_id',$id)->get();
        if (isset($lang)) {
            foreach($lang as $row)
            {
                $html =
                    '<table><tr>
                 <td>' . $row->title . '</td>' .
                    '<td>' . $row->content . '</td>' .
                    '<td>' . $row->description . '</td>' .
                    '<td><img src="' . $row->image . '" width="75" height="75"></td>'.
                    '</tr></table>';
            }
            return Response::json([
                'msg' => $html
            ]);
            // return redirect()->back()->with('msg',"Doğru");
        } else {

            $emailc = 0;
            return Response::json([
                'msg' => "Dil Seçimi yok"
            ]);

        }

    }
}
