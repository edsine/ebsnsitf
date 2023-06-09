<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="branches-table">
            <thead>
            <tr>
                <th>Branch Name</th>
                <th>Branch Region</th>
                <th>Branch Code</th>
                <th>Last Ecsnumber</th>
                <th>Highest Rank</th>
                <th>Staff Strength</th>
                <th>Managing Id</th>
                <th>Branch Email</th>
                <th>Branch Phone</th>
                <th>Branch Address</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($branches as $branch)
                <tr>
                    <td>{{ $branch->branch_name }}</td>
                    <td>{{ $branch->branch_region }}</td>
                    <td>{{ $branch->branch_code }}</td>
                    <td>{{ $branch->last_ecsnumber }}</td>
                    <td>{{ $branch->highest_rank }}</td>
                    <td>{{ $branch->staff_strength }}</td>
                    <td>{{ $branch->managing_id }}</td>
                    <td>{{ $branch->branch_email }}</td>
                    <td>{{ $branch->branch_phone }}</td>
                    <td>{{ $branch->branch_address }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['branches.destroy', $branch->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('branches.show', [$branch->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('branches.edit', [$branch->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $branches])
        </div>
    </div>
</div>
