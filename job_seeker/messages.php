<!DOCTYPE html>
<html lang="en">


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>TEF - Admin Dashboard Template</title>
    <?php include('include/source.html'); ?>
    <style>
        li a {
            text-decoration: none;
            color: black;
            list-style-type: none;
        }

        .jobcompany .company-logo {
            display: block;
            flex-shrink: 0;
        }

        .jobcompany .company-logo img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            object-fit: contain;
            border: 2px solid #ffffff;
        }
    </style>
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
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4">
                                <div class="card">
                                    <div class="body">
                                        <div id="plist" class="people-list">
                                            <div class="chat-search">
                                                <input type="text" class="form-control" placeholder="Search..." />
                                            </div>
                                            <!-- new -->
                                            <ul class="message-history list-unstyled">
                                                <li class="message-grid active bg-secondary" id="adactive9">
                                                    <a href="">
                                                        <div class="d-flex py-2 align-items-center">
                                                            <div class="jobcompany px-4">

                                                                <a href="" class="company-logo" title="Multimedia Design"><img src="https://www.sharjeelanjum.com/demos/jobsportal-update/company_logos/multimedia-design-1614272292-782.jpg" alt="Multimedia Design" title="Multimedia Design"> </a>
                                                            </div>
                                                           
                                                            <div class="user-name d-flex justify-content-between">
                                                                <div class="author pe-5 text-dark"> <span>Multimedia Design</span>
                                                                </div>
                                                                <div class="count-messages" style="color: blue;">
                                                                    0
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- <div class="m-b-20">
                                                <div id="chat-scroll">
                                                    <ul class="chat-list list-unstyled m-b-0">
                                                        <li class="clearfix active">
                                                            <img src="assets/img/users/user-4.png" alt="avatar">
                                                            <div class="about">
                                                                <div class="name">William Smith</div>
                                                                <div class="status">
                                                                    <i class="material-icons offline">fiber_manual_record</i>
                                                                    left 7 mins ago
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="clearfix ">
                                                            <img src="assets/img/users/user-1.png" alt="avatar">
                                                            <div class="about">
                                                                <div class="name">Martha Williams</div>
                                                                <div class="status">
                                                                    <i class="material-icons offline">fiber_manual_record</i>
                                                                    online
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="clearfix">
                                                            <img src="assets/img/users/user-2.png" alt="avatar">
                                                            <div class="about">
                                                                <div class="name">Joseph Clark</div>
                                                                <div class="status">
                                                                    <i class="material-icons online">fiber_manual_record</i>
                                                                    online
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="clearfix">
                                                            <img src="assets/img/users/user-3.png" alt="avatar">
                                                            <div class="about">
                                                                <div class="name">Nancy Taylor</div>
                                                                <div class="status">
                                                                    <i class="material-icons online">fiber_manual_record</i>
                                                                    online
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="clearfix">
                                                            <img src="assets/img/users/user-4.png" alt="avatar">
                                                            <div class="about">
                                                                <div class="name">Margaret Wilson</div>
                                                                <div class="status">
                                                                    <i class="material-icons online">fiber_manual_record</i>
                                                                    online
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="clearfix">
                                                            <img src="assets/img/users/user-5.png" alt="avatar">
                                                            <div class="about">
                                                                <div class="name">Joseph Jones</div>
                                                                <div class="status">
                                                                    <i class="material-icons offline">fiber_manual_record</i>
                                                                    left 30 mins ago
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="clearfix">
                                                            <img src="assets/img/users/user-1.png" alt="avatar">
                                                            <div class="about">
                                                                <div class="name">Jane Brown</div>
                                                                <div class="status">
                                                                    <i class="material-icons offline">fiber_manual_record</i>
                                                                    left 10 hours ago
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="clearfix">
                                                            <img src="assets/img/users/user-2.png" alt="avatar">
                                                            <div class="about">
                                                                <div class="name">Eliza Johnson</div>
                                                                <div class="status">
                                                                    <i class="material-icons online">fiber_manual_record</i>
                                                                    online
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-8">
                                <div class="card">
                                    <div class="chat">
                                        <div class="chat-header clearfix">
                                            <img src="assets/img/users/user-1.png" alt="avatar">
                                            <div class="chat-about">
                                                <div class="chat-with">Javeria Noor </div>
                                                <div class="chat-num-messages">2 new messages</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-box" id="mychatbox">
                                        <div class="card-body chat-content">
                                        </div>
                                        <div class="card-footer chat-form">
                                            <form id="chat-form">
                                                <input type="text" class="form-control" placeholder="Type a message">
                                                <button class="btn btn-primary">
                                                    <i class="far fa-paper-plane"></i>
                                                </button>
                                            </form>
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
    <script src="assets/js/page/chat.js"></script>
    <script src="assets/js/scripts.js"></script>

    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>

</body>


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->

</html>