@extends('layouts.invoice')

@section('content')

    <div class="uk-block uk-width-1-2 uk-container-center">
        <h2>Make payment for invoice #{{ $invoice->invoice_number }}</h2>

        <h3>Invoice balance is ${{ $invoice->balance() }}</h3>

        <form action="{{ route('invoice.process-payment') }}" method="POST" id="billing-form" class="uk-form uk-form-stacked">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="unique_id" value="{{ $invoice->unique_id }}">

            <div class="uk-margin-bottom">
                @include('laraform::elements.form.text', ['field' => ['name' => 'amount', 'value' => $invoice->balance()]])
            </div>

            <div class="uk-text-danger alert-payment-error" id="payment-error-box"></div>

            <div class="uk-grid uk-margin-bottom">
                <div class="uk-width-small-1-1">
                    <div class="uk-form-row">
                        <label for="number" class="uk-form-label">Credit Card Number</label>
                        <div class="uk-form-controls">
                            <input type="text" data-stripe="number" maxlength="19" value="4242424242424242" class="uk-width-1-1">
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-grid uk-margin-top-remove">
                <div class="uk-width-small-1-3">
                    <div class="uk-form-row">
                        <label for="cvc" class="uk-form-label">CVC</label>
                        <div class="uk-form-controls">
                            <input type="text" data-stripe="cvc" maxlength="3" value="234">
                        </div>
                    </div>
                </div>
                <div class="uk-width-small-1-3">
                    <div class="uk-form-row">
                        <label for="month" class="uk-form-label">Exp. Month</label>
                        <div class="uk-form-controls">
                            <input type="text" data-stripe="exp-month" maxlength="2" value="12">
                        </div>
                    </div>
                </div>
                <div class="uk-width-small-1-3">
                    <div class="uk-form-row">
                        <label for="month" class="uk-form-label">Exp. Year</label>
                        <div class="uk-form-controls">
                            <input type="text" data-stripe="exp-year" maxlength="4" value="2017">
                        </div>
                    </div>
                </div>
            </div>

            <input type="submit" class="uk-button uk-button-primary uk-margin-top" value="Make Payment">

        </form>
    </div>

@endsection