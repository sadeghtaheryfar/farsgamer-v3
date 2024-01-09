<div>
   

    <div class="d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form :mode="$mode">
				
					
                	
               		<div class="col-12">
					   @if ($base_form->status != \App\Models\AdminForm::OK) 
							<div class="col-12 py-3 text-center">
								<img alt="Logo" class="mx-auto" src="http://container.elfiro.com/images/622df373b1c52.png">
							</div>
					   			@if($base_form->form->message)
									<p class="alert alert-warning">{{ $base_form->form->message }}</p>
								@endif

								@if($base_form->note && $base_form->status == \App\Models\AdminForm::REJECTED)
									<p class="alert alert-danger">{{ $base_form->note }}</p>
								@elseif($base_form->note)
									<p class="alert alert-info">{{ $base_form->note }}</p>
								@endif
							<div class="container border rounded my-2 text-right">
								<div class="row">
									<div class="col-md-12 fg_bg d-flex align-items-center justify-content-between py-3 text-white">
										<p class="m-0 ">نام کاربر :  {{ $base_form->user->full_name }}</p>
										<p class="m-0">{{ $base_form->form_title }}</p>
										<p class="m-0 border-left pr-5">تاریخ : {{jalaliDate($base_form->created_at)}}</p>
									</div>
									@foreach($form as $key => $item)
							
										@if($item['type'] == 'textArea')
											@if(FormBuilder::isVisible($form, $item))
											<div class="col-md-12 fg_border bg-white d-flex align-items-center py-4">
												<div class="form-group w-100">
													<label class="font-weight-bold" for="{{$key}}">{!! $item['label'] !!}</label>
													<textarea name="{{$item['name']}}" id="{{$key}}" class="form-control fg_border_inputs" placeholder="{{$item['placeholder']}}" rows="4" wire:model.defer="form.{{$key}}.value"></textarea>
													@error('form.'.$key.'.error')
													<small class="text-red">{{$message}}</small>
													@enderror
												</div>
											</div>
											@endif
										@endif
										
									@endforeach
									<div class="col-md-12 fg_border bg-white d-flex align-items-center justify-content-center py-2">
										<div class="text-center">
											<button wire:click="update()" style="
    width: 100px;
" class="btn text-white px-4 my-3 fg_bg">ثبت</button>
											<p class="font-weight-bold">"تمامی این گزارش به صورت محرمانه در اختیار مدیریت مجموعه قرار خواهد گرفت"</p>
										</div>
									</div>
								</div>
							</div>
						 
						@endif	 
						
					</div>


            </x-admin.forms.form>

        </div>
    </div>
</div>
