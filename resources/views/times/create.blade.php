<form action="{{ route('times.store') }}" id="add-time" class="uk-form uk-form-stacked">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="work_order_id" value="{{ $workOrderId }}">

    <div class="uk-form-row">
        {{ $errors->first('date') }}
        <label for="date" class="uk-form-label">Date</label>
        <div class="uk-form-controls">
            <input type="text" name="date" data-uk-datepicker="{weekstart:0, format:'YYYY-MM-DD'}">
        </div>
    </div>

    <div class="uk-form-row">
        {{ $errors->first('time') }}
        <label for="time" class="uk-form-label">Time</label>
        <div class="uk-form-controls">
            <input type="text" name="time" data-uk-timepicker="{showMeridian:true, format:'12h'}">
        </div>
    </div>

    @include('laraform::elements.form.text', ['field' => ['name' => 'hours']])
    @include('laraform::elements.form.text', ['field' => ['name' => 'minutes']])
    @include('laraform::elements.form.textarea', ['field' => ['name' => 'note']])

    <div class="uk-form-row">
        <button id="save-time" class="uk-button uk-button-primary">Save</button>
    </div>
</form>