<div class="col-sm-3">
    <div class="list-group my-sidebar">
        @foreach($allCats as $cat)
        <a href="/social/cat?id={{ $cat->id }}" class="list-group-item list-group-item-danger">
            {{ $cat->title }}
        </a>
        @endforeach
    </div>
</div>