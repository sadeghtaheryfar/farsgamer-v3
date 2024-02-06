<section id="main-dashboard" class="flex-box flex-justify-space" style="align-items: normal;">
    <livewire:site.dashboard.sidebar />

    <section id="left-dashboard">
        @if (sizeof($comments) == 0 && sizeof($confirmedComments) == 0)
            <div class="grid justify-center items-center h-full p-4 py-8 lg:px-6 lg:py-12 text-center">
                <div class="grid gap-4">
                    <img class="w-60" src="{{ asset('site/svg/no-comments.svg') }}" alt="">
                    <p class="font-bold md:text-md lg:text-2xl text-red">نظری ثبت نکرده اید.</p>
                </div>
            </div>
        @else
            <div class="box-header-dash-comments flex-box flex-right">
                <div class="item-header-dash-comments header-dash-comments-active flex-box">
                    <span>در انتظار ثبت </span>

                    <span>({{ count($comments) }})</span>
                </div>

                <div class="item-header-dash-comments flex-box">
                    <span>نظرات من</span>

                    <span>({{ count($confirmedComments) }})</span>
                </div>
            </div>

            <div class="box-message-dash-comments">
                <div class="item-message-dash-comments">
                    @foreach ($comments as $item)
                        <div class="dashboard-comment-awaiting-approval bg-gray-50 rounded-2xl p-3"
                            x-data="{ open: false }">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    {{-- Image --}}
                                    <img class="w-20 h-20 rounded-xl" src="{{ asset($item->product->image ?? '') }}"
                                        alt="">
                                    {{-- Title --}}
                                    <h3 class="font-semibold">{{ $item->product->title ?? '' }}</h3>
                                </div>
                                <button
                                    class="bg-primary hover:bg-opacity-100 bg-opacity-10 w-8 h-8
                                 flex items-center justify-center group rounded-xl transition-colors duration-150 ease-in"
                                    @click="open = !open">
                                    <i class="icon-angle-down text-primary group-hover:text-white"></i>
                                </button>
                            </div>
                            <div class="mt-4" x-bind:class="{ 'collapse': !open }">
                                <livewire:site.dashboard.create-comments :orderId="$item->order_id" :productId="$item->product_id"
                                    :key="'comment-' . $item->id" />
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="item-message-dash-comments hide-item">
                    @foreach ($confirmedComments as $comment)
                        @include('site.components.products.comment')
                    @endforeach
                </div>
            </div>
        @endif
    </section>
</section>
