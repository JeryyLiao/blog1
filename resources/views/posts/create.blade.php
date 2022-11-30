<h1>表單建立頁面</h1>

{{-- 開啟表單 --}}
{{-- {!! Form::open(['action'=>'App\Http\Controllers\Postcontroller@store','method'=>'POST','files'=>true]) !!} --}}
{{-- {!! Form::open(['url' => 'posts', 'method' => 'POST', 'files' => true]) !!} --}}
{!! Form::open(['url' => 'posts', 'method' => 'POST','files' => true]) !!}


{{-- 輸入項標籤 --}}
{!! Form::label('title', '標題') !!}

{{-- 單行文字輸入項 --}}
{!! Form::text('title', '預設內容', ['class' => 'myclass', 'style' => 'color:red', 'xx' => 'yy']) !!}<br>
{{-- error 標籤 --}}
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

{{-- 多行文字輸入項 --}}
{!! Form::label('contact', '內文') !!}
{!! Form::textarea('contact', null, ['cols' => 60, 'rows' => 20]) !!}<br>
{{-- error 標籤 --}}
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

{{-- 隱藏輸入項 --}}
{!! Form::hidden('mode', '1') !!}
{!! Form::label('status', '是否開啟') !!}

{{-- radio輸入項 --}}
開啟{!! Form::radio('status', 1, true) !!}
關閉{!! Form::radio('status', 0, false) !!}<br>

你的興趣?
{!! Form::label('interests[]', '打球') !!}
{!! Form::checkbox('interests[]', 'playball', false) !!}
{!! Form::label('interests[]', '看電影') !!}
{!! Form::checkbox('interests[]', 'movie', false) !!}
{!! Form::label('interests[]', '電玩') !!}
{!! Form::checkbox('interests[]', 'game', false) !!}
{!! Form::label('interests[]', '聽音樂') !!}
{!! Form::checkbox('interests[]', 'music', false) !!}<br><br>

{!! Form::label('mode', '商品模式', []) !!}
{!! Form::select('mode', ['recommend' => '編輯精選', 'season' => '當季商品', 'cp' => '超值商品'], null, [
    'placeholder' => '請選擇商品模式',
]) !!}


{!! Form::label('month', '月份', []) !!}月份下拉
{!! Form::selectMonth('month', null, []) !!}<br><br>


{!! Form::label('number', '數字', []) !!}
區間數字下拉
{!! Form::selectRange('number', 1, 10, 5, []) !!}<br><br>

{{-- //密碼輸入項 --}}
{!! Form::label('password', '密碼數字輸入', []) !!}
{!! Form::password('password') !!}<br><br>

{{-- //Email輸入項 --}}
{!! Form::label('email', '電子郵箱', []) !!}
{!! Form::email('email', null) !!}<br><br>

{{-- //日期輸入項 --}}
{!! Form::label('sell_at', '何時上架', []) !!}
{!! Form::date('sell_at', null) !!}<br><br>


{!! Form::label('age', '年紀', []) !!}
{!! Form::number('age', 18, ['min' => 18, 'max' => 80]) !!}<br><br>


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
