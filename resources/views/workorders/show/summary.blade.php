<h3 class="uk-panel-title">Work Order Information</h3>
<div class="uk-panel-badge"><a href="{{ route('work-orders.edit', $workOrder->id) }}">Edit</a></div>

<div class="uk-grid">
	<div class="uk-width-1-1">

        <h3>
            @if(is_null($workOrder->scheduled))
                Not Scheduled
            @else
                Scheduled {{ $workOrder->scheduled->toFormattedDateString() }}
            @endif
        </h3>

		<ul class="uk-list">
			<li>
				Client: <a href="{{ route('clients.show', $workOrder->client->id) }}">{{ $workOrder->client->title }}</a>

			</li>

			<li>Rate: ${{ $workOrder->rate }}</li>
            <li>Reference: {{ $workOrder->reference }}</li>
		</ul>
		
		<hr>

		@if($workOrder->description != '')
		    <p>{!! $workOrder->description !!}</p>
		@endif

	</div>
</div>