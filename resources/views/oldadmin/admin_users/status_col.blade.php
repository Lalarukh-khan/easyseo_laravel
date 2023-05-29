<td class="text-center">
    <p class="mb-1">
        <span class="badge text-{{$data->is_active ? 'success' : 'danger'}} bg-soft-{{$data->is_active ? 'success' : 'danger'}}">{{$data->is_active ? 'Active' : 'Disabled'}}</span>
    </p>
    {{-- <p class="m-0">
        <button type="button" class="btn btn-sm btn-{{ $data->is_active ? 'danger' : 'success'}}" onclick="ajaxRequest(this)" data-url="{{ route('admin.user.update_status', $data->hashid) }}">{{ $data->is_active ? 'Disable' : 'Activate'}} User</button>
    </p> --}}
</td>
