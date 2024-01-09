<div>
	<x-admin.subheader title="زبان ها" :mode="$mode" :create="false"/>

    <div>
        <x-admin.forms.validation-errors/>
    </div>
   <div class="content d-flex flex-column-fluid">
        <div class="container">
			<x-admin.forms.form title="زبان" :mode="$mode">
			
            <div class="table-responsive">
						<table class="table table-bordered table table-striped">
							<thead>
								<th>#</th>
								<th>فارسی</th>
								<th>انگلیسی</th>
								<th>ارژانتینی</th>
								<th>عملیات</th>
							</thead>
							<tbody>
							@foreach($words as $key => $word)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td><x-admin.forms.input type="text" id="{{$key}}basic" placeholder="" label="" wire:model.defer="words.{{$key}}.basic"/></td>
									<td><x-admin.forms.input type="text" id="{{$key}}eng" placeholder="" label="" wire:model.defer="words.{{$key}}.eng"/></td>
									<td><x-admin.forms.input type="text" id="{{$key}}arg" placeholder="" label="" wire:model.defer="words.{{$key}}.arg"/></td>
									<td><x-admin.delete-table onclick="deleteItem({{$key}})"/></td>
								</tr>
							@endforeach
							
						</tbody>
						</table>
						<div class="form-group col-12">
				<button wire:click.prevent="addWord()" class="btn btn-light-primary font-weight-bolder btn-sm">افزودن</button>
			</div>
					</div>
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