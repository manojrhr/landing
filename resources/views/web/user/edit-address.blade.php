@extends('layouts/web/master')

@section('styles')
@endsection

@section('content')

<!-- #Main Content-->
<div id="main-content">
    <!-- Section Account One -->
    <div class="section-account-one">
        <div class="container">
            <h1 Class="title-main-page">My account</h1>
            <div class="d-flex flex-wrap justify-content-between row-account-user">
                @include('includes.user.profile-menu')
                <div class="user-info-data">
                    <div class="inner-user-info-data">
                        <h3 class="title-h3">Billing address</h3>
                        <form class="needs-validation" method="POST" action="{{ route('user.updateAddress', $address->id) }}">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="billing_company">Company name (optional)</label>
                                <input type="text" class="form-control form-Input-text" name="company"
                                    id="billing_company" autocomplete="billing_company" value="{{ $address->company }}" required>
                            </div> 
                            <div class="form-group">
                                <label class="form-label" for="select_country">Country / Region&nbsp;<span
                                        class="required">*</span></label>
                                        <select class="custom-select select2 form-Input-select" name="country_id" id="select_country" required>
                                            @foreach (get_countries_list() as $country)
                                                <option value="{{ $country->id }}" {{$address->country_id == $country->id  ? 'selected' : ''}}>{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="billing_address_1">Street address&nbsp;<span
                                        class="required">*</span></label>
                                <input type="text" class="form-control form-Input-text" name="address_1"
                                    id="billing_address_1" autocomplete="billing_address_1"
                                    value="{{ $address->address_1 }}" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-Input-text" name="address_2"
                                    id="billing_address_2" autocomplete="billing_address_2" value="{{ $address->address_2 }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="billing_city">Town / City / Post
                                    Office&nbsp;<span class="required">*</span></label>
                                <input type="text" class="form-control form-Input-text" name="city"
                                    id="billing_city" autocomplete="billing_city" value="{{ $address->city }}" required>
                            </div>
                            {{-- <div class="form-group">
                                <label class="form-label" for="select_parish">Parish&nbsp;<span
                                        class="required">*</span></label>
                                <select class="custom-select select2" id="select_parish" required>
                                    <option>Kingston</option>
                                    <option>Saint Andrew</option>
                                    <option>Saint Thomas</option>
                                    <option>Portland</option>
                                    <option>Saint Mary</option>
                                    <option>Saint Ann</option>
                                    <option>Trelawny</option>
                                    <option>Saint James</option>
                                    <option>Hanover</option>
                                    <option>Westmoreland</option>
                                    <option>Saint Elizabeth</option>
                                    <option>Manchester</option>
                                    <option>Clarendon</option>
                                    <option>Saint Catherine</option>
                                </select>

                            </div> --}}
                            <div class="form-group">
                                <label class="form-label" for="billing_postcode">Postal Code (optional)</label>
                                <input type="text" class="form-control form-Input-text" name="postal_code"
                                    id="billing_postcode" autocomplete="tel" value="{{ $address->postal_code }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="billing_phone">Phone&nbsp;<span
                                        class="required">*</span></label>
                                <input type="tel" class="form-control form-Input-text" name="phone"
                                    id="billing_phone" autocomplete="tel" value="{{ $address->phone }}" required>
                            </div>
                            {{-- <div class="form-group">
                                <label class="form-label" for="billing_email">Email address&nbsp;<span
                                        class="required">*</span></label>
                                <input type="text" class="form-control form-Input-text" name="billing_email"
                                    id="billing_email" autocomplete="email username"
                                    value="cjaewallace@gmail.com" required>
                            </div> --}}
                            <div class="form-group">
                                <button type="submit" class="form-submit">Save address</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End #Main Content-->
@endsection
