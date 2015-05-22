@extends('social.general')
@section('content')
    <div class = "col-sm-9 main-content">
        <div class="row">

            <div class = "col-sm-8">
                <h2 class = "text-danger">{{ $post->title  }}</h2>
                <iframe src = "http://localhost:8000/social/file?s={{ $post->link_file }}" frameborder = "0"></iframe>
            </div>

            <div class = "col-sm-4">
                <h3 class="text-info">Thông tin</h3>
                <p>
                    {{ $post->content }}
                </p>
                <h6 class="text-danger">
                    Tạo vào: {{ $post->created_at }} bởi {{ $post->email }}
                </h6>
                <hr/>
                <h4 class="text-info">Bình luận <code>{{ count($comments) }}</code> </h4>
                <hr/>
                <h4 class="text-info">Bình luận <code>{{ count($comments) }}</code> </h4>

                <form>
                    <textarea name="comment" class="form-control" id="comment-input" style="resize: none;">

                    </textarea>
                    <button type="button" onclick="postComment({{ $user_id.",".$post->id }})" class="btn btn-primary">Bình luận</button>
                </form>

                @foreach($comments as $c)
                    <div class="col-sm-12 comment-item">
                        <h6>Bởi <span class="text-primary">{{ $c->email }}</span></h6>
                        <p>
                            {{ $c->content }}
                        </p>
                        <code>{{ $c->created_at }}</code>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection