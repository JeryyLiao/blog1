<?php

namespace App\Http\Controllers\API;

use Throwable;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
  //用於生成 JSON 字串
  private function makeJson($status, $data, $msg)
  {
    //轉 JSON 時確保中文不會變成 Unicode
    return response()->json(['status' => $status, 'data' => $data, 'message' => $msg])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
  }


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $posts = Post::get();

    if (isset($posts) && count($posts) > 0) {
      $data = ['posts' => $posts];
      return $this->makeJson(1, $data, null);
    } else {
      return $this->makeJson(0, null, '找不到任何文章');
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

    //$input = ['title' => $request->title, 'content' => $request->content];
    //$post = Post::create($input);

    $imput=$request->only(['title','pic','status','content','sort']);

    if (isset($post)) {
     // $data = ['post' => $post];
     $data=['post_id'=>$post->id];
      return $this->makeJson(1, $data, '新增文章成功');
    } else {
      //$data = ['post' => $post];
      return $this->makeJson(0, null, '新增文章失敗');
    }


    //return $request->all();
    //返回到index頁面

    //
    //return redirect(url('posts/' . 1));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $post = Post::find($id);

    if (isset($post)) {
      $data = ['post' => $post];
      return $this->makeJson(1, $data, null);
    } else {
      return $this->makeJson(0, null, '找不到該文章');
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

        try {
            $post = Post::findOrFail($id);
            $post->title = $request->input('title');
            $post->content = $request->content;
            //因為沒有資料庫沒有設定PIC所以會更新失敗
            //$post->pic=$request->pic;
            //使用dd確認輸出的資料型態
            //dd($post);
            $post->save();

            //$input=$request->only(['title','pic','status','content','sort']);
            // $input=$request->only(['title','status','content']);
            // if($input['enabled']=='1')
            // { $input['enabled']=true;
            // }else{
            //   $input['enabled']=false;
            // }
            // $post->update($input);
        } catch (Throwable $e) {
            //更新失敗
            $data = ['post' => $post];
            return $this->makeJson(0,null,'更新文章失敗');
        }

        $data = ['post' => $post];
        return $this->makeJson(1,$data,'更新文章成功');
    }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
        try {
            $post = Post::findOrFail($id);
            $post->delete();
        } catch (Throwable $e) {
            //刪除失敗
            return $this->makeJson(0,null,'刪除文章失敗');
        }
        return $this->makeJson(1,null,'刪除文章成功');
    }


}