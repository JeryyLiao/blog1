<h1>表單建立頁面</h1>

{{-- 開啟表單 --}}
{{-- {!! Form::open(['action'=>'App\Http\Controllers\ArticleController@store','method'=>'POST','files'=>true]) !!} --}}
{{-- {!! Form::open(['url' => 'posts', 'method' => 'POST', 'files' => true]) !!} --}}
{!! Form::open(['url' => 'articles', 'method' => 'POST','files' => true]) !!}


{{-- 輸入項標籤 --}}
{!! Form::label('subject', '標題') !!}<br>
{{-- 單行文字輸入項 --}}
{!! Form::text('subject', '預設內容', ['class' => 'myclass', 'style' => 'color:red', 'xx' => 'yy']) !!}<br>


{{-- category --}}
{!! Form::label('category', '類別模式', []) !!}
{!! Form::select('category', $categorys,$category, [
'category' => '請選擇類別模式',
]) !!}<br>


{{-- 多行文字輸入項 --}}
{!! Form::label('desc', '內文') !!}
{!! Form::textarea('desc', null, ['cols' => 70, 'rows' => 10]) !!}<br>
{{-- error 標籤 --}}<br>
@error('title')
<div class="alert alert-danger">{{ $message }}</div>
@enderror<br>

{{-- 輸入項標籤 --}}
{!! Form::label('sort', '排序') !!}<br>
{{-- 單行文字輸入項 --}}
{!! Form::text('sort', 0, ['class' => 'myclass', 'style' => 'color:black', 'xx' => 'yy']) !!}<br>

{{-- radio輸入項 --}}
開啟{!! Form::radio('status', 1, true) !!}
關閉{!! Form::radio('status', 0, false) !!}<br>


{{-- //日期輸入項 --}}
{!! Form::label('enable_at', '何時開啟', []) !!}
{!! Form::date('enable_at', null) !!}<br>


你的學習是?
{!! Form::label('tags[]', '看新聞') !!}
{!! Form::checkbox('tags[]', 'news', false) !!}
{!! Form::label('tags[]', '學技術') !!}
{!! Form::checkbox('tags[]', 'skill', false) !!}
{!! Form::label('tags[]', '嗜好') !!}
{!! Form::checkbox('tags[]', 'like', false) !!}<br><br>


{{-- error 標籤 --}}
@error('title')
<div class="alert alert-danger">{{ $message }}</div>
@enderror


{!! Form::label('pic', '圖片上傳', []) !!}
{!! Form::file('pic') !!}<br><br>


{!! Form::submit('送出', []) !!}
{!! Form::reset('重置', []) !!}


{!! Form::close() !!}


@if ($errors->any())
@foreach ($errors->all() as $error)
<div style="color:red">{{ $error }}</div>
@endforeach
@endif
