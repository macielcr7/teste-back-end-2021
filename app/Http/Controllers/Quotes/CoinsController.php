<?php

namespace App\Http\Controllers\Quotes;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Models\Coins;


class CoinsController extends Controller
{
    protected $model;

    public function __construct(Coins $model)
    {
        $this->middleware('auth');
        $this->model = $model;
    }

    public function index(Request $request){
        if (request()->wantsJson()) {
            if($request->id_coin){
                $data   = $this->model->find($request->id_coin)->conversions;
                $total  = $data->count();
            }
            else{
                $data = $this->model
                        ->where(function($q)use($request){
                            $q->like('description', $request->q)
                                ->orLike('code', $request->q);
                        })
                        ->orderBy('description', 'asc')
                        ->paginate(30);

                $total  = $data->total();
                $data   = $data->items();
                
            }
            

            return response()->json([
                'dados'         => $data,
                'total_count'   => $total,
            ]);
        };
    }
}
