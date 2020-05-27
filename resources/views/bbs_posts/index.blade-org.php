@extends('layouts.app')
@section('title', 'タスク一覧')

@section('content')

<div class="panel panel-default" style="margin-top: 16px;" id="app">
	<div class="panel-heading">
		<div class="row">
			<div class="col-sm-6"><h3>BBS - index</h3>
			</div>
			<div class="col-sm-6" style="text-align: right;">
				{{ link_to_route('bbs.create', 'Create' ,null, ['class' => 'btn btn-primary']) }}
			</div>
		</div>
	</div>
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

@endsection

