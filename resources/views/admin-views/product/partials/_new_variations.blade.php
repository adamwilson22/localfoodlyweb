
<div class="card view_new_option mb-2">
    <div class="card-header">
        <label for=""
            id="new_option_name_{{ $key }}">{{ isset($item['name']) ? $item['name'] : "translate('add new variation')" }}</label>
    </div>
    <div class="card-body">
        <div class="row g-2">
            <div class="col-lg-3 col-md-6">
                <label for="">{{ translate('name') }}</label>
                <input required name="options[{{ $key }}][name]" required class="form-control"
                    type="text" onkeyup="new_option_name(this.value,{{ $key }})"
                    value="{{ $item['name'] }}">
            </div>

            
            <div class="col-12 col-lg-6">
                <div class="row g-2">
                   

                    <div class="col-md-4">
                        <label class="d-md-block d-none">&nbsp;</label>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <input name="options[{{ $key }}][required]" type="checkbox"
                                    {{ isset($item['required']) ? ($item['required'] == 'on' ? 'checked	' : '') : '' }}>
                                <label for="options[{{ $key }}][required]"
                                    class="m-0">{{ translate('Required') }}</label>
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger btn-sm delete_input_button"
                                    onclick="removeOption(this)" title="{{ translate('Delete') }}">
                                    <i class="tio-add-to-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="option_price_{{ $key }}">
            <div class="border rounded p-3 pb-0 mt-3" >
                    <div id="option_price_view_{{ $key }}">


                @if (isset($item['values']))
                    @foreach ($item['values'] as $key_value => $value)
                        <div class="row add_new_view_row_class mb-3 position-relative pt-3 pt-md-0">
                            <div class="col-md-4 col-sm-6">
                                <label for="">{{ translate('Option_name') }}</label>
                                <input class="form-control" required type="text"
                                    name="options[{{ $key }}][values][{{ $key_value }}][label]"
                                    value="{{ $value['label'] }}">
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="">{{ translate('Additional_price') }}</label>
                                <input class="form-control" required type="number" min="0" step="0.01"
                                    name="options[{{ $key }}][values][{{ $key_value }}][optionPrice]"
                                    value="{{ $value['optionPrice'] }}">
                            </div>
                            <div class="col-sm-2 max-sm-absolute">
                                <label class="d-none d-md-block">&nbsp;</label>
                                <div class="mt-1">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteRow(this)"
                                        title="{{translate('Delete')}}">
                                        <i class="tio-add-to-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endif
            </div>
                <div class="row mt-3 p-3 mr-1 d-flex" id="add_new_button_{{ $key }}">
                    <button type="button"
                        class="btn btn-outline-primary"onclick="add_new_row_button({{ $key }})">{{ translate('Add_New_Option') }}</button>
                </div>

            </div>




        </div>
    </div>
</div>
