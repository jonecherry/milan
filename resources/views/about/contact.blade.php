@extends('layouts.master')

@section('page_class')@parent- {{ trans('about.contact_us') }}@endsection

{{-- NAVBAR --}}
@section('navigation')
  @include('partial.navigation')
@endsection

{{-- CONTENT --}}
@section('content')
<div class="container-fluid">
  <div class="row col-md-12">
    <div class="panel panel-default">

      <div class="panel-heading clearfix">
        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><span class="glyphicon glyphicon-envelope"></span> 联系我们</h4>
      </div>

      <div class="product-img-box" >

        <img  src='/img/qrcode_milan.jpg'>

      </div>
      <div class="panel-body">
        <h4>米兰居家生活馆</h4>
        <h5>电话 ：18606797079</h5>
        <h5>地址 ：浙江省 东阳市 通江路140号（锦豪大酒店斜对面）</h5>
        <h5>主要经营 ：窗帘、壁纸、软包</h5>
      </div>
    </div>
  </div>
</div>
@endsection
{{-- Pie de pagina --}}
@section('footer')
@parent
@endsection
{{-- Angular --}}
@section('before.angular') @endsection
{{-- Javascript --}}
@section('scripts')
@parent
@endsection