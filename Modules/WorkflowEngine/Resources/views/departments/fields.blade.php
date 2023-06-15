<!-- Department Unit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dep_unit', 'Department Unit:') !!}
    {!! Form::text('dep_unit', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <div class="">
    {!! Form::radio('status', 1, false) !!}&nbsp;Active&nbsp;&nbsp;
    {!! Form::radio('status', 0, true) !!}&nbsp;In-Active
    </div>

</div>


