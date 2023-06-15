@extends('layouts.admin')
@section('after-css')

@endsection
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Template /</span> {{$title}}</h4>
@include('components.flash-message')
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <form action="{{ route('admin.template.category.sorting.save') }}" class="ajaxForm" method="post">
                @csrf
                <h5 class="card-header">{{$title}}
                    <span style="float: right;">
                        <button type="submit" class="btn btn-primary" id="sort">Save</button>
                    </span>
                </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12 mb-md-0 mb-4">

                            <p>Categories</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between pl-2">
                                    <span>#</span>
                                    <span>Name</span>
                                    <span>Status</span>
                                    <span>Created At</span>
                                </li>
                            </ul>
                            <hr>
                            <ul class="list-group list-group-flush" id="pending-task">
                                @foreach ($data as $k => $val)
                                <div class="drag-box" id="item{{$k+1}}">
                                    <input type="hidden" name="category_id[]" value="{{ $val->id }}">
                                    <li
                                        class="list-group-item drag-item cursor-move d-flex justify-content-between align-items-center drag-item">
                                        <span>{{ $k + 1 }}</span>
                                        <span><a href="{{ route('admin.template.sorting',$val->hashid) }}">{{ $val->name }}</a></span>
                                        <span>
                                            <span
                                                class="badge text-{{ $val->status ? 'success' : 'danger' }} bg-soft-{{ $val->status ? 'success' : 'danger' }}">{{
                                                $val->status ? 'Active' : 'Disabled' }}</span>
                                        </span>
                                        <span>{{ get_fulltime($val->created_at) }}</span>
                                    </li>
                                </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
@section('page-scripts')
{{-- <script src="{{ asset('admin_assets') }}/assets/js/extended-ui-drag-and-drop.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
    integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $( "#pending-task" ).sortable();
        $("#pending-task").disableSelection();

        $('.ajaxForm').submit(function(e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var param = new FormData(this);
            my_ajax(url, param, 'post', function(res) {
            },true);
        })
</script>

@endsection
