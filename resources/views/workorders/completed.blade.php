@extends('layouts.default')

@section('content')

    <h1><i class="uk-icon-text-o"></i> Completed Work Orders</h1>

    @include('partials.navigation.workorders.sub')

    <div class="uk-panel uk-panel-box">
        <h3 class="uk-panel-title"><i class="uk-icon-calendar-check-o"></i> Work Orders</h3>

        <div class="uk-grid">
            <div class="uk-width-1-1">
                @include('workorders.index.table')

                {{ $workOrders->render() }}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(function() {
            $('ul.pagination').addClass('uk-pagination');
        });
    </script>
@endsection