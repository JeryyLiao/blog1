<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cgy;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:api')->except('login');
    // }

    // public function login()
    // {
    //     $credentials = request(['email', 'password']);

    //     try {
    //         if (!$token = auth()->guard('api')->attempt($credentials)) {
    //             return response()->json(['status' => 0, 'message' => '無效的驗證資料'], 401);
    //         }
    //     } catch (JWTException $e) {
    //         return response()->json([
    //             'error' => '無法建立 Token',
    //         ], 500);
    //     }

    //     return response()->json(['status' => 1, 'token' => $token]);
    // }

    // public function me()
    // {
    //     return response()->json(auth()->user());
    // }

    // public function logout()
    // {
    //     Auth::logout();
    //     return response()->json(['status' => 1]);
    // }

    //用於生成JSON字串
    private function makeJson($status, $data, $msg)
    {
        //轉JSON時確保中文不會變成Unicorde
        return response()
            ->json(['status' => $status, 'data' => $data, 'message' => $msg])
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);

    }

    public function index()
    {
        // $items = Item::orderby('enabled_at', 'asc')->get();
        // return $items;
        $items = Item::get();

        if (isset($items)) {
            $data = ['items' => $items];
            return $this->makeJson(1, $data, '');
        } else {
            return $this->makeJson(0, null, '顯示資料失敗');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        try {
            $cgy = Cgy::find($request->cgy_id);
            //return $cgy->count();
            if (!isset($cgy) || $cgy->count() <= 0) {
                return $this->makeJson(0, null, 'cgy_id不存在,請確定');
            }
            //以下方法要加白名單
            $input = $request->only(['title', 'pic', 'price', 'enabled', 'desc', 'enabled_at', 'cgy_id']);
            $item = Item::create($input);

            if (isset($item)) {
                $data = ['item' => $item];
                return $this->makeJson(1, $data, '新增商品成功');
            } else {
                return $this->makeJson(0, null, '新增商品失敗');
            }

//code...
        } catch (\Throwable$th) {
            return $this->makeJson(0, null, '新增商品失敗');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return "$item";
        $item = Item::find($id);
        if (isset($item)) {
            $data = ['item' => $item];return $this->makeJson(1, $data, '');
        } else {
            return $this->makeJson(0, null, '顯示商品失敗');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $num = $item->update($request->only(['title', 'pic', 'price', 'enabled', 'desc', 'enabled_at']));
        // return $num;
        try {
            $cgy = Cgy::find($request->cgy_id);
            //return $cgy->count();
            if (!isset($cgy) || $cgy->count() <= 0) {
                return $this->makeJson(0, null, 'cgy_id不存在,請確定');
            }
            $item = Item::find($id);
            $item->title = $request->title;
            $item->pic = $request->pic;
            $item->price = $request->price;
            $item->enabled = $request->enabled;
            $item->desc = $request->desc;
            $item->enabled_at = $request->enabled_at;
            $item->cgy_id = $request->cgy_id;
            $item->save();

            if (isset($item)) {
                $data = ['item' => $item];
                return $this->makeJson(1, $data, '異動商品成功');
            } else {
                return $this->makeJson(0, null, '異動商品失敗');
            }

//code...
        } catch (\Throwable$th) {
            return $this->makeJson(0, null, '異動商品失敗');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $num = $item->delete();
        // return $num;
        try {
            $cgyDelete = false;
            $item = Item::find($id);
            $data = Item::where('cgy_id', $item->cgy_id)
                ->where('id', '<>', $id)
                ->first();
            $cgy_id = $item->cgy_id;
            if (!isset($data) || $data->count() <= 0) {
                //return '沒有其它明細,必須刪除cgy';
                $cgyDelete = true;
            }
            //return '有其它明細，可以刪除';
            $item = Item::find($id);
            $item->delete();

            //沒有其它明細,必須刪除cgy;
            if ($cgyDelete) {
                $cgy = Cgy::find($cgy_id);
                $cgy->delete();
            }
            if (isset($item)) {
                $data = ['item' => $item];
                return $this->makeJson(1, $data, '刪除商品成功');
            } else {
                return $this->makeJson(0, null, '刪除商品失敗');
            }

//code...
        } catch (\Throwable$th) {
            return $this->makeJson(0, null, '刪除商品失敗');
        }

    }
}