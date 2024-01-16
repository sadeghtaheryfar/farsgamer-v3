<?php $__currentLoopData = $form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($item['type'] == 'text'): ?>
        <?php if(FormBuilder::isVisible($form, $item)): ?>
            <div class="col-span-2 lg:col-span-<?php echo e($item['width']); ?>">
                <label for="<?php echo e($key); ?>" class="account-email"> <?php echo $item['label']; ?></label>
                <input id="<?php echo e($key); ?>" type="text" name="<?php echo e($item['name']); ?>" class="text-field"
                    placeholder="<?php echo e($item['placeholder']); ?>" wire:model.defer="form.<?php echo e($key); ?>.value">
                <?php $__errorArgs = ['form.' . $key . '.error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-red"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if($item['type'] == 'textArea'): ?>
        <?php if(FormBuilder::isVisible($form, $item)): ?>
            <div class="col-span-2 lg:col-span-<?php echo e($item['width']); ?>">
                <label for="<?php echo e($key); ?>" class="account-email"><?php echo $item['label']; ?></label>
                <textarea id="<?php echo e($key); ?>" name="<?php echo e($item['name']); ?>" class="text-field h-auto resize-y"
                    placeholder="<?php echo e($item['placeholder']); ?>" rows="4" wire:model.defer="form.<?php echo e($key); ?>.value"></textarea>
                <?php $__errorArgs = ['form.' . $key . '.error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-red"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if($item['type'] == 'select'): ?>
        <?php if(FormBuilder::isVisible($form, $item)): ?>
            <div class="col-span-2 lg:col-span-<?php echo e($item['width']); ?>">
                <label for="<?php echo e($key); ?>" class="account-email"><?php echo $item['label']; ?></label>
                <select id="<?php echo e($key); ?>" name="<?php echo e($item['name']); ?>" class="text-field h-auto resize-y"
                    wire:model="form.<?php echo e($key); ?>.value">
                    <option value="">انتخاب کنید...</option>
                    <?php $__currentLoopData = $item['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($option['value']); ?>"><?php echo e($option['value']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['form.' . $key . '.error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-red"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if($item['type'] == 'range'): ?>
        <?php if(FormBuilder::isVisible($form, $item)): ?>
            <div class="col-span-2 lg:col-span-<?php echo e($item['width']); ?>">
                <label for="<?php echo e($key); ?>" class="account-email"><?php echo $item['label']; ?></label>
                <input id="<?php echo e($key); ?>" type="number" min="<?php echo e($item['options'][0]['value'] ?? 0); ?>"
                    max="<?php echo e(end($item['options'])['value'] ?? 1); ?>" name="<?php echo e($item['name']); ?>" class="text-field"
                    placeholder="<?php echo e($item['placeholder']); ?>" wire:model="form.<?php echo e($key); ?>.value"
                    list="list<?php echo e($key); ?>">
                <?php $__errorArgs = ['form.' . $key . '.error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-red"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if($item['type'] == 'radio'): ?>
        <?php if(FormBuilder::isVisible($form, $item)): ?>
            <div class="col-span-2 lg:col-span-<?php echo e($item['width']); ?>">
                <div class="flex items-center gap-4 flex-wrap">
                    <p><?php echo $item['label']; ?></p>
                    <div class="flex items-center gap-4">
                        <?php $__currentLoopData = $item['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyRadio => $radio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="flex items-center gap-1 cursor-pointer mb-0"><?php echo e($radio['value']); ?>

                                <input type="radio" name="<?php echo e($item['name']); ?>" value="<?php echo e($radio['value']); ?>"
                                    wire:model="form.<?php echo e($key); ?>.value"><?php echo e($radio['value']); ?>

                            </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php $__errorArgs = ['form.' . $key . '.error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-red"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if($item['type'] == 'customRadio'): ?>
        <?php if(FormBuilder::isVisible($form, $item)): ?>
            <div class="col-span-2 lg:col-span-<?php echo e($item['width']); ?>">
                <label class="mb-2"><?php echo $item['label']; ?></label>
                <div class="flex flex-wrap justify-center gap-2 lg:flex lg:justify-start">
                    <?php $__currentLoopData = $item['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyRadio => $radio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label for="<?php echo e($key); ?>-<?php echo e($keyRadio); ?>"
                            class="radiobox account-category-btn <?php echo e($radio['value'] == $item['value'] ? 'radiobox--active' : ''); ?>"><?php echo e($radio['value']); ?>

                            <input id="<?php echo e($key); ?>-<?php echo e($keyRadio); ?>" class="account-category-btn__field"
                                type="radio" name="account-category" value="<?php echo e($radio['value']); ?>"
                                wire:model="form.<?php echo e($key); ?>.value"
                                <?php echo e(key_exists('value', $item) && $radio['value'] == $item['value'] ? 'checked' : ''); ?>>
                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php $__errorArgs = ['form.' . $key . '.error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-red"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if($item['type'] == 'speedPlus'): ?>
        <?php if(FormBuilder::isVisible($form, $item)): ?>
            <div class="col-span-2 lg:col-span-<?php echo e($item['width']); ?>">
                <div class="flex items-center gap-4 flex-wrap">
                    <p><?php echo $item['label']; ?></p>
                    <div class="flex items-center gap-4">
                        <?php $__currentLoopData = $item['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyRadio => $radio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="flex items-center gap-1 cursor-pointer mb-0">
                                <input type="radio" name="<?php echo e($item['name']); ?>" value="<?php echo e($radio['value']); ?>"
                                    wire:model="form.<?php echo e($key); ?>.value"><?php echo e($radio['value']); ?>

                            </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php $__errorArgs = ['form.' . $key . '.error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-red"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if($item['type'] == 'paragraph'): ?>
        <?php if(FormBuilder::isVisible($form, $item)): ?>
            <div class="col-span-2 lg:col-span-<?php echo e($item['width']); ?>">
                <div class="flex items-center gap-4 flex-wrap">
                    <?php echo $item['label']; ?>

                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/components/products/form-builder.blade.php ENDPATH**/ ?>