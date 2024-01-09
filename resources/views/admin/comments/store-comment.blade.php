<div>
    <x-admin.subheader title="نظر" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="نظر" :mode="$mode">
                <div class="col-12 mb-1">
                    @if(($this->model->commentable_type ?? '') == 'article')
                        <span>مقاله : </span>
                        <a href="{{route('admin.articles.store',
                        ['action'=>'edit', 'id' => $this->model->commentable->id])}}">{{$this->model->commentable->title}}</a>
                    @else
                        <span>محصول : </span>
                        <a href="{{route('admin.products.store',
                        ['action'=>'edit', 'id' => $this->model->commentable->id])}}">{{$this->model->commentable->title}}</a>
                    @endif
                </div>

                <x-admin.forms.textarea id="comment" label="نظر" required="true" rows="5" wire:model.defer="comment"/>
                <x-admin.forms.textarea id="answer" label="پاسخ" required="true" rows="5" wire:model.defer="answer"/>
                @if(($this->model->commentable_type ?? '') != 'article')
                    <x-admin.forms.dropdown id="rating" label="امتیاز" :options="[1=>1,2=>2,3=>3,4=>4,5=>5]" wire:model.defer="rating"/>
                @endif
                <x-admin.forms.checkbox id="is_confirmed" value="1" wire:model.defer="is_confirmed">تایید شده</x-admin.forms.checkbox>
            </x-admin.forms.form>

        </div>
    </div>
</div>