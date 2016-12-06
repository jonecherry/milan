<div class="container">
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 menu">
			<h3>米兰居家</h3>
			<ul>
				<li>电话 ：18606797079</li>
				<li>地址 ：浙江省 东阳市 通江路140号（锦豪大酒店斜对面）</li>
				<li>主要经营 ：窗帘、壁纸、软包</li>
			</ul>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 menu" >
			<h3>米兰居家的微信公众号</h3>
			<img  src='/img/qrcode_milan.jpg'>

		</div>

		<div class="col-xs-4 col-sm-4 col-md-4 menu">
			<h3>米兰居家的合作平台</h3>
			<ul>
				<li><a href="https://www.taobao.com" target="_blank">淘宝</a></li>
				<li><a href="https://weidian.com/" target="_blank">微店</a></li>
				{{--<li><a href="https://plus.google.com/u/0/{{ $main_company['google_plus'] }}" target="_blank">{{ trans('globals.google_label') }}</a></li>--}}
			</ul>
		</div>

		{{--<div class="col-xs-4 col-sm-4 col-md-4 newsletter" ng-controller = "NewslettersCtrl">--}}
			{{--@if (\Auth::user())--}}
				{{--<p>{{ trans('globals.reach_us_msg') }}</p>--}}
				{{--<p><strong><a href="/contact"><span class="glyphicon glyphicon-envelope"></span>&nbsp;{{ trans('globals.send_a_email_label') }}</a></strong></p>--}}
			{{--@else--}}
				{{--<div class="signup clearfix">--}}
					{{--<p>{{ trans('user.newsletter_sign_up') }}</p>--}}
					{{--<form>--}}
						{{--<input type="text" ng-model = "newsEmail"  class = "form-control input-sm" placeholder = "{{ trans('user.your_email_address_label') }}">--}}
						{{--<input type="button" ng-click = "save()" value = "{{ trans('user.sign_up_label') }}">--}}
					{{--</form>--}}
				{{--</div>--}}
			{{--@endif--}}
		{{--</div>--}}


	</div>

	{{--<div class="row credits">--}}
		{{--<div class="col-md-12">--}}
			{{--{{ trans('globals.power_by_label') }}&nbsp;<a href="http://antvel.com">{{ trans('globals.antvel_eCommerce') }}</a>--}}
		{{--</div>--}}
	{{--</div>--}}

</div>

@section('scripts')
    @parent
        <script>
            (function(app){
	                app.controller('NewslettersCtrl', function($scope, $window, notify)
					{
					  	$scope.newsEmail = '';
					  	$scope.save = function()
					  	{
					  		if ($scope.newsEmail.trim() != '') {
					  			$window.location.href = '/register?email='+$scope.newsEmail;
					  		} else {
					  			notify({ duration:5000, messageTemplate: '<strong>{{ trans('globals.validation_error_label') }}</strong><br><br><p>{{ trans('globals.newsletter_email_error') }}</p>', classes: 'alert alert-danger' });
					  		}
					  	};
					});
            })(angular.module("AntVel"));
        </script>
    @stop