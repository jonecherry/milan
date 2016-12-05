@extends('layouts.master')

@section('title')@parent - {{ trans('globals.home') }} @stop

@include('partial.message')

@section('content')

    <section class="products_view">

        <div class="container">

            @parent

            @section('center_content')

                {{-- viewed suggestions --}}
                <div class="clearfix home-products-wrapper">

                    <div class="col-lg-12">
                        @if (Auth::check())
                            <h4 class="home-title-section">{{ trans('store.suggestions.viewed') }}</h4>
                        @else
                            <h4 class="home-title-section">{{ trans('store.suggestions.viewed_unlogged') }}</h4>
                        @endif
                    </div>

                    <div class="container-fluid marketing">
                        <div class="row">
                            @foreach ($suggestion['viewed'] as $product)
                                @include('products.partial.productBox', $product)
                            @endforeach
                        </div>
                    </div>

                </div>

                {{-- categories suggestions --}}
                <div class="clearfix home-products-wrapper">

                    <div class="col-lg-12">
                        <h4 class="home-title-section">{{ trans('store.suggestions.categories') }}</h4>
                    </div>

                    <div class="container-fluid marketing">
                        <div class="row">
                            @foreach ($suggestion['categories'] as $product)
                                @include('products.partial.productBox', $product)
                            @endforeach
                        </div>
                    </div>

                </div>

                {{-- trending suggestions --}}
                <div class="clearfix home-products-wrapper">

                    <div class="col-lg-12">
                        @if (Auth::check())
                            <h4 class="home-title-section">{{ trans('store.suggestions.trends') }}</h4>
                        @else
                            <h4 class="home-title-section">{{ trans('store.suggestions.trends_unlogged') }}</h4>
                        @endif
                    </div>

                    <div class="container-fluid marketing">
                        <div class="row">
                            @foreach ($suggestion['purchased'] as $product)
                                @include('products.partial.productBox', $product)
                            @endforeach
                        </div>
                    </div>

                </div>

            @stop {{-- end center_content --}}


            {{-- -------------------------------------------------- --}}
            {{-- -------------------- Left Bar -------------------- --}}
            {{-- -------------------------------------------------- --}}

            @section('panel_left_content')

                <div class="home-left-bar">

                    {{-- rated products tag --}}
                    @if (count($tagsCloud)>0 || true)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                {{ trans('globals.popular_tags') }}
                            </div>
                            <div class="panel-body">
                                <div class="tags-cloud">
                                    @foreach ($tagsCloud as $tag)
                                        <a href="{{ action('ProductsController@index') }}/?search={{ $tag }}" class="t{{ mt_rand(1,10) }}" >
                                            {{ $tag }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- upcoming events --}}

                    @if (config('app.offering_free_products'))

                        @foreach ($events as $event)

                            @if (count($event['products'])>0)

                                <div class="panel panel-default">

                                    <div class="free-products-home-sign">
                                        <span>{{ trans('globals.free') }}</span>
                                    </div>

                                    <div class="panel-heading">

                                       {{ trans('globals.due_date') }}&nbsp;{{ Carbon\Carbon::parse($event['start_date'])->format('F j, Y') }}

                                    </div>

                                    <ul class="list-group">
                                        <li class="list-group-item" style="font-size: 12px;"><span class="fui-user icon-color"></span>&nbsp;{{ trans('freeproduct.min_participants') }}:&nbsp;<strong>{{ \Utility::thousandSuffix($event['min_participants']) }}</strong></li>
                                        <li class="list-group-item" style="font-size: 12px;"><span class="fui-user icon-color"></span>&nbsp;{{ trans('freeproduct.max_participants') }}:&nbsp;<strong>{{ \Utility::thousandSuffix($event['max_participants']) }}</strong></li>
                                        <li class="list-group-item" style="font-size: 12px;"><span class="fui-radio-unchecked icon-color"></span>&nbsp;{{ trans('freeproduct.participation_cost') }}:&nbsp;<strong>{{ \Utility::thousandSuffix($event['participation_cost']) }}</strong></li>
                                        <li class="list-group-item panel-default">Package</li>
                                        <li class="list-group-item clearfix" style="font-size: 12px;">
                                            @foreach ($event['products'] as $product)
                                                <a href="{{ route('products.show',[$product['id']]) }}" class="thumbnail col-xs-4 col-md-2 " style="margin: 0 5px 5px 0">
                                                    <img src='{{ $product["features"]["images"][0] }}' class="img-rounded" alt="{{ $product['name'] }}">
                                                </a>
                                            @endforeach
                                        </li>
                                        <li class="list-group-item  panel-default">Description</li>
                                        <li class="list-group-item">
                                            {{ $event['description'] }}
                                            <hr>
                                            <div class="clearfix">
                                                <small>
                                                    <a href="{{ route('freeproducts.show',[$event['id']]) }}" class="pull-right">
                                                        <span class="fui-search icon-color"></span>&nbsp;{{ trans('globals.see_more') }}
                                                    </a>
                                                </small>
                                            </div>
                                        </li>
                                    </ul>

                                </div> {{-- end panel --}}

                            @endif {{-- products >0 --}}

                        @endforeach {{-- free products --}}

                    @endif {{-- if offering free products --}}

                </div> {{-- end home-left-bar --}}

            @stop {{-- end panel_left_content --}}

        </div> {{-- end container-fluid --}}

    </section> {{-- end products_view --}}

@stop {{-- end content --}}
