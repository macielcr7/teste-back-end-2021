
        <script type="text/javascript" src="{{ asset('js/footer_all.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/select2/js/i18n/pt-BR.js') }}"></script>
        
        <script type="text/javascript" src="{{ asset('custom/custom.js') }}"></script>
        <script type="text/javascript" >

            $('.btn-cancel').click(function(){
                if(window.CHECK_UNLOAD==false){
                    window.CHECK_UNLOAD=true;
                }
            });
        </script>

        @yield('scripts')

        @if (session('messageSuccess'))
            <script type="text/javascript">
                setTimeout(function() {
                    notification("topright", "success", "fa fa-check-circle vd_green", window.__NOME_SISTEMA_AVISO, "{{ session('messageSuccess') }}");
                }, 500);
            </script>
        @endif
        @if (session('messageError'))
            <script type="text/javascript">
                setTimeout(function() {
                    notification("topright", "error", "fa fa-exclamation-circle vd_red", window.__NOME_SISTEMA_AVISO, "{{ session('messageError') }}");
                }, 500);
            </script>
        @endif
        @if (session('messageInfo'))
            <script type="text/javascript">
                setTimeout(function() {
                    notification("topright", "info", "fa fa-info-circle vd_blue", window.__NOME_SISTEMA_AVISO, "{{ session('messageInfo') }}");
                }, 500);
            </script>
        @endif
        @if (session('messageWarning'))
            <script type="text/javascript">
                setTimeout(function() {
                    notification("topright", "notify", "fa fa-exclamation-triangle vd_yellow", window.__NOME_SISTEMA_AVISO, "{!! session('messageWarning') !!}");
                }, 500);
            </script>
        @endif

        @if(isset($errors) and count($errors->all()) > 0)
            <script type="text/javascript">
                var errors = [];
                @foreach($errors->all() as $error)
                    errors.push('{{ $error }}');
                @endforeach

                setTimeout(function() {
                    notification("topright", "error", "fa fa-exclamation-circle vd_red", window.__NOME_SISTEMA_AVISO, errors.join('\n'));
                }, 500);
            </script>
        @endif
        <!-- Specific Page Scripts END -->
        <script type="text/javascript">
            $(document).bind("ajaxSend", function(){
                $('.blockUI').show();
            }).bind("ajaxComplete", function(){
                $('.blockUI').hide();
            });
            window.onbeforeunload = function(){
                if(window.CHECK_UNLOAD==false){
                    return false;
                }
                $('.blockUI .ball').addClass('s5');
                $('.blockUI .ball1').addClass('s5');
                $('.blockUI').show();
            }
            
            $('.blockUI').hide();
        </script>
    </body>
</html>