<div class="form-group">
    {!! Form::label('title', 'Título: ') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Descrição: ') !!}
    {!! Form::text('description', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('content', 'Conteúdo: ') !!}
    {!! Form::textarea('content', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('active', 'Ativo: ') !!}
    {!! Form::checkbox('active', true, null) !!}
</div>