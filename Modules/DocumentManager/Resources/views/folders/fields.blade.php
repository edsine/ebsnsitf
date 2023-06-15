<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Folder Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_folder_id', 'Parent Folder:') !!}
    {!! Form::select('parent_folder_id', $folders, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Branch Id Field -->
<div id="branch_id_div" class="form-group col-sm-6">
    {!! Form::label('branch_id', 'Branch:') !!}
    {!! Form::select('branch_id', $branches, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Department Id Field -->
<div id="department_id_div" class="form-group col-sm-6">
    {!! Form::label('department_id', 'Department:') !!}
    {!! Form::select('department_id', [], null, ['class' => 'form-control custom-select']) !!}
</div>


@push('page_scripts')
    <script type="text/javascript">
        const departmentId = "{{ !empty($folder) ? $folder->department_id : '' }}";
        const branchId = $("#branch_id").val() || "{{ old('branch_id') }}";
        const parentFolderId = $("#parent_folder_id").val();

        if (parentFolderId) {
            $('#branch_id_div').css('display', 'none');
            $('#department_id_div').css('display', 'none');
        }

        getDepartments(branchId);

        function getDepartments(selectedValue) {
            // Make an ajax call to the branches.departments.get route
            $.ajax({
                url: `/shared/branches/departments/get/${selectedValue}`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Fill the options of the select element with the departments
                    $('#department_id').empty();
                    $('#department_id').append(`<option value="">Select department</option>`);
                    for (var i = 0; i < data.length; i++) {
                        if (departmentId == data[i].id) {
                            $('#department_id').append(
                                `<option selected value="${data[i].id}">${data[i].name}</option>`);
                        } else {
                            $('#department_id').append(
                                `<option value="${data[i].id}">${data[i].name}</option>`);
                        }
                    }
                }
            });
        }

        $('#branch_id').on('change', function() {
            const selectedValue = $(this).val();
            getDepartments(selectedValue);
        });

        $('#parent_folder_id').on('change', function() {
            const selectedValue = $(this).val();
            if (selectedValue) {
                $('#branch_id_div').css('display', 'none');
                $('#department_id_div').css('display', 'none');
                return;
            }
            $('#branch_id_div').css('display', 'block');
            $('#department_id_div').css('display', 'block');
        });
    </script>
@endpush
