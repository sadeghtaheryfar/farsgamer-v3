<div class="container py-10 2md:grid 2md:grid-cols-12 2md:gap-4 2md:items-start xl:gap-8 2xl:gap-12">
    <livewire:site.dashboard.sidebar/>

    <div class="p-4 rounded-2xl bg-white 2md:col-start-5 2md:col-end-13 xl:col-start-4 h-full">
        @if(sizeof($comments) == 0 && sizeof($confirmedComments) == 0)
            <div class="grid justify-center items-center h-full p-4 py-8 lg:px-6 lg:py-12 text-center">
                <div class="grid gap-4">
                    <img class="w-60" src="{{asset('site/svg/no-comments.svg')}}" alt="">
                    <p class="font-bold md:text-md lg:text-2xl text-red">نظری ثبت نکرده اید.</p>
                </div>
            </div>
        @else
            <section class="dashboard-comments">

                <ul class="dashboard-comments__tabs">
                    <li easytab-tab class="dashboard-comments__tab active">در انتظار ثبت نظر ({{count($comments)}})</li>
                    <li easytab-tab class="dashboard-comments__tab">نظرات من ({{count($confirmedComments)}})</li>
                </ul>

                <div>
                    <div easytab-content class="active">
                        <div class="grid gap-4">
                            @foreach($comments as $item)
								
                                <div class="dashboard-comment-awaiting-approval bg-gray-50 rounded-2xl p-3" x-data="{open : false}">
                                  <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-4">
                                            {{-- Image --}}
                                            <img class="w-20 h-20 rounded-xl" src="{{asset($item->product->image ?? '')}}" alt="">
                                            {{-- Title --}}
                                            <h3 class="font-semibold leading-4">{{$item->product->title ?? '' }}</h3>
                                        </div>
                                        <button class="bg-primary hover:bg-opacity-100 bg-opacity-10 w-8 h-8
                                 flex items-center justify-center group rounded-xl transition-colors duration-150 ease-in" @click="open = !open">
                                            <i class="icon-angle-down text-primary group-hover:text-white"></i>
                                        </button>
                                    </div>
                                    <div class="mt-4" x-bind:class="{ 'collapse': !open }">
                                        <livewire:site.dashboard.create-comments :orderId="$item->order_id" :productId="$item->product_id" :key="'comment-'.$item->id"/>
                                    </div>
                                </div>
							
                            @endforeach
                        </div>
                    </div>

                    <div easytab-content>
                        <div class="grid gap-4">
                            @foreach($confirmedComments as $comment)
                                @include('site.components.products.comment')
                            @endforeach
                        </div>
                    </div>
                </div>

            </section>
        @endif
    </div>
</div>