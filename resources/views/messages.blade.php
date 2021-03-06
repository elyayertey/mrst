@extends('layouts.app')

@section('heading')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    {{ Html::style('css/style.css') }}

@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2">


                @include('menu')
            </div>


            <div class="col-md-10">
                @include('alerts')
                <div class="row">

                    <div class="panel panel-default">
                        <div class="panel-heading">Messages</div>
                        <div class="panel-body row">

                            <div style="padding:20px;">

                                <div class="row">

                                    <div class="col-md-12">


                                                <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" @if(Request::segment(2)=='inbox')  class="active"  @endif ><a href="/messages/inbox" aria-controls="profile" role="tab">Inbox</a></li>
                                            <li role="presentation"  @if(Request::segment(2)=='sent')  class="active"  @endif ><a href="/messages/sent" aria-controls="messages" role="tab">Sent</a></li>
                                            <li role="presentation"><a href="/messages/compose" aria-controls="home" role="tab">Compose</a></li>

                                        </ul>

                                        <ul class="list-group">

                                            @foreach($messages as $message)

                                                <li class="list-group-item">
                                                    <span class="pull-right">
                                                        <?php $class='none' ?>
                                                        @if($message->read==1)
                                                            <?php $class='text-muted'; ?>
                                                   <i class="fa fa-eye"></i>
                                                    @endif
                                                            <i class="fa fa-trash"></i> &nbsp;{!! HTML::link('messages/delete', 'Delete', array('id'=>$message->id, 'class'=>'action', 'data-action'=>'delete')) !!}
                                                    </span>
                                                    {!! $message->date_created !!} </i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <i class="fa fa-envelope-o"></i><i> &nbsp;&nbsp; <b>{!! HTML::link('/messages/read/'.$message->id, substr($message->subject, 0, 50).'...', array('class'=>$class)) !!} </b></li>

                                            @endforeach


                                        </ul>
                                    {!! $messages->links()  !!}
                                    </div>

                                    <div class="col-md-2">


                                    </div>

                                </div>


                            </div>

                        </div>
                        <div class="panel-footer">

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    {!! HTML::script('js/action.js') !!}
@endsection
