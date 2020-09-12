{!! Form::model($model, [
  'route' => $model->exists ? ['categoryBlog.update', $model->id] : 'categoryBlog.store',
  'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

  <div class="form-group">
      <label for="category_name" class="control-label">Category Name</label>
      {!! Form::text('category_name', null, ['class' => 'form-control', 'id' => 'category_name', 'placeholder' => 'Website, Hosting, etc']) !!}
  </div>

{!! Form::close() !!}
