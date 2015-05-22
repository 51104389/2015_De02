@extends('social.general')

@section('content')
    <div class = "col-sm-9" style="padding-bottom: 50px;">
        @foreach($allPosts as $post)
        <div class="row post-item">
            <div class="col-sm-3">
                <img src="http://positivepsychologyprogram.com/wp-content/uploads/2014/10/download-as-pdf.png" class="img-responsive" alt="Responsive image">
            </div>
            <div class="col-sm-8">
                <h3 class="text-primary">
                    <a href = "/social/post?id={{ $post->post_id }}">{{ $post->title }}</a>
                </h3>
                <p><strong>Mô tả:</strong> {{ substr($post->content, 0, 200).'...' }}
                    <a href = "/social/post?id={{ $post->post_id }}">đọc thêm</a>
                </p>
                <p><strong>Tạo bởi:</strong> {{ $post->email }}</p>
                <p><strong>Vào lúc:</strong> {{ $post->created_at }}</p>
            </div>
        </div>
        @endforeach
    </div>
@endsection