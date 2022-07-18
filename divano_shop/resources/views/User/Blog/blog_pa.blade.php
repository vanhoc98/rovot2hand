<div class="row">

    <!--Blog item-->
    @foreach ($blogs as $blog)
    <div class="col-md-6">
        <article>
            <a href="{{ route('blog.show',[Str::slug($blog->blog_title),'blog'=>$blog->blog_id]) }}" class="blog-link">
                <div class="image" style="background-image:url({{ asset('uploads/blog/'.$blog->blog_image) }})">
                    <img src="{{ asset('uploads/blog/'.$blog->blog_image) }}" alt="" />
                </div>
                <div class="entry entry-table">
                    <div class="date-wrapper">
                        @php
                            $month = Carbon\Carbon::parse($blog->created_at)->format('M');
                            $day = Carbon\Carbon::parse($blog->created_at)->format('d');
                            $year = Carbon\Carbon::parse($blog->created_at)->format('Y');
                        @endphp
                        <div class="date">
                            <span>{{ $month }}</span>
                            <strong>{{ $day }}</strong>
                            <span>{{ $year }}</span>
                        </div>
                    </div>
                    <div class="title">
                        <h2 class="h5">{{ $blog->blog_title }}</h2>
                    </div>
                </div>
            </a>
        </article>
    </div>
    @endforeach

</div>

<!--Pagination-->

<div class="pagination-wrapper">
    {!! $blogs->render('User.paginatoin') !!}
</div>
<style>
    .pagination-wrapper .pagination .page-item .page-link{
        width: 35px;
    }
</style>
