
<script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1400
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };
</script>


<script src="<?php echo e(asset('admin/plugins/global/plugins.bundle.js?v=7.0.6')); ?>"></script>
<script src="<?php echo e(asset('admin/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6')); ?>"></script>
<script src="<?php echo e(asset('admin/js/scripts.bundle.js?v=7.0.6')); ?>"></script>


<?php echo \Livewire\Livewire::scripts(); ?>

<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
<script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
<script src="<?php echo e(asset('vendor/laravel-filemanager/js/stand-alone-button.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugins/custom/datepicker/persian-date.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/plugins/custom/datepicker/persian-datepicker.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    Livewire.on('showModel', function (data) {
        const id = '#' + data + 'Modal'
        $(id).modal('show')
    })

    Livewire.on('hideModel', function (data) {
        const id = '#' + data + 'Modal'
        $(id).modal('hide')
    })

    Livewire.on('notify', data => {
        Swal.fire({
            toast: true,
            title: data.title,
            icon: data.icon,
            position: 'bottom-start',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    })
</script>
<?php echo $__env->yieldPushContent('scripts'); ?><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/admin/components/foot.blade.php ENDPATH**/ ?>