<h1>表單建立頁面</h1>

{{-- 開啟表單 --}}
 {{-- {!! Form::open(['action'=>'App\Http\Controllers\Postcontroller@store','method'=>'POST','files'=>true]) !!} --}}
 {!! Form::open(['url'=>'posts','method'=>'POST','files'=>true]) !!}

{{-- 輸入項標籤 --}}
 {!! Form::label('title','標題') !!}

{{-- 單行文字輸入項 --}}
 {!! Form::text('title','預設內容',['class'=>'myclass','style'=>'color:red','xx'=>'yy']) !!}<br>
{{-- error 標籤 --}}
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

{{-- 多行文字輸入項 --}}
 {!! Form::label('contant','內文')!!}
 {!! Form::textarea('contant',null,['cols'=>60,'rows'=>20])!!}<br>
{{-- error 標籤 --}}
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

{{-- 隱藏輸入項 --}}
 {!! Form::hidden('mode', '1') !!}
{!! Form::label('status', '是否開啟') !!}

{{-- radio輸入項 --}}
 開啟{!! Form::radio('status',1,true)!!}
 關閉{!! Form::radio('status',0,false)!!}<br>

你的興趣?
{!! Form::label('interests[]','打球')!!}
{!! Form::checkbox('interests[]','playball',false)!!}
{!! Form::label('interests[]','看電影')!!}
{!! Form::checkbox('interests[]','movie',false)!!}
{!! Form::label('interests[]','電玩')!!}
{!! Form::checkbox('interests[]','game',false)!!}
{!! Form::label('interests[]','聽音樂')!!}
{!! Form::checkbox('interests[]','music',false)!!}<br><br>


{!! Form::submit('送出',[]) !!}
{!! Form::reset('重置',[]) !!}


 {!! Form::close() !!}

