{{-- <i class="" data-type="{{ $data->type }}" data-prompt="{{ $data->prompt }}"
    data-answer="{{ $data->answer }}" data-input="{{ $data->input }}" data-instruction="{{ $data->instruction }}"
    data-setting='{{ $data->setting }}' style="font-size: 19px;"></i> --}}


<span style="font-size: 15px;" data-type="{{ $data->type }}" data-templatename="{{$data->template_name ?? 'Template'}}" data-prompt="{{ $data->prompt }}"
    data-answer="{{ $data->answer }}" data-input="{{ $data->input }}" data-instruction="{{ $data->instruction }}"
    data-setting='{{ json_decode($data->setting) }}' style="font-size: 19px;">{{get_fulltime($data->created_at)}}</span>
