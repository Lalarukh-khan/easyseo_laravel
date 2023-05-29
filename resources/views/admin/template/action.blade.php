<a href="{{route('admin.template.edit',$data->hashid)}}" title="edit" style="font-size:20px;"><i class="fadeIn animated bx bx-edit"></i></a>&nbsp;&nbsp;
<a href="javascript:void(0);" onclick="ajaxRequest(this)" data-url="{{route('admin.template.delete',$data->hashid)}}" class="text-danger" title="delete" style="font-size:20px;"><i class="fadeIn animated bx bx-trash"></i></a>&nbsp;&nbsp;
