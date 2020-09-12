<table class="table table-hover">
  <tr>
      <th>ID</th>
      <th>Category Name</th>
      <th>Created At</th>
  </tr>
  <tr>
      <td>{{ $model->id }}</td>
      <td>{{ $model->category_name }}</td>
      <td>{{ \Carbon\Carbon::parse($model->created_at)->translatedFormat('l, d F Y')}}</td>
  </tr>
</table>