<div>
    <x-admin.subheader title="تیم فارس گیمر" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="تیم فارس گیمر" :mode="$mode">
                <x-admin.forms.input id="name" type="text" label="نام" required="true" wire:model.defer="name"/>
                <x-admin.forms.input id="task" type="text" label="سمت" required="true" wire:model.defer="task"/>
				<div class="form-group col-12">
				<div class="form-check form-check-inline">
					<input id="is_admin" type="checkbox" wire:model.defer="is_admin" {{  $is_admin == 1 ? 'checked' : '' }}>
					<label for="is_admin" class="form-check-label">
						مدیر اصلی
					</label>
					</div>
				</div>
                <x-admin.forms.lfm-standalone id="image" label="تصویر" :image="$image" required="true" wire:model="image"/>
            </x-admin.forms.form>
        </div>
    </div>
</div>