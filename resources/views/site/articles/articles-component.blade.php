<section class="bg-white p-4 lg:p-6 rounded-2xl">
    <div class="grid gap-4 grid-cols-2 sm:grid-cols-3 2md:grid-cols-4 lg:grid-cols-3 xl:grid-cols-4">
        @foreach($articles as $article)
            <a class="post-box" href="{{route('articles.show', $article->slug)}}">
                <img class="post-box__image" src="{{asset($article->image)}}" alt="">
                <div class="post-box__content">
                    <h3 class="post-box__title">{{$article->title}}</h3>
					<h5 class="post-category">{{ !empty($article->categories->title) ? $article->categories->title : 'بدون دسته بندی' }}</h5>
                    <div class="post-box__btn">مشاهده</div>
                </div>
            </a>
        @endforeach
    </div>
    {{ $articles->links('site.components.pagination') }}
</section>
