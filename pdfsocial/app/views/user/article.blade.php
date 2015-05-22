@include('user.header')
@include('social.navbar')
<link rel = "stylesheet" href = "/css/creative.css"/>
<div class="container user-info-page">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <form class="form-horizontal" method="post" action="/user/article" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <h4 class="text-primary">Đăng bài viết mới</h4>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <h5 class="text-info"><?php if(isset($success_message)) echo $success_message ?></h5>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <h5 class="text-danger"><?php if(isset($error_message)) echo $error_message ?></h5>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-4 control-label">Tiều đề bài viết</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="title" placeholder="Tiêu đề" name="title">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-4 control-label">Chuyên mục</label>
                    <div class="col-sm-4">
                        <select name = "catId" class="form-control">
                            @foreach($allCats as $cat)
                                <option value = "{{ $cat->id }}">{{ $cat->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label for="file" class="col-sm-4 control-label">File PDF</label>
                    <div class="col-sm-8">
                        <input type="file" id="file" name="pdf">
                    </div>
                </div>


                <div class="form-group">
                    <label for="content" class="col-sm-4 control-label">Mô tả</label>
                    <div class="col-sm-8">
                        <textarea name="content" class="form-control" rows="10">

                        </textarea>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">Đăng bài viết mới</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('user.footer')