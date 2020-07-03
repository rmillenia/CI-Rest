        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="<?php echo base_url()?>assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url()?>assets/js/main.js"></script>


    <script src="<?php echo base_url()?>assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="<?php echo base_url()?>assets/js/dashboard.js"></script>
    <script src="<?php echo base_url()?>assets/js/widgets.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

            <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="Hello World"></script>

</body>
</html>

