<div>
	<x-admin.subheader title="my language" :mode="$mode" :create="false"/>

    <div>
        <x-admin.forms.validation-errors/>
    </div>
   <div class="content d-flex flex-column-fluid">
        <div class="container">
			<x-admin.forms.form title="language" :mode="$mode">
			
				<x-admin.forms.dropdown id="language" label="select your language" :options="$langs" required="true" wire:model.defer="myLnag"/>
			</x-admin.forms.form>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteItem(id) {
            Swal.fire({
                title: 'حذف تنظیمات!',
                text: 'آیا از حذف تنظیمات اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                @this.call('delete', id)
                }
            })
        }
    </script>
@endpush