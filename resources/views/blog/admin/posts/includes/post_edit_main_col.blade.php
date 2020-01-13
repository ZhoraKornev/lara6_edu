@php
    /** @var \App\Models\BlogPost $item */
    /** @var \Illuminate\Support\Collection  $categoryList */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            @if ($item->is_published)
                Опубликовано
            @else
                Черновик
            @endif
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">
                            Основные данные
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#adddata" role="tab">
                            Дополнительніе данные
                        </a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" value="{{ old('title',$item->title)}}"
                                   id="title"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="slug">Описание</label>
                            <textarea name="content_raw"
                                      id="content_raw"
                                      class="form-control"
                                      rows="13"
                                      minlength="3">{{old('content_raw',$item->content_raw)}}</textarea>
                        </div>


                    </div>
                    <div class="tab-pane" id="adddata" role="tabpanel">
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input name="slug" value="{{old('slug',$item->slug)}}"
                                   id="slug"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                            >
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Категория</label>
                            <select name="category_id"
                                    id="category_id"
                                    class="form-control"
                                    placeholder="Выберите категорию"
                                    required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}" @if ($item->category_id == $categoryOption->id ) selected @endif>
                                        {{$categoryOption->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slug">Короткое описание</label>
                            <textarea name="excerpt"
                                      id="excerpt"
                                      class="form-control"
                                      minlength="3">{{old('excerpt',$item->excerpt)}}</textarea>
                        </div>
                        <div class="form-check">
                            <input type="hidden" value="0" name="is_published">
                            <input type="checkbox" value="1" name="is_published"
                                   @if ($item->is_published)
                                   checked="checked"
                                @endif
                            >
                            <label class="form-check-label" for="is_published">Опубликовано</label>


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
