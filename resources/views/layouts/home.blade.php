<!doctype html>
<html lang="en">
<head>
    @include('temp.head')
    @yield('title')
    @livewireStyles
</head>


<body>
    <div class="dashboard-main-wrapper">
       
      @include('temp.nav')
        @include('temp.sidebar')
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                           @yield('breadcrumb')
                        </div>
                    </div>
                    <div class="ecommerce-widget">
                       @yield('content')
                    </div>

                </div>
            </div>
            @include('temp.footer')
        </div>
    </div>
    @include('temp.scripts')
    <script>

        Livewire.on('cerrar-modal',id => {
            alert("example")
             $("#update".id).modal('hide');
        })


        Livewire.on('alert_izito', data => {
            if (data[1] == 'success') {
                iziToast.success({
                    title: 'Actualizar!',
                    message: data[0],
                    position: 'bottomLeft',
                    transitionIn: 'fadeInRight',
                });
            }
            if (data[1] === 'dark') {
                iziToast.show({
                    title: 'Info!',
                    theme: 'dark',
                    message: data[0],
                    position: 'topRight',
                    // transitionIn: '  bounceInLeft',
                });
            }
            if (data[1] === 'info') {
                iziToast.info({
                    title: 'Guardar!',
                    message: data[0],
                    position: 'topRight',
                    // transitionIn: ' bounceInDown',
                });
            }
            if (data[1] === 'danger') {
                iziToast.error({
                    title: 'Eliminar!',
                    message: data[0]
                    // position: 'bottomRight',
                    // transitionIn: '  bounceInLeft',
                });
            }
            if (data[1] === 'warning') {
                iziToast.warning({
                    title: 'Advertencia',
                    message: data[0],
                    position: 'topLeft',
                    // transitionIn: ' fadeInDown',

                });
            }
        });
    </script>
    @livewireScripts



</body>
 
</html>