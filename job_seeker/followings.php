<!DOCTYPE html>
<html lang="en">


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>TEF - Admin Dashboard Template</title>
    <?php include('include/source.html'); ?>
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <!-- topbar start -->
            <?php include('include/topbar.php'); ?>
            <!-- topbar end -->
            <!-- sidebar start -->
            <?php include('include/sidebar.html'); ?>
            <!-- sidebar end -->
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <h3 class="text-dark text-center mb-4">My Followings</h3>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card card-primary">
                                    <div class="card-body">
                                        <div class="empint">
                                            <a href="" title="Multimedia Design" class="text-dark text-decoration-none">
                                                <div class="emptbox d-block text-center">
                                                    <div class="comimg w-25 mx-auto mb-2"><img src="./assets/img/multimedia-design-1614272292-782.jpg" alt="Multimedia Design" title="Multimedia Design" class="img-fluid"></div>
                                                    <div class="text-info-right">
                                                        <h4>Multimedia Design</h4>
                                                        <div class="indst fs-6">
                                                            Manufacturing
                                                        </div>
                                                        <div class="emloc py-2"><i class="fas fa-map-marker-alt"></i> Aurora</div>
                                                    </div>


                                                    <div class="cm-info-bottom bg-secondary w-50 mx-auto py-1 border rounded px-2"><span><i class="fas fa-briefcase"></i> 6 Open Jobs</span></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card 2 -->
                              <div class="col-lg-4">
                                <div class="card card-success">
                                    <div class="card-body">
                                        <div class="empint">
                                            <a href="" title="Multimedia Design" class="text-dark text-decoration-none">
                                                <div class="emptbox d-block text-center">
                                                    <div class="comimg w-25 mx-auto border rounded mb-2"><img src="./assets/img/web-design-studio-1536858894-23.jpg" alt="Multimedia Design" title="Multimedia Design" class="img-fluid"></div>
                                                    <div class="text-info-right">
                                                        <h4>Web Design Studio</h4>
                                                        <div class="indst fs-6">
                                                            Manufacturing
                                                        </div>
                                                        <div class="emloc py-2"><i class="fas fa-map-marker-alt"></i> Brighton</div>
                                                    </div>


                                                    <div class="cm-info-bottom bg-secondary w-50 mx-auto py-1 border rounded px-2"><span><i class="fas fa-briefcase"></i> 0 Open Jobs</span></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card 3 -->
                              <div class="col-lg-4">
                                <div class="card card-warning">
                                    <div class="card-body">
                                        <div class="empint">
                                            <a href="" title="Multimedia Design" class="text-dark text-decoration-none">
                                                <div class="emptbox d-block text-center">
                                                    <div class="comimg w-25 mx-auto border rounded mb-2"><img src="./assets/img/wave-media-1536855186-701.jpg" alt="Multimedia Design" title="Multimedia Design" class="img-fluid"></div>
                                                    <div class="text-info-right">
                                                        <h4>Wave Media </h4>
                                                        <div class="indst fs-6">
                                                            Manufacturing
                                                        </div>
                                                        <div class="emloc py-2"><i class="fas fa-map-marker-alt"></i> Aurora</div>
                                                    </div>


                                                    <div class="cm-info-bottom bg-secondary w-50 mx-auto py-1 border rounded px-2"><span><i class="fas fa-briefcase"></i> 6 Open Jobs</span></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="settingSidebar">
                    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                    </a>
                    <div class="settingSidebar-body ps-container ps-theme-default">
                        <div class=" fade show active">
                            <div class="setting-panel-header">Setting Panel
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Select Layout</h6>
                                <div class="selectgroup layout-color w-50">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                                        <span class="selectgroup-button">Light</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                                        <span class="selectgroup-button">Dark</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                                <div class="selectgroup selectgroup-pills sidebar-color">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Color Theme</h6>
                                <div class="theme-setting-options">
                                    <ul class="choose-theme list-unstyled mb-0">
                                        <li title="white" class="active">
                                            <div class="white"></div>
                                        </li>
                                        <li title="cyan">
                                            <div class="cyan"></div>
                                        </li>
                                        <li title="black">
                                            <div class="black"></div>
                                        </li>
                                        <li title="purple">
                                            <div class="purple"></div>
                                        </li>
                                        <li title="orange">
                                            <div class="orange"></div>
                                        </li>
                                        <li title="green">
                                            <div class="green"></div>
                                        </li>
                                        <li title="red">
                                            <div class="red"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                            id="mini_sidebar_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Mini Sidebar</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                            id="sticky_header_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Sticky Header</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                    <i class="fas fa-undo"></i> Restore Default
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- footer -->
            <?php include('include/footer.html'); ?>
            <!-- footer end -->
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
</body>


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->

</html>