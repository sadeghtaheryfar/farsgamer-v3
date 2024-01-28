<div wire:init="$set('readyToLoad', true)">

    {{ Breadcrumbs::view('site.components.breadcrumb', 'articles.show', $article) }}

    {{--Article--}}
    <section class="P-4 overflow-hidden rounded-2xl bg-white lg:p-8">
        <div class="bg-gray-50 rounded-2xl grid gap-4 p-4 sm:flex sm:items-center">
            <img class="w-full rounded-2xl sm:w-52" src="{{asset($article->image)}}" alt="">
            <div class="grid gap-4 px-2 sm:h-full sm:content-between lg:py-2 lg:px-0">
                <h1 class="text-lg font-bold">{{$article->title}}</h1>
                <ul class="text-gray-500 text-sm">
                    <li>تاریخ: <span>{{jalaliDate($article->created_at, '%d %B %Y')}}</span></li>
                    <li>نویسنده: <span>مدیریت فارس گیمر</span></li>
                </ul>
            </div>
        </div>
        <div class="posttype-content__description mt-4 p-4 px-6 lg:px-2">
            {!! $article->description !!}
        </div>
    </section>

    <section class="posttype-content">
        <ul class="posttype-content__tabs">

            {{--Commetns--}}
            <li easytab-tab class="posttype-content__tab active">
                <a class="posttype-content__tab-link">
                    <i class="posttype-content__tab-icon icon-filter"></i>
                    <span>نظرات <span class="text-sm">{{"($commentsCount)"}}</span></span>
                </a>
            </li>
        </ul>
        <div>

            {{--Commetns--}}
            <div easytab-content class="active">
                <div class="posttype-content__comments">
                    @foreach($comments as $comment)
                        @include('site.components.products.comment')
                    @endforeach

                    {{-- @if(method_exists($comments, 'links'))
                        {{ $comments->links('site.components.load-more') }}
                    @endif --}}

                    <livewire:site.articles.article-create-comment :article="$article"/>
                </div>
            </div>
        </div>
    </section>
</div>
