@extends('layouts.app')
@section('title', '')

@section('content')

<div class="panel panel-default" style="margin-top: 16px;" id="app">
	<div class="panel-heading">
		<div class="row">
			<div class="col-sm-4"><h3>BBS - index</h3>
			</div>
			<div class="col-sm-4">
				{{ link_to_route('bbs.create', 'Create' ,null, ['class' => 'btn btn-primary']) }}
			</div>
			<div class="col-sm-4" style="text-align: right;">
				<a href="#" class="btn btn-sm btn-outline-primary serach_display_btn mb-0">
					<i class="fas fa-arrow-down"></i>&nbsp;Search
				</a>				
			</div>
		</div>
	</div>
    <?php //debug_dump($params);
        $key_name = "";
        if(isset($params["title"])){
            $key_name = $params["title"];
        }
    ?>    
    {!! Form::model(null, [
        'route' => 'bbs.search_index', 'method' => 'post', 'class' => ''
	]) !!}        
	<div class="search_wrap mt-2" style="display: none; ">
		<hr class="mb-2 mt-2" />
		<div class="row mb-2">
			<div class="col-sm-4">
				{!! Form::text('title', $key_name , [
					'id' => 'chat-name', 'class' => 'form-control search_key' ,
					'placeholder' => 'title',
					'style' => 'margin-right : 10px;']) 
				!!}   
			</div>
			<div class="col-sm-8">
				{!! Form::submit('Search', ['class' => 'btn btn-outline-primary btn-sm serach_button']) !!}
			</div>
		</div>
	</div>
    {!! Form::close() !!}

	<div class="panel-body">
		<table class="table table-striped bbs-table">
			<thead>
				<th>post</th>
			</thead>
			<?php //debug_dump($tasks); ?>
			<tbody>
				@foreach ($bbs_posts as $post )
					<tr>
						<td class="table-text">
							<p class="p_tbl_task_name mb-0">
								{{ link_to_route('bbs.show', $post->title, $post->id) }}
							</p>
							<?= $post->created_at ?>, ID: <?= $post->id ?>
							<!--
							<a href="/bbs/<?= $post->id ?>/edit"
								class="a_edit_link" 
								data-toggle="tooltip" title="編集します">
								<i class="far fa-edit"></i>
							</a>
							-->
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<!-- paginater -->
		{{ $bbs_posts->links() }}
		<br />
		<hr />
		@include('element.page_info',
		[
			'git_url' => ' ',
			'blog_url' => ' '
		])        
	</div>
</div>
<!-- -->
<style>
.p_tbl_task_name{ font-size: 1.2rem; }
.bbs-table td{ padding : 8px;}
.bbs-table  td i {font-size : 1.2rem; }
</style>
<!-- -->
<script>
$(function(){
	$( '.serach_display_btn' ).click( function() {
		// alert('serach_display_btn');
		$('.search_wrap').css('display','inherit');
	});
});
</script>

@endsection

