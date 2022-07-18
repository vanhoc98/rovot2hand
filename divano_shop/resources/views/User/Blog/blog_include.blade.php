<div class="col-lg-3">

    <aside>

        <!--Box search-->

        <div class="box box-search">
            <input type="text" value="" class="form-control" placeholder="Tìm kiếm trên blog" />
            <button class="btn btn-primary btn-sm">Go!</button>
        </div>

        <!--Box categories-->

        <div class="box box-animated box-categories">
            <h5 class="title">Chuyên mục</h5>
            <ul>
                @foreach ($category as $cate)
                    <li class="{{ $detail != '' && $detail->blog_cate == $cate->category_id ? 'active' : '' }}"><a class="clickCate"
                            href="{{ route('categories.show', [$cate->category_slug,'action'=>'blog']) }}">{{ ucfirst($cate->category_name) }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!--Box posts-->

        <div class="box box-animated box-posts">
            <h5 class="title">Bài viết phổ biến</h5>
            <ul>
                @foreach ($popular as $pop)
                    <li>
                        <a href="{{ route('blog.show', [Str::slug($pop->blog_title), 'blog' => $pop->blog_id]) }}">
                            <span class="date">
                                @php
                                    $month = Carbon\Carbon::parse($pop->created_at)->format('M');
                                    $day = Carbon\Carbon::parse($pop->created_at)->format('d');
                                @endphp
                                <span>{{ $month }}</span>
                                <span>{{ $day }}</span>
                            </span>
                            <span class="text">{!! $pop->blog_title !!}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- <!--Box tags-->

                        <div class="box box-tags">
                            <h5 class="title">Bài viết phổ biến</h5>
                            <ul class="clearfix">
                                <li><a href="#" class="btn btn-outline-secondary btn-sm">Furniture</a></li>
                                <li><a href="#" class="btn btn-outline-secondary btn-sm">Interior</a></li>
                                <li><a href="#" class="btn btn-outline-secondary btn-sm">Living</a></li>
                                <li><a href="#" class="btn btn-outline-secondary btn-sm">Space</a></li>
                                <li><a href="#" class="btn btn-outline-secondary btn-sm">Modern</a></li>
                                <li><a href="#" class="btn btn-outline-secondary btn-sm">House</a></li>
                                <li><a href="#" class="btn btn-outline-secondary btn-sm">Guides</a></li>
                                <li><a href="#" class="btn btn-outline-secondary btn-sm">How to</a></li>
                                <li><a href="#" class="btn btn-outline-secondary btn-sm">Kitchen</a></li>
                            </ul>
                        </div> --}}

    </aside>

</div>
