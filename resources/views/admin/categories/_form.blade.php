<div class="form-group">
    {!! Form::label('name', 'Nome: ') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Descrição: ') !!}
    {!! Form::text('description', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('active', 'Ativo: ') !!}
    {!! Form::checkbox('active', null, ['class'=>'form-control']) !!}
</div>