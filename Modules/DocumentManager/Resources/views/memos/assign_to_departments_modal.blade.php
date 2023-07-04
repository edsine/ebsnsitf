<!-- Modal -->
<div class="modal fade" id="assignToDepartmentsModal" tabindex="-1" role="dialog"
    aria-labelledby="assignToDepartmentsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => 'memos.assignToDepartments']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign to Departments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label class="col-form-label text-right">Select Department(s)</label>
                    <select class="form-control select2" id="department_select" name="departments[]" multiple="multiple">
                    </select>
                </div>

                <!-- Memo Id Field -->
                {!! Form::hidden('memo_id', $memo->id, ['id' => 'department_memo_id']) !!}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>


@push('page_scripts')
    <script>
        $(document).ready(function() {
            $("#department_select").select2({
                placeholder: "Search for department",
                minimumInputLength: 2,
                allowClear: true,
                ajax: {
                    url: "{{ url('api/shared/departments') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term,
                            page: params.page || 1,
                            // skip: (params.page - 1) * 10, // Assuming 10 departments per page
                            limit: 10 // Number of departments per page
                        };
                    },
                    processResults: function(data, params) {
                        var options = [];
                        $.each(data.data, function(index, department) {
                            options.push({
                                id: department.id,
                                text: department.name
                            });
                        });

                        var currentPage = params.page || 1;
                        var totalPages = Math.ceil(data.data.length / 10);

                        return {
                            results: options,
                            pagination: {
                                more: currentPage < totalPages
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function(markup) {
                    return markup;
                }, // let our custom formatter work
            });
        })
    </script>
@endpush
