<div class="container py-10 2md:grid 2md:grid-cols-12 2md:gap-4 2md:items-start xl:gap-8 2xl:gap-12">
    <livewire:site.dashboard.sidebar/>

    <div class="p-4 rounded-2xl bg-white 2md:col-start-5 2md:col-end-13 xl:col-start-4 h-full">
        <div class="grid gap-4">
            @foreach($userNotifications as $item)
            <div class="comment">
                <div class="comment__head">
                    <div class="comment__info">
                        <!-- Date -->
                        <div class="comment__date">
                            <span class="comment__date-day">{{jalaliDate($item->created_at, '%d')}}</span>
                            <span class="comment__date-month">{{jalaliDate($item->created_at, '%B')}}</span>
                        </div>
                        <div class="comment__user">
                            <!-- user f and l name -->
                            <span class="comment__user-name">اعلان جدید</span>
                        </div>
                    </div>
                    <!-- Tags -->
                    <div class="comment__tags">
                        <span class="comment__tag text-primary">اطلاعیه شما</span>
                    </div>
                </div>
                <div class="comment__body">
                    <div class="comment__content">
                        <!-- actual content of the comment -->
                        <p class="comment__message">{{$item->note}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>