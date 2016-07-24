<h3 class="uk-panel-title">Work Order Information</h3>

<div class="uk-grid">
	<div class="uk-width-1-1">

        <h3>Scheduled: {{ $workOrder->scheduled->toFormattedDateString() }}</h3>

		<ul class="uk-list">
			<li>
				Client: {{ $workOrder->client->title }}

			</li>

			<li>Rate: ${{ $workOrder->rate }}</li>
		</ul>
		
		<hr>

		@if($workOrder->description != '')
		    <p>{{ $workOrder->description }}</p>
		@endif

	</div>
</div>