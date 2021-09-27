@extends('admin.layout.page')

@section('content')
@include('admin.inc.sidebar')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ __('messages.adminpanel') }}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-cutlery fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $dishes }}</div>
                            <div>{{ __('messages.dishes') }}</div>
                        </div>
                    </div>
                </div>
                <a href="/admin/dishes">
                    <div class="panel-footer">
                        <span class="pull-left">{{ __('messages.viewdetails') }}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-book fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $blogs }}</div>
                            <div>Blogs</div>
                        </div>
                    </div>
                </div>
                <a href="/admin/blogs">
                    <div class="panel-footer">
                        <span class="pull-left">{{ __('messages.viewdetails') }}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-home fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $rooms }}</div>
                            <div>{{ __('messages.chalets') }}</div>
                        </div>
                    </div>
                </div>
                <a href="/admin/rooms">
                    <div class="panel-footer">
                        <span class="pull-left">{{ __('messages.viewdetails') }}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-bookmark-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $requests }}</div>
                            <div>{{ __('messages.requests') }}</div>
                        </div>
                    </div>
                </div>
                <a href="/admin/requests">
                    <div class="panel-footer">
                        <span class="pull-left">{{ __('messages.viewdetails') }}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>



        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-bookmark fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $reservations }}</div>
                            <div>{{ __('messages.reservations') }}</div>
                        </div>
                    </div>
                </div>
                <a href="/admin/reservations">
                    <div class="panel-footer">
                        <span class="pull-left">{{ __('messages.viewdetails') }}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>



        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user-circle fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $users }}</div>
                            <div>{{ __('messages.users') }}</div>
                        </div>
                    </div>
                </div>
                <a href="/admin/users">
                    <div class="panel-footer">
                        <span class="pull-left">{{ __('messages.viewdetails') }}</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection