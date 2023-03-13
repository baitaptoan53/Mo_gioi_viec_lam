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
                        <div class="form-group">
                            <label>Company</label>
                            <select class="form-control" name="company" id='select-company'></select>
                        </div>
                        <div class="form-group">
                            <label>Language</label>
                            <select class="form-control" multiple name="language" id='select-language'></select>
                        </div>
                        <div class="form-group">
                            <label>Requirement</label>
                            <textarea name="requirement" class="form-control" cols="40"></textarea>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <select class="form-control" name="city" id='select-city'></select>
                        </div>
                        <div class="form-group">
                            <label>District</label>
                            <select class="form-control" name="district" id='select-district'></select>
                        </div>
                        <!-- Success Switch-->
                        <div class="mt-3 form-group">
                            <div> <label>Parttime</label></div>
                            <input type="checkbox" id="switch3" data-switch="success" />
                            <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                        </div>
                        <div class="mt-3 form-group">
                            <div><label>Remove</label></div>
                            <input type="checkbox" id="switch3" data-switch="" />
                            <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                        </div>
                        <div class="col-md-4">
                            <span class="mb-4">Min salary</span>
                            <input type="number" name="max_salary" class="form-control">
                            <span class="mb-4">Max salary</span>
                            <input type="number" name="max_salary" class="form-control">
                            <label for="curency">Cunrency Salary</label>
                            <div class="col-5">
                                <select class="form-control select-filter" name="curency" id="curency">
                                    @foreach ($curencies as $curency => $value)
                                        <option value="{{ $value }}"
                                            @if ((string) $value === $selectCurency) selected @endif>
                                            {{ $curency }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <span class="mb-4">Range date</span>
                            <div class="input-group input-daterange">
                                <input type="text" name="from_date_alt" id="from_date_alt"
                                    class="form-control datepicker" placeholder="Start date" value="">
                                <span class="input-group-addon">to</span>
                                <input type="text" name="to_date_alt" id="to_date_alt" class="form-control datepicker"
                                    placeholder="End date" value="">
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <button name="submit" class="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        var nowDate = new Date();
        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

        $(".datepicker").datepicker({
            format: 'dd-mm-yyyy',
            startDate: today,
            autoclose: true
        });
        async function loadDistrict() {
            $('#select-district').empty();
            const path = $("#select-city option:selected").data('path');
            const response = await fetch('{{ asset('locations/') }}' + path);
            const districts = await response.json();
            $.each(districts.district, function(index, each) {
                if (each.pre === 'Quận') {
                    $("#select-district").append(`
                    <option>
                        ${each.name}
                    </option>`);
                }
            })
        }
        $(document).ready(async function() {
            $("#select-company").select2({
                tags: true,
                ajax: {
                    url: '{{ route('api.companies') }}',
                    data: function(params) {
                        const queryParameters = {
                            q: params.term
                        };

                        return queryParameters;
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data.data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });
            $("#select-language").select2({
                ajax: {
                    url: '{{ route('api.languages') }}',
                    data: function(params) {
                        const queryParameters = {
                            q: params.term
                        };

                        return queryParameters;
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data.data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });
            $("#select-city").select2();
            const response = await fetch('{{ asset('locations/index.json') }}');
            const cities = await response.json();
            $.each(cities, function(index, each) {
                $("#select-city").append(`
                <option data-path='${each.file_path}'>
                    ${index}
                </option>`)
            })
            $("#select-city").change(function() {
                loadDistrict();
            });
            $('#select-district').select2();
            loadDistrict();
        });
    </script>
@endpush
