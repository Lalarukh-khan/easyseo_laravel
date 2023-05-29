<td class="text-center">
    <p class="mb-1">
        <span class="badge text-{{$data->status ? 'success' : 'danger'}} bg-soft-{{$data->status ? 'success' : 'danger'}}">{{$data->status ? 'Active' : 'Disabled'}}</span>
    </p>
    {{-- <p class="m-0">
        <button type="button" class="btn btn-sm btn-{{ $data->status ? 'danger' : 'success'}}" onclick="ajaxRequest(this)" data-url="{{ route('admin.template.status', $data->hashid) }}">{{ $data->status ? 'Disable' : 'Activate'}} Template</button>
    </p> --}}
</td>
