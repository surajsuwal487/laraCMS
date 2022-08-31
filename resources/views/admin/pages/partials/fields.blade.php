{!! csrf_field() !!}
<div class="form-group">
   <label for="title">Title</label>
   <input type="text" class="form-control" id="title"
      name="title" value="{{ $model->title }}">
</div>
<div class="form-group">
   <label for="url">URL</label>
   <input type="text" class="form-control" id="url"
      name="url" value="{{ $model->url }}">
</div>
<div class="form-group">
   <label for="content">Content</label>
   <textarea class="form-control" id="content" name="content">{{ $model->content }}</textarea>
</div>
<div class="form-group">
   <input type="submit" class="btn btn-primary" value="Submit">
</div>