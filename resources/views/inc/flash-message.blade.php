<script>
    @if (Session::has('notification'))
        switch('{{ Session::get('notification')['type'] }}')
        {
            case 'info':
                toastr.info('{{ Session::get('notification')['message'] }}');
                break;
                                
            case 'warning':
                toastr.warning('{{ Session::get('notification')['message'] }}');
                break;
                        
            case 'success':
                toastr.success('{{ Session::get('notification')['message'] }}');
                break;
                        
            case 'error':
                toastr.error('{{ Session::get('notification')['message'] }}');
                break;
        }
    @endif 
       
</script>