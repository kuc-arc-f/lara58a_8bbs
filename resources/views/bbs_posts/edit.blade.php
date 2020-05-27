@extends('layouts.app')

@section('title', "")

@section('content')

    <div class="panel panel-default">
        <br />
        <div class="panel-heading">
            {{ link_to_route('bbs.index', '戻る', null, ['class' => 'btn btn-outline-primary'] ) }}
           <br />
           <br />
           <h3>編集</h3>
        </div>
        <hr />
        <div class="panel-body">
            {!! Form::model($bbs_post, ['route' => ['bbs.update', $bbs_post->id], 'method' => 'patch', 
            'class' => 'form-horizontal']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'title', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('title', $bbs_post->title, [
                            'id' => 'bbs_post-title', 'class' => 'form-control'
                        ]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('content', 'content', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('content', $bbs_post->content, [
                            'id' => 'bbs_post-content', 'class' => 'form-control'
                        ]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        {!! Form::button('<i class="fa fa-save"></i> Save', 
                        ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
        <hr />
        <br />
        <div class="panel-footer">
        </div>
    </div>

@endsection
