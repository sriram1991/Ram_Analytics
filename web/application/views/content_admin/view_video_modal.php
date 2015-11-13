                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h4>Video View<small><?php if(isset($resource_details)) echo $resource_details['resource_name']; ?></small></h4>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div id="video-player" class="video-player embed-responsive embed-responsive-16by9">
                        <h3> Loading Video .. </h3>
                    </div>
                    <!-- <div id="video-player" class="video-player embed-responsive embed-responsive-16by9">
                        <iframe src="/static/resource/captiva/"></iframe>
                    </div> -->
                </section><!-- /.content -->
                <!-- Content Header (Page footer) -->
                <script type="text/javascript">
                $(document).ready(function(){
                    // Load Video When Document is Ready
                    view_video_resource('<?php echo $resource_link; ?>');
                    // setTimeout(function() { view_video_resource('<?php echo $resource_link; ?>',500,300); }, 5000);
                });
                </script>
