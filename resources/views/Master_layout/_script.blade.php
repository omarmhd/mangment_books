<script src="{{asset('assets')}}/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{asset('assets')}}/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<script src="{{asset('assets')}}/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>

<script type="text/javascript" src="{{asset('assets')}}/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/jquery-mixitup/jquery.mixitup.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<script src="{{asset('assets')}}/global/scripts/metronic.js" type="text/javascript"></script>

<script src="{{asset('assets')}}/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/admin/pages/scripts/table-editable.js"></script>
<script src="{{asset('assets')}}/admin/pages/scripts/portfolio.js"></script>
<script src="{{asset('assets')}}/admin/pages/scripts/profile.js" type="text/javascript"></script>


<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        QuickSidebar.init(); // init quick sidebar
        Demo.init(); // init demo features
        TableEditable.init();
        Portfolio.init();

    });
</script>
