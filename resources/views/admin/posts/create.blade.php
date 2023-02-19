@extends('layouts.master')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate>
                        <label>Company</label>
                        <select class="form-group" name="company" id="select-company"></select>
                        {{-- <div class="form-group mb-3">
                            <label for="city">Company</label>
                            <div class="col-5">
                                <select class="form-control select-filter" name="company" id="company">
                                    <option selected>Chose Company</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}"
                                            @if ($company->id === (int) $selectedCompany) selected @endif>
                                            {{ $company->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <select class="form-control select-filter" name="company" id="company">
                                <option selected>Chose Company</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" @if ($company->id === (int) $selectedCompany) selected @endif>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control" aria-label="Text input with dropdown button">
                        </div>
                        <div class="form-group mb-3">
                            <label for="validationCustom01">Job Title</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Job Title"
                                value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="validationCustom02">District</label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="District"
                                value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="validationCustom04">District</label>
                            <input type="text" class="form-control" id="validationCustom04" placeholder="District"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid District.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="validationCustom03">City</label>
                            <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-date">Start Date</label>
                            <input class="form-control" id="example-date" type="date" name="date">
                        </div>
                        <div class="form-group">
                            <label for="example-date">End Date</label>
                            <input class="form-control" id="example-date" type="date" name="date">
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox form-check">
                                <input type="checkbox" class="custom-control-input" id="invalidCheck" required>
                                <label class="custom-control-label" for="invalidCheck">Agree to terms
                                    and conditions</label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit form</button> --}}

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#select-company").select2({
                tags: true
            });
        });
    </script>
@endpush
