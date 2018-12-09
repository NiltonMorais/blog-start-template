<div class="form-group">
    {!! Form::label('title', 'Título*: ') !!}
    {!! Form::text('title', null, ['class'=>'form-control','required'=>'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Descrição*: ') !!}
    {!! Form::text('description', null, ['class'=>'form-control','required'=>'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('content', 'Conteúdo*: ') !!}
    {!! Form::textarea('content', null, ['class'=>'form-control','required'=>'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('categories[]', 'Categoria: ') !!}
    {!! Form::select('categories[]', $categories, null, ['class' => 'custom-select', 'multiple'=>'multiple', 'size'=>'10']); !!}
</div>
<div class="form-group">
    {!! Form::label('active', 'Ativo: ') !!}
    {!! Form::checkbox('active', true, null) !!}
</div>