<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cgy;
use Illuminate\Http\Request;

class CgyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        // $cgies = Cgy::orderby('sort', 'asc')->get();
        // return $cgies;
        $cgys = Cgy::get();

        if (isset($cgys)) {
            $data = ['cgys' => $cgys];
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
        $cgy = new Cgy();
        $cgy->title = $request->title;
        $cgy->pic = $request->pic;
        $cgy->sort = $request->sort;
        $cgy->save();
        if (isset($cgy)) {
            $data = ['cgy' => $cgy];
            return $this->makeJson(1, $data, '新增資料成功');
        } else {
            return $this->makeJson(0, null, '新增資料失敗');
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
        // return $cgy;
        $cgy = Cgy::with('items')->find($id);
//return $cgy->items;
        if (isset($cgy)) {
            $data = ['cgy' => $cgy];
            return $this->makeJson(1, $data, '');
        } else {
            return $this->makeJson(0, null, '顯示資料失敗');
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
        // $num = $cgy->update($request->only(['title', 'pic', 'sort',
        //     'cgy_id']));
        // return $num;
        try {
            $cgy = Cgy::find($id);
            $cgy->title = $request->title;
            $cgy->pic = $request->pic;
            $cgy->sort = $request->sort;
            $cgy->save();

            if (isset($cgy)) {
                $data = ['cgy' => $cgy];
                return $this->makeJson(1, $data, '異動資料成功');
            } else {
                return $this->makeJson(0, null, '異動資料失敗');
            }

//code...
        } catch (\Throwable$th) {
            return $this->makeJson(0, null, '更新資料失敗');
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
        // $cgy = Cgy::find($id);
        // $cgy->deleted();
        // //Item有外來鍵於Cgy無法直接刪除
        // $num = $cgy->delete();
        // return $num;
        try {
            $cgy = Cgy::find($id);
            $num = $cgy->items->count();

            if ($num > 0) {
                return $this->makeJson(0, null, "item有屬於cgy_id = $id 的資料,不可刪除");
            } else {
                $cgy->delete();
            }

            if (isset($cgy)) {
                $data = ['cgy' => $cgy];
                return $this->makeJson(1, $data, '刪除資料成功');
            } else {
                return $this->makeJson(0, null, '刪除資料失敗');
            }

//code...
        } catch (\Throwable$th) {
            return $this->makeJson(0, null, '刪除資料失敗');
        }
    }

}