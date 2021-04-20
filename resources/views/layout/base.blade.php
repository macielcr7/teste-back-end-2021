    @include('layout.header')

        <div class="vd_body">
            @include('layout.top_navigation')

            <div class="content">
                <div class="container">
                    <div class="vd_navbar vd_nav-width vd_navbar-tabs-menu vd_navbar-left ">
                        @include('layout.menu')                        
                    </div>
                    <!-- Middle Content Start -->

                    <div class="vd_content-wrapper">
                        <div class="vd_container">
                            <div class="vd_content clearfix">
                                @include('layout.breadcrumb')
                        
                                @yield('content')
                            </div>
                            <!-- .vd_container -->
                        </div>
                        <!-- .vd_content-wrapper -->
                        <!-- Middle Content End -->
                    </div>
                    <!-- .container -->
                </div>
                <!-- .content -->

                <!-- Footer Start -->
                <footer class="footer-2" id="footer">
                    <div class="vd_bottom ">
                        <div class="container">
                            <div class="row">
                                <div class=" col-xs-12">
                                    <div class="copyright text-center">
                                        {{ env('APP_NAME') }} |   
                                        {{ strtoupper(env('APP_ENV')) }}  |  
                                        BD: {{ env('DB_HOST') }}  
                                    </div>
                                </div>
                            </div>
                            <!-- row -->
                        </div>
                        <!-- container -->
                    </div>
                </footer>
                <!-- Footer END -->
            </div>

            <!-- .vd_body END  -->
            <a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> 
                <i class="fa  fa-angle-up"> </i> 
            </a>
            <!--
            <a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->
        </div>
        <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
    
    @include('layout.footer')

    <script type="text/javascript">
        $('.save-btn-2').click(function(){$('#submit_tipo').val('1');});
        $('.save-btn').click(function(){$('#submit_tipo').val('0');});

        $('body').on('dblclick', '.table tbody tr', function(){
            var btn = $(this).find('td.menu-action a[route][data-original-title="Editar"]');
            if(btn.length>0){
                window.location = btn.attr('href');
            }
        })
        .on('click', '.table tbody tr', function(){
            $(this).parents('.table').find('tbody tr').removeClass('td-active');
            $(this).addClass('td-active');
        });
    </script>