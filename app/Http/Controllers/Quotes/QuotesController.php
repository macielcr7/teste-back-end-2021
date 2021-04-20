<?php

namespace App\Http\Controllers\Quotes;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuotesCreateRequest;
use \App\Models\UserQuotes;

use \App\Services\CoinService;


class QuotesController extends Controller
{
    protected $model;
    protected $service;

    public function __construct(UserQuotes $model, CoinService $service)
    {
        $this->middleware('auth');
        $this->model = $model;
        $this->service = $service;
    }

    public function index(Request $request){
        if (request()->wantsJson()) {
            $perPage = $request->length;
            if(isset($request->start)){
                $total = $request->start/$perPage;
                $page = ($total+1) > 0 ? $total + 1 : 1;
            }
            else{
                $page = 1;
            }
            
            $request->merge([
                'page' => $page,
                'search' => $request->search['value'],
                'orderBy' => $request->columns[ $request->order[0]['column'] ]['data'],
                'sortedBy' => $request->order[0]['dir']
            ]);

            $query = $this->model->identic('id_user', \Auth::user()->id)
                        ->join('coins as c1', 'c1.id', '=', 'user_quotes.id_coin')
                        ->join('coins as c2', 'c2.id', '=', 'user_quotes.id_coin_conversion')
                        ->identic('id_coin', $request->id_coin)
                        ->identic('id_coin_conversion', $request->id_coin_conversion)
                        ->identic('type', $request->type)
                        ->select(\DB::raw('
                            user_quotes.*,
                            c1.code as c1_code,
                            c2.code as c2_code
                        '));

            if(!empty($request->search)){
                $query = $query->where(function($q) use ($request){
                    $q->orLike('c1_code', $request->search)
                        ->orLike('c2_code', $request->search);
                });
            }
            if(!empty($request->data1)){
                $query = $query->where('user_quotes.updated_at', '>=', \Carbon\Carbon::createFromFormat('d/m/Y', $request->data1)->format('Y-m-d').' 00:00:00');
            }
            if(!empty($request->data2)){
                $query = $query->where('user_quotes.updated_at', '<=', \Carbon\Carbon::createFromFormat('d/m/Y', $request->data2)->format('Y-m-d').' 23:59:59');
            }
            $data = $query->orderBy($request->orderBy, $request->sortedBy)->paginate($perPage);
            
            return response()->json([
                'data'=> $data->items(),
                'draw'=> $request->draw,
                'recordsTotal'=> $data->total(),
                'recordsFiltered'=> $data->total(),
            ]);
            
        }

        return view('quotes.quotes.index');
    }

    public function create(Request $request){
        if(isset($request->duplicate)){
            $data = $this->model->find($request->duplicate);
        }
        else{
            $data = new $this->model();         
        }
        return view('quotes.quotes.create', compact('data'));
    }

    public function store(QuotesCreateRequest $request){
        try {
            $resp = $this->service->getQuote($request);
            if($resp){
                $request->merge([
                    'id_user'           => \Auth::user()->id,
                    'coin_conversion'   => $resp['coin_conversion'],
                    'type_value'        => $resp['type_value'],
                ]);
                $data = $this->model->create($request->all());
                $redirect = redirect()->route('quotes.edit', $data->id);
                return $redirect->with('messageSuccess', 'Registro Criado!');
            }
            else{
                throw new \Exception("A cota não foi realizada", 500);
                
            }
        } catch (\Exception $e) {
            $this->sendErrorException($e);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function edit($id){
        $data = $this->model->find($id);
        return view('quotes.quotes.edit', compact('data'));
    }

    public function update(QuotesUpdateRequest $request, $id){
        try {
            $resp = $this->service->getQuote($request);
            if($resp){
                $request->merge([
                    'coin_conversion'   => $resp['coin_conversion'],
                    'type_value'        => $resp['type_value'],
                ]);
                $data = $this->model->update($request->all(), $id);
                $redirect = redirect()->route('quotes.edit', $data->id);
                return $redirect->with('messageSuccess', 'Registro Atualizado!');
            }
            else{
                throw new \Exception("A cota não foi realizada", 500);
                
            }
        } catch (\Exception $e) {
            $this->sendErrorException($e);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
}
