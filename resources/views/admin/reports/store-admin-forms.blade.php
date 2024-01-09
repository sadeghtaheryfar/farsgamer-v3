<div>
    <x-admin.subheader title="فرم" :mode="$mode" :create="false"/>

    <div class="d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="فرم" :mode="$mode">
				
               
                	<div class="table-responsive">
                        <table class="table table-striped">
                           	<tr>
						    	<td>فرم گزارش</td>
                                <td>{{ $form->form_title }}</td>
                            </tr>
							<tr>
						    	<td>بازه زمانی</td>
                                <td>{{ $form->form_cron }}</td>
                            </tr>
							<tr>
						    	<td>کاربر</td>
                                <td>{{ $form->user->username }}</td>
                            </tr>
							<tr>
						    	<td>شماره گاربر</td>
                                <td>{{ $form->user->mobile }}</td>
                            </tr>
							<tr>
						    	<td>تاریخ ارسال</td>
                                <td>{{jalaliDate($form->created_at)}}</td>
                            </tr>
							<tr>
						    	<td>تاریخ ویرایش</td>
                                <td>{{jalaliDate($form->updated_at)}}</td>
                            </tr>
							<tr>
						    	<td>تاریخ پاسخ</td>
                                <td>{{ $form->answerd_at ? jalaliDate($form->answerd_at) : ''}}</td>
                            </tr>
                        </table>
                    </div>
               		<div class="form-group col-12">
						@if(sizeof($form->forms) > 0)
							<div class="row">
								<div class="form-group col-12 d-flex justify-content-between">
									<div>سوالات</div>
								</div>
								@foreach($form->forms as $form)
										@if(($form['type'] ?? '') != 'paragraph')
											<div class="form-group col-4">
												<td >{!! $form['label'] ?? '' !!}</td>
											</div>
											<div class="form-group col-6  p-0 m-0 ">
												<span class="copy_text p-0 m-0">
													{{$form['value'] ?? ''}}
												</span>
											</div>
										@endif
								@endforeach
							</div>
						@endif
					</div>
              

               	<x-admin.forms.dropdown id="status" label="وضعیت" :options="$data['status']" required="true" wire:model.defer="status"/>
				<x-admin.forms.textarea id="note" label="پیام"   wire:model.defer="note"/>


            </x-admin.forms.form>

        </div>
    </div>
</div>
