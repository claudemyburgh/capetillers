@extends('layouts.admin')

@section('content')

<div class="row">
<div class="md-col-12">
	<h2><i class="fa fa-calendar" aria-hidden="true"></i> Laravel Log Viewer</h2>
	<div class="list-group">
		@foreach($files as $file)
			<a class="btn btn--default btn--lg" href="?l={{ \Illuminate\Support\Facades\Crypt::encrypt($file) }}"
				 class="list-group-item @if ($current_file == $file) @endif">
				{{$file}}
			</a>
		@endforeach
	</div>
</div>
<div class="md-col-12">
			@if ($logs === null)
				<div>
					Log file >50M, please download it.
				</div>
			@else
			<div class="table__responsive">
				<table id="table-log" class="table table--striped">
					<thead class="table__head">
						<tr>
							<th>Level</th>
							<th>Context</th>
							<th>Date</th>
							<th>Content</th>
						</tr>
					</thead>
					<tbody class="table__body">

					@foreach($logs as $key => $log)
						<tr data-display="stack{{{$key}}}">

							<td data-title="Level" class="text--{{{$log['level_class']}}}"><span class="fa fa-{{{$log['level_img']}}}" aria-hidden="true"></span> &nbsp;{{$log['level']}}</td>
							<td data-title="Context" class="text">{{$log['context']}}</td>
							<td data-title="Date" class="date">{{{$log['date']}}}</td>
							<td data-title="Content" class="text">
								{{{$log['text']}}}
								@if (isset($log['in_file'])) <br/>{{{$log['in_file']}}}@endif
								@if ($log['stack'])
									<div class="stack" id="stack{{{$key}}}"
											 style="display: none; white-space: pre-wrap;">{{{ trim($log['stack']) }}}
									</div>
								@endif
							</td>
						</tr>
					@endforeach

					</tbody>
				</table>
			</div><!--responsive-table-->
			@endif
			<div class="clearfix">
				<br>
				@if($current_file)
					<a class="btn btn--default" href="?dl={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}"><i class="lunacon lunacon-download"></i>
						Download file</a>
					
					<a class="btn btn--default" id="delete-log" href="?del={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}"><i
								class="lunacon lunacon-trash"></i> Delete file</a>
					@if(count($files) > 1)
						
						<a class="btn btn--default" id="delete-all-log" href="?delall=true"><i class="lunacon lunacon-close-small"></i> Delete all files</a>
					@endif
				@endif
			</div>
		</div>
</div>



@endsection


@section('scripts')

<script>
	$(document).ready(function () {

		$('#delete-log, #delete-all-log').click(function () {
			return confirm('Are you sure?');
		});
	});



</script>

@endsection
