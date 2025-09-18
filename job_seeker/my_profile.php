<?php
session_start();
include 'include/config.php';
// Logged in user ka ID
$user_id = $_SESSION['user_id'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">

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
                        <!-- add content here -->
                        <div class="userccount">
                            <div class="formpanel mt0">
                                <script>
                                    var elements = document.querySelectorAll('.popmessage, .bgoverlay');

                                    if (elements.length > 0) {
                                        setTimeout(function() {
                                            elements.forEach(function(element) {
                                                element.style.display = 'none';
                                            });
                                        }, 5000);
                                    }
                                </script>
                                <!-- Personal Information -->
                                <?php
                               
                                // Fetch existing profile data
                                $profile = mysqli_query($conn, "SELECT * FROM job_seeker_profiles WHERE user_id='$user_id' LIMIT 1");
                                $data = mysqli_fetch_assoc($profile);
                                ?>

                                <form method="POST" action="save_profile_sql.php" accept-charset="UTF-8" class="form" enctype="multipart/form-data">

                                    <input type="hidden" name="user_id" value="<?= $user_id ?>">

                                    <h5>Account Information</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="formrow">
                                                <label>Email</label>
                                                <input class="form-control" id="email" name="email" type="text"
                                                    value="<?= htmlspecialchars($data['email'] ?? '') ?>" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="formrow">
                                                <label>Password</label>
                                                <input class="form-control" id="password" name="password" type="password"
                                                    value="<?= htmlspecialchars($data['password'] ?? '') ?>" placeholder="Password">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h5>Personal Information</h5>
                                    <div class="row p-2 g-1">
                                        <div class="col-md-6 pe-3">
                                            <div class="userimgupbox bg-white p-5">
                                                <div class="imagearea text-center">
                                                    <label class="fw-semibold">Profile Image <span>*</span></label>
                                                    <img src="uploads/profile/<?= $data['profile_image'] ?? 'default.png' ?>"
                                                        style="max-width:100px; max-height:100px;" alt="Profile">
                                                </div>
                                                <div class="formrow">
                                                    <label class="btn btn-light bg-transparent w-100 p-2 text-uppercase"
                                                        style="border: 2px dashed #ccc;">
                                                        <i class="fas fa-upload"></i> Select Profile Image
                                                        <input type="file" name="image" id="image" style="display:none;">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 ps-4">
                                            <div class="userimgupbox bg-white p-5">
                                                <div class="imagearea text-center">
                                                    <label class="fw-semibold">Cover Photo</label>
                                                    <img src="uploads/cover/<?= $data['cover_images'] ?? 'default_cover.png' ?>"
                                                        style="max-width:200px; max-height:90px;" alt="Cover">
                                                </div>
                                                <div class="formrow">
                                                    <label class="btn btn-light bg-transparent w-100 p-2 text-uppercase"
                                                        style="border: 2px dashed #ccc;">
                                                        <i class="fas fa-upload"></i> Select Cover Photo
                                                        <input type="file" name="cover_image" id="cover_image" style="display:none;">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label>First Name <span>*</span></label>
                                            <input class="form-control" name="first_name" type="text"
                                                value="<?= htmlspecialchars($data['first_name'] ?? '') ?>" placeholder="First Name">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Last Name <span>*</span></label>
                                            <input class="form-control" name="last_name" type="text"
                                                value="<?= htmlspecialchars($data['last_name'] ?? '') ?>" placeholder="Last Name">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nick Name</label>
                                            <input class="form-control" name="middle_name" type="text"
                                                value="<?= htmlspecialchars($data['middle_name'] ?? '') ?>" placeholder="Nick Name">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Gender <span>*</span></label>
                                            <select class="form-control" name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male" <?= ($data['gender'] ?? '') == 'Male' ? 'selected' : '' ?>>Male</option>
                                                <option value="Female" <?= ($data['gender'] ?? '') == 'Female' ? 'selected' : '' ?>>Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Marital Status <span>*</span></label>
                                            <select class="form-control" name="marital_status">
                                                <option value="">Select</option>
                                                <option value="Single" <?= ($data['marital_status'] ?? '') == 'Single' ? 'selected' : '' ?>>Single</option>
                                                <option value="Married" <?= ($data['marital_status'] ?? '') == 'Married' ? 'selected' : '' ?>>Married</option>
                                                <option value="Divorced" <?= ($data['marital_status'] ?? '') == 'Divorced' ? 'selected' : '' ?>>Divorced</option>
                                                <option value="Widow/er" <?= ($data['marital_status'] ?? '') == 'Widow/er' ? 'selected' : '' ?>>Widow/er</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Country</label>
                                            <input class="form-control" name="country" type="text"
                                                value="<?= htmlspecialchars($data['country'] ?? '') ?>" placeholder="Country">
                                        </div>
                                        <div class="col-md-3">
                                            <label>State</label>
                                            <input class="form-control" name="state" type="text"
                                                value="<?= htmlspecialchars($data['state'] ?? '') ?>" placeholder="State">
                                        </div>
                                        <div class="col-md-3">
                                            <label>City</label>
                                            <input class="form-control" name="city" type="text"
                                                value="<?= htmlspecialchars($data['city'] ?? '') ?>" placeholder="City">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Nationality</label>
                                            <input class="form-control" name="nationality" type="text"
                                                value="<?= htmlspecialchars($data['nationality'] ?? '') ?>" placeholder="Nationality">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Date of Birth</label>
                                            <input class="form-control" name="date_of_birth" type="date"
                                                value="<?= htmlspecialchars($data['date_of_birth'] ?? '') ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Phone</label>
                                            <input class="form-control" name="phone" type="text"
                                                value="<?= htmlspecialchars($data['phone'] ?? '') ?>" placeholder="Phone">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Mobile</label>
                                            <input class="form-control" name="mobile_num" type="text"
                                                value="<?= htmlspecialchars($data['mobile_num'] ?? '') ?>" placeholder="Mobile">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Street Address</label>
                                            <textarea class="form-control" name="street_address" rows="3"
                                                placeholder="Street Address"><?= htmlspecialchars($data['street_address'] ?? '') ?></textarea>
                                        </div>
                                    </div>

                                    <hr>
                                    <h5>Career Information</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Job Experience</label>
                                            <input class="form-control" name="job_experience" type="text"
                                                value="<?= htmlspecialchars($data['job_experience'] ?? '') ?>" placeholder="Job Experience">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Career Level</label>
                                            <input class="form-control" name="career_level" type="text"
                                                value="<?= htmlspecialchars($data['career_level'] ?? '') ?>" placeholder="Career Level">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Industry</label>
                                            <input class="form-control" name="industry" type="text"
                                                value="<?= htmlspecialchars($data['industry'] ?? '') ?>" placeholder="Industry">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Functional Area</label>
                                            <input class="form-control" name="functional_area" type="text"
                                                value="<?= htmlspecialchars($data['functional_area'] ?? '') ?>" placeholder="Functional Area">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Salary Currency</label>
                                            <input class="form-control" name="salary_currency" type="text"
                                                value="<?= htmlspecialchars($data['salary_currency'] ?? '') ?>" placeholder="Currency">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Current Salary</label>
                                            <input class="form-control" name="current_salary" type="text"
                                                value="<?= htmlspecialchars($data['current_salary'] ?? '') ?>" placeholder="Current Salary">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Expected Salary</label>
                                            <input class="form-control" name="expected_salary" type="text"
                                                value="<?= htmlspecialchars($data['expected_salary'] ?? '') ?>" placeholder="Expected Salary">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <h5>Summary</h5>
                                        <div class="col-md-12">
                                            <textarea class="form-control" name="summary" rows="5"
                                                placeholder="Profile Summary"><?= htmlspecialchars($data['summary'] ?? '') ?></textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label>
                                                <input type="checkbox" name="is_subscribed" <?= ($data['is_subscribed'] ?? 0) ? 'checked' : '' ?>>
                                                Subscribe to Newsletter
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary w-100">Update Profile and Save</button>
                                        </div>
                                    </div>
                                </form>




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
    <script src="assets/js/bootstrap3-typeahead.min.js" type="text/javascript"></script>

    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>

    <script>
        $("#profile_form").on("submit", function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: "save_profile_sql.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    let response = JSON.parse(res);
                    alert(response.message);
                    location.reload();
                }
            });
        });
    </script>

</body>




</html>




<!-- first -->
<div class="col-md-6">
    <div class="formrow mb-3">
        <label class="mb-0" for="">Country <span>*</span></label>
        <select class="form-control" id="country_id" name="country_id">
            <option value="">Select Country</option>
            <option value="1">Afghanistan</option>
            <option value="2">Albania</option>
            <option value="3">Algeria</option>
            <option value="4">American Samoa</option>
            <option value="5">Andorra</option>
            <option value="6">Angola</option>
            <option value="7">Anguilla</option>
            <option value="8">Antarctica</option>
            <option value="9">Antigua And Barbuda</option>
            <option value="10">Argentina</option>
            <option value="11">Armenia</option>
            <option value="12">Aruba</option>
            <option value="13">Australia</option>
            <option value="14">Austria</option>
            <option value="15">Azerbaijan</option>
            <option value="16">Bahamas The</option>
            <option value="17">Bahrain</option>
            <option value="18">Bangladesh</option>
            <option value="19">Barbados</option>
            <option value="20">Belarus</option>
            <option value="21">Belgium</option>
            <option value="22">Belize</option>
            <option value="23">Benin</option>
            <option value="24">Bermuda</option>
            <option value="25">Bhutan</option>
            <option value="26">Bolivia</option>
            <option value="27">Bosnia and Herzegovina</option>
            <option value="28">Botswana</option>
            <option value="29">Bouvet Island</option>
            <option value="30">Brazil</option>
            <option value="31">British Indian Ocean Territory</option>
            <option value="32">Brunei</option>
            <option value="33">Bulgaria</option>
            <option value="34">Burkina Faso</option>
            <option value="35">Burundi</option>
            <option value="36">Cambodia</option>
            <option value="37">Cameroon</option>
            <option value="38">Canada</option>
            <option value="39">Cape Verde</option>
            <option value="40">Cayman Islands</option>
            <option value="41">Central African Republic</option>
            <option value="42">Chad</option>
            <option value="43">Chile</option>
            <option value="44">China</option>
            <option value="45">Christmas Island</option>
            <option value="46">Cocos (Keeling) Islands</option>
            <option value="47">Colombia</option>
            <option value="48">Comoros</option>
            <option value="49">Republic Of The Congo</option>
            <option value="50">Democratic Republic Of The Congo</option>
            <option value="51">Cook Islands</option>
            <option value="52">Costa Rica</option>
            <option value="53">Cote D'Ivoire (Ivory Coast)</option>
            <option value="54">Croatia (Hrvatska)</option>
            <option value="55">Cuba</option>
            <option value="56">Cyprus</option>
            <option value="57">Czech Republic</option>
            <option value="58">Denmark</option>
            <option value="59">Djibouti</option>
            <option value="60">Dominica</option>
            <option value="61">Dominican Republic</option>
            <option value="62">East Timor</option>
            <option value="63">Ecuador</option>
            <option value="64">Egypt</option>
            <option value="65">El Salvador</option>
            <option value="66">Equatorial Guinea</option>
            <option value="67">Eritrea</option>
            <option value="68">Estonia</option>
            <option value="69">Ethiopia</option>
            <option value="70">External Territories of Australia</option>
            <option value="71">Falkland Islands</option>
            <option value="72">Faroe Islands</option>
            <option value="73">Fiji Islands</option>
            <option value="74">Finland</option>
            <option value="75">France</option>
            <option value="76">French Guiana</option>
            <option value="77">French Polynesia</option>
            <option value="78">French Southern Territories</option>
            <option value="79">Gabon</option>
            <option value="80">Gambia The</option>
            <option value="81">Georgia</option>
            <option value="82">Germany</option>
            <option value="83">Ghana</option>
            <option value="84">Gibraltar</option>
            <option value="85">Greece</option>
            <option value="86">Greenland</option>
            <option value="87">Grenada</option>
            <option value="88">Guadeloupe</option>
            <option value="89">Guam</option>
            <option value="90">Guatemala</option>
            <option value="91">Guernsey and Alderney</option>
            <option value="92">Guinea</option>
            <option value="93">Guinea-Bissau</option>
            <option value="94">Guyana</option>
            <option value="95">Haiti</option>
            <option value="96">Heard and McDonald Islands</option>
            <option value="97">Honduras</option>
            <option value="98">Hong Kong S.A.R.</option>
            <option value="99">Hungary</option>
            <option value="100">Iceland</option>
            <option value="101">India</option>
            <option value="102">Indonesia</option>
            <option value="103">Iran</option>
            <option value="104">Iraq</option>
            <option value="105">Ireland</option>
            <option value="106">Israel</option>
            <option value="107">Italy</option>
            <option value="108">Jamaica</option>
            <option value="109">Japan</option>
            <option value="110">Jersey</option>
            <option value="111">Jordan</option>
            <option value="112">Kazakhstan</option>
            <option value="113">Kenya</option>
            <option value="114">Kiribati</option>
            <option value="115">Korea North</option>
            <option value="116">Korea South</option>
            <option value="117">Kuwait</option>
            <option value="118">Kyrgyzstan</option>
            <option value="119">Laos</option>
            <option value="120">Latvia</option>
            <option value="121">Lebanon</option>
            <option value="122">Lesotho</option>
            <option value="123">Liberia</option>
            <option value="124">Libya</option>
            <option value="125">Liechtenstein</option>
            <option value="126">Lithuania</option>
            <option value="127">Luxembourg</option>
            <option value="128">Macau S.A.R.</option>
            <option value="129">Macedonia</option>
            <option value="130">Madagascar</option>
            <option value="131">Malawi</option>
            <option value="132">Malaysia</option>
            <option value="133">Maldives</option>
            <option value="134">Mali</option>
            <option value="135">Malta</option>
            <option value="136">Man (Isle of)</option>
            <option value="137">Marshall Islands</option>
            <option value="138">Martinique</option>
            <option value="139">Mauritania</option>
            <option value="140">Mauritius</option>
            <option value="141">Mayotte</option>
            <option value="142">Mexico</option>
            <option value="143">Micronesia</option>
            <option value="144">Moldova</option>
            <option value="145">Monaco</option>
            <option value="146">Mongolia</option>
            <option value="147">Montserrat</option>
            <option value="148">Morocco</option>
            <option value="149">Mozambique</option>
            <option value="150">Myanmar</option>
            <option value="151">Namibia</option>
            <option value="152">Nauru</option>
            <option value="153">Nepal</option>
            <option value="154">Netherlands Antilles</option>
            <option value="155">Netherlands The</option>
            <option value="156">New Caledonia</option>
            <option value="157">New Zealand</option>
            <option value="158">Nicaragua</option>
            <option value="159">Niger</option>
            <option value="160">Nigeria</option>
            <option value="161">Niue</option>
            <option value="162">Norfolk Island</option>
            <option value="163">Northern Mariana Islands</option>
            <option value="164">Norway</option>
            <option value="165">Oman</option>
            <option value="166">Pakistan</option>
            <option value="167">Palau</option>
            <option value="168">Palestinian Territory Occupied</option>
            <option value="169">Panama</option>
            <option value="170">Papua new Guinea</option>
            <option value="171">Paraguay</option>
            <option value="172">Peru</option>
            <option value="173">Philippines</option>
            <option value="174">Pitcairn Island</option>
            <option value="175">Poland</option>
            <option value="176">Portugal</option>
            <option value="177">Puerto Rico</option>
            <option value="178">Qatar</option>
            <option value="179">Reunion</option>
            <option value="180">Romania</option>
            <option value="181">Russia</option>
            <option value="182">Rwanda</option>
            <option value="183">Saint Helena</option>
            <option value="184">Saint Kitts And Nevis</option>
            <option value="185">Saint Lucia</option>
            <option value="186">Saint Pierre and Miquelon</option>
            <option value="187">Saint Vincent And The Grenadines</option>
            <option value="188">Samoa</option>
            <option value="189">San Marino</option>
            <option value="190">Sao Tome and Principe</option>
            <option value="191">Saudi Arabia</option>
            <option value="192">Senegal</option>
            <option value="193">Serbia</option>
            <option value="194">Seychelles</option>
            <option value="195">Sierra Leone</option>
            <option value="196">Singapore</option>
            <option value="197">Slovakia</option>
            <option value="198">Slovenia</option>
            <option value="199">Smaller Territories of the UK</option>
            <option value="200">Solomon Islands</option>
            <option value="201">Somalia</option>
            <option value="202">South Africa</option>
            <option value="203">South Georgia</option>
            <option value="204">South Sudan</option>
            <option value="205">Spain</option>
            <option value="206">Sri Lanka</option>
            <option value="207">Sudan</option>
            <option value="208">Suriname</option>
            <option value="209">Svalbard And Jan Mayen Islands</option>
            <option value="210">Swaziland</option>
            <option value="211">Sweden</option>
            <option value="212">Switzerland</option>
            <option value="213">Syria</option>
            <option value="214">Taiwan</option>
            <option value="215">Tajikistan</option>
            <option value="216">Tanzania</option>
            <option value="217">Thailand</option>
            <option value="218">Togo</option>
            <option value="219">Tokelau</option>
            <option value="220">Tonga</option>
            <option value="221">Trinidad And Tobago</option>
            <option value="222">Tunisia</option>
            <option value="223">Turkey</option>
            <option value="224">Turkmenistan</option>
            <option value="225">Turks And Caicos Islands</option>
            <option value="226">Tuvalu</option>
            <option value="227">Uganda</option>
            <option value="228">Ukraine</option>
            <option value="229">United Arab Emirates</option>
            <option value="230">United Kingdom</option>
            <option value="231" selected="selected">United States of America</option>
            <option value="232">United States Minor Outlying Islands</option>
            <option value="233">Uruguay</option>
            <option value="234">Uzbekistan</option>
            <option value="235">Vanuatu</option>
            <option value="236">Vatican City State (Holy See)</option>
            <option value="237">Venezuela</option>
            <option value="238">Vietnam</option>
            <option value="239">Virgin Islands (British)</option>
            <option value="240">Virgin Islands (US)</option>
            <option value="241">Wallis And Futuna Islands</option>
            <option value="242">Western Sahara</option>
            <option value="243">Yemen</option>
            <option value="244">Yugoslavia</option>
            <option value="245">Zambia</option>
            <option value="246">Zimbabwe</option>
            <option value="990"></option>
        </select>
    </div>
</div>
<!-- first -->

<!-- second start -->
<div class="col-md-3">
    <div class="formrow mb-3">
        <label class="mb-0" for="">State <span>*</span></label>
        <span id="state_dd"><select id="state_id" class="form-control" name="state_id">
                <option value="">Select State</option>
                <option value="3919">Alabama</option>
                <option value="3920">Alaska</option>
                <option value="3921">Arizona</option>
                <option value="3922">Arkansas</option>
                <option value="3923">Byram</option>
                <option value="3924">California</option>
                <option value="3925">Cokato</option>
                <option value="3926">Colorado</option>
                <option value="3927">Connecticut</option>
                <option value="3928">Delaware</option>
                <option value="3929">District of Columbia</option>
                <option value="3930">Florida</option>
                <option value="3931">Georgia</option>
                <option value="3932">Hawaii</option>
                <option value="3933">Idaho</option>
                <option value="3934">Illinois</option>
                <option value="3935">Indiana</option>
                <option value="3936">Iowa</option>
                <option value="3937">Kansas</option>
                <option value="3938">Kentucky</option>
                <option value="3939">Louisiana</option>
                <option value="3940">Lowa</option>
                <option value="3941">Maine</option>
                <option value="3942">Maryland</option>
                <option value="3943">Massachusetts</option>
                <option value="3944">Medfield</option>
                <option value="3945">Michigan</option>
                <option value="3946">Minnesota</option>
                <option value="3947">Mississippi</option>
                <option value="3948">Missouri</option>
                <option value="3949">Montana</option>
                <option value="3950">Nebraska</option>
                <option value="3951">Nevada</option>
                <option value="3952">New Hampshire</option>
                <option value="3953">New Jersey</option>
                <option value="3954">New Jersy</option>
                <option value="3955">New Mexico</option>
                <option value="3956">New York</option>
                <option value="3957">North Carolina</option>
                <option value="3958">North Dakota</option>
                <option value="3959">Ohio</option>
                <option value="3960">Oklahoma</option>
                <option value="3961">Ontario</option>
                <option value="3962">Oregon</option>
                <option value="3963">Pennsylvania</option>
                <option value="3964">Ramey</option>
                <option value="3965">Rhode Island</option>
                <option value="3966">South Carolina</option>
                <option value="3967">South Dakota</option>
                <option value="3968">Sublimity</option>
                <option value="3969">Tennessee</option>
                <option value="3970">Texas</option>
                <option value="3971">Trimble</option>
                <option value="3972">Utah</option>
                <option value="3973">Vermont</option>
                <option value="3974">Virginia</option>
                <option value="3975" selected="selected">Washington</option>
                <option value="3976">West Virginia</option>
                <option value="3977">Wisconsin</option>
                <option value="3978">Wyoming</option>
            </select></span>
    </div>
</div>
<!-- second -->

<!-- third start -->
<div class="col-md-3">
    <div class="formrow mb-3">
        <label class="mb-0" for="">City <span>*</span></label>
        <span id="city_dd"><select id="city_id" class="form-control" name="city_id">
                <option value="">Select City</option>
                <option value="46766">Aberdeen</option>
                <option value="46767">Airway Heights</option>
                <option value="46768">Alderwood Manor</option>
                <option value="46769">Anacortes</option>
                <option value="46770">Arlington</option>
                <option value="46771">Auburn</option>
                <option value="46772" selected="selected">Bainbridge Island</option>
                <option value="46773">Battle Ground</option>
                <option value="46774">Bellevue</option>
                <option value="46775">Bellingham</option>
                <option value="46776">Bingen</option>
                <option value="46777">Blaine</option>
                <option value="46778">Bothell</option>
                <option value="46779">Bremerton</option>
                <option value="46780">Bryn Mawr-Skyway</option>
                <option value="46781">Buckley</option>
                <option value="46782">Burien</option>
                <option value="46783">Burlington</option>
                <option value="46784">Camano Island</option>
                <option value="46785">Camas</option>
                <option value="46786">Cascade-Fairwood</option>
                <option value="46787">Centralia</option>
                <option value="46788">Chehalis</option>
                <option value="46789">Cheney</option>
                <option value="46790">Clear Lake</option>
                <option value="46791">Colbert</option>
                <option value="46792">Cottage Lake</option>
                <option value="46793">Covington-Sawyer-Wilderness</option>
                <option value="46794">Des Moines</option>
                <option value="46795">Duvall</option>
                <option value="46796">East Hill-Meridian</option>
                <option value="46797">East Renton Highlands</option>
                <option value="46798">East Wenatchee Bench</option>
                <option value="46799">Eastsound</option>
                <option value="46800">Eatonville</option>
                <option value="46801">Edgewood-North Hill</option>
                <option value="46802">Edmonds</option>
                <option value="46803">Elk Plain</option>
                <option value="46804">Ellensburg</option>
                <option value="46805">Enumclaw</option>
                <option value="46806">Esperance</option>
                <option value="46807">Everett</option>
                <option value="46808">Evergreen</option>
                <option value="46809">Fairchild</option>
                <option value="46810">Federal Way</option>
                <option value="46811">Ferndale</option>
                <option value="46812">Fircrest</option>
                <option value="46813">Ford</option>
                <option value="46814">Fort Lewis</option>
                <option value="46815">Friday Harbor</option>
                <option value="46816">Gig Harbor</option>
                <option value="46817">Graham</option>
                <option value="46818">Harbour Pointe</option>
                <option value="46819">Inglewood-Finn Hill</option>
                <option value="46820">Issaquah</option>
                <option value="46821">Kelso</option>
                <option value="46822">Kenmore</option>
                <option value="46823">Kennewick</option>
                <option value="46824">Kent</option>
                <option value="46825">Kingsgate</option>
                <option value="46826">Kirkland</option>
                <option value="46827">Lacey</option>
                <option value="46828">Lake Serene-North Lynnwood</option>
                <option value="46829">Lakeland North</option>
                <option value="46830">Lakeland South</option>
                <option value="46831">Lakewood</option>
                <option value="46832">Longview</option>
                <option value="46833">Lynnwood</option>
                <option value="46834">Martha Lake</option>
                <option value="46835">Marysville</option>
                <option value="46836">Mercer Island</option>
                <option value="46837">Minnehaha</option>
                <option value="46838">Monroe</option>
                <option value="46839">Moses Lake</option>
                <option value="46840">Mossyrock</option>
                <option value="46841">Mount Vernon</option>
                <option value="46842">Mountlake Terrace</option>
                <option value="46843">Mukilteo</option>
                <option value="46844">Newport Hills</option>
                <option value="46845">North City-Ridgecrest</option>
                <option value="46846">North Creek</option>
                <option value="46847">North Marysville</option>
                <option value="46848">Oak Harbor</option>
                <option value="46849">Ocean Shores</option>
                <option value="46850">Olympia</option>
                <option value="46851">Opportunity</option>
                <option value="46852">Orchards South</option>
                <option value="46853">Orting</option>
                <option value="46854">Paine Field-Lake Stickney</option>
                <option value="46855">Parkland</option>
                <option value="46856">Pasco</option>
                <option value="46857">Picnic Point-North Lynnwood</option>
                <option value="46858">Pine Lake</option>
                <option value="46859">Port Angeles</option>
                <option value="46860">Port Hadlock</option>
                <option value="46861">Port Ludlow</option>
                <option value="46862">Port Orchard</option>
                <option value="46863">Poulsbo</option>
                <option value="46864">Pullman</option>
                <option value="46865">Puyallup</option>
                <option value="46866">Redmond</option>
                <option value="46867">Renton</option>
                <option value="46868">Republic</option>
                <option value="46869">Richland</option>
                <option value="46870">Riverton-Boulevard Park</option>
                <option value="46871">Sahalee</option>
                <option value="46872">Salmon Creek</option>
                <option value="46873">Sammamish</option>
                <option value="46874">SeaTac</option>
                <option value="46875">Seattle</option>
                <option value="46876">Seattle Hill-Silver Firs</option>
                <option value="46877">Sedro Woolley</option>
                <option value="46878">Shelton</option>
                <option value="46879">Shoreline</option>
                <option value="46880">Silverdale</option>
                <option value="46881">Snohomish</option>
                <option value="46882">South Hill</option>
                <option value="46883">South Prairie</option>
                <option value="46884">South Seattle</option>
                <option value="46885">Spanaway</option>
                <option value="46886">Spokane</option>
                <option value="46887">Sumas</option>
                <option value="46888">Sumner</option>
                <option value="46889">Sunnyside</option>
                <option value="46890">Tacoma</option>
                <option value="46891">Tukwila</option>
                <option value="46892">Tumwater</option>
                <option value="46893">University Place</option>
                <option value="46894">Vancouver</option>
                <option value="46895">Vashon</option>
                <option value="46896">Walla Walla</option>
                <option value="46897">Washougal</option>
                <option value="46898">Wenatchee</option>
                <option value="46899">West Lake Stevens</option>
                <option value="46900">White Center</option>
                <option value="46901">White Salmon</option>
                <option value="46902">White Swan</option>
                <option value="46903">Woodinville</option>
                <option value="46904">Yakima</option>
                <option value="46905">Yelm</option>
            </select></span>
    </div>
</div>
<!-- third -->

<!-- four start -->
<div class="col-md-6">
    <div class="formrow mb-3">
        <label class="mb-0" for="">Nationality <span>*</span></label>
        <select class="form-control" id="nationality_id" name="nationality_id">
            <option value="">Select Nationality</option>
            <option value="230">British</option>
            <option value="231" selected="selected">Americans</option>
            <option value="1">Afghans</option>
            <option value="2">Albanians</option>
            <option value="3">Algerians</option>
            <option value="4">Americans</option>
            <option value="5">Andorrans</option>
            <option value="6">Angolans</option>
            <option value="7">Anguilla</option>
            <option value="8">Antarctica</option>
            <option value="9">Antiguans and Barbudans</option>
            <option value="10">Argentines</option>
            <option value="11">Armenians</option>
            <option value="12">Arubans</option>
            <option value="13">Australians</option>
            <option value="14">Austrians</option>
            <option value="15">Azerbaijanis</option>
            <option value="16">Bahamians</option>
            <option value="17">Bahrainis</option>
            <option value="18">Bangladeshis</option>
            <option value="19">Barbadians</option>
            <option value="20">Belarusians</option>
            <option value="21">Belgians</option>
            <option value="22">Belizeans</option>
            <option value="23">Beninese</option>
            <option value="24">Bermudians</option>
            <option value="25">Bhutanese</option>
            <option value="26">Bolivians</option>
            <option value="27">Bosnians and Herzegovinians</option>
            <option value="28">Botswana</option>
            <option value="29">Bouvet Island</option>
            <option value="30">Brazilians</option>
            <option value="31">British Indian Ocean Territory</option>
            <option value="32">Bruneians</option>
            <option value="33">Bulgarians</option>
            <option value="34">Burkinabés</option>
            <option value="35">Burundians</option>
            <option value="36">Cambodians</option>
            <option value="37">Cameroonians</option>
            <option value="38">Canadians</option>
            <option value="39">Cape Verde</option>
            <option value="40">Cayman Islands</option>
            <option value="41">Central African Republic</option>
            <option value="42">Chadians</option>
            <option value="43">Chileans</option>
            <option value="44">Chinese</option>
            <option value="45">Christmas Island</option>
            <option value="46">Cocos (Keeling) Islands</option>
            <option value="47">Colombians</option>
            <option value="48">Comorians</option>
            <option value="49">Congolese</option>
            <option value="50">Congolese</option>
            <option value="51">Cook Islands</option>
            <option value="52">Costa Ricans</option>
            <option value="53">Cote D'Ivoire (Ivory Coast)</option>
            <option value="54">Croatians</option>
            <option value="55">Cubans</option>
            <option value="56">Cypriots</option>
            <option value="57">Czechs</option>
            <option value="58">Danes</option>
            <option value="59">Djiboutians</option>
            <option value="60">Dominicans (Commonwealth)</option>
            <option value="61">Dominicans (Republic)</option>
            <option value="62">East Timorese</option>
            <option value="63">Ecuadorians</option>
            <option value="64">Egyptians</option>
            <option value="65">El Salvadorian</option>
            <option value="66">Equatoguineans</option>
            <option value="67">Eritreans</option>
            <option value="68">Estonians</option>
            <option value="69">Ethiopians</option>
            <option value="70">External Territories of Australia</option>
            <option value="71">Falkland Islanders</option>
            <option value="72">Faroese</option>
            <option value="73">Fijians</option>
            <option value="74">Finns</option>
            <option value="75">French citizens</option>
            <option value="76">French citizens</option>
            <option value="77">French citizens</option>
            <option value="78">French citizens</option>
            <option value="79">Gabonese</option>
            <option value="80">Gambians</option>
            <option value="81">Georgians</option>
            <option value="82">Germans</option>
            <option value="83">Ghanaians</option>
            <option value="84">Gibraltarians</option>
            <option value="85">Greeks</option>
            <option value="86">Greenlander</option>
            <option value="87">Grenadians</option>
            <option value="88">Guadeloupe</option>
            <option value="89">Guam</option>
            <option value="90">Guatemalans</option>
            <option value="91">Guernsey and Alderney</option>
            <option value="92">Guineans</option>
            <option value="93">Guinea-Bissau nationals</option>
            <option value="94">Guyanese</option>
            <option value="95">Haitians</option>
            <option value="96">Heard and McDonald Islands</option>
            <option value="97">Hondurans</option>
            <option value="98">Hong Kongers</option>
            <option value="99">Hungarians</option>
            <option value="100">Icelanders</option>
            <option value="101">Indians</option>
            <option value="102">Indonesians</option>
            <option value="103">Iranians</option>
            <option value="104">Iraqis</option>
            <option value="105">Irish</option>
            <option value="106">Israelis</option>
            <option value="107">Italians</option>
            <option value="108">Jamaicans</option>
            <option value="109">Japanese</option>
            <option value="110">Jersey</option>
            <option value="111">Jordanians</option>
            <option value="112">Kazakhs</option>
            <option value="113">Kenyans</option>
            <option value="114">Kiribati</option>
            <option value="115">Koreans</option>
            <option value="116">Koreans</option>
            <option value="117">Kuwaitis</option>
            <option value="118">Kyrgyzs</option>
            <option value="119">Lao</option>
            <option value="120">Latvians</option>
            <option value="121">Lebanese</option>
            <option value="122">Lesotho</option>
            <option value="123">Liberians</option>
            <option value="124">Libyans</option>
            <option value="125">Liechtensteiners</option>
            <option value="126">Lithuanians</option>
            <option value="127">Luxembourgers</option>
            <option value="128">Macao</option>
            <option value="129">Macedonians</option>
            <option value="130">Malagasy</option>
            <option value="131">Malawians</option>
            <option value="132">Malaysians</option>
            <option value="133">Maldivians</option>
            <option value="134">Malians</option>
            <option value="135">Maltese</option>
            <option value="136">Manx</option>
            <option value="137">Marshallese</option>
            <option value="138">Martinique</option>
            <option value="139">Mauritians</option>
            <option value="140">Mauritanians</option>
            <option value="141">Mayotte</option>
            <option value="142">Mexicans</option>
            <option value="143">Micronesians</option>
            <option value="144">Moldovans</option>
            <option value="145">Monégasque</option>
            <option value="146">Mongolians</option>
            <option value="147">Montenegrins</option>
            <option value="148">Moroccans</option>
            <option value="149">Mozambicans</option>
            <option value="150">Myanmar</option>
            <option value="151">Namibians</option>
            <option value="152">Naurans</option>
            <option value="153">Nepalese</option>
            <option value="154">Netherlands Antilles</option>
            <option value="155">Netherlands The</option>
            <option value="156">New Caledonia</option>
            <option value="157">New Zealanders</option>
            <option value="158">Nicaraguans</option>
            <option value="159">Nigeriens</option>
            <option value="160">Nigerians</option>
            <option value="161">Niue</option>
            <option value="162">Norfolk Island</option>
            <option value="163">Northern Mariana Islands</option>
            <option value="164">Norwegians</option>
            <option value="165">Omani</option>
            <option value="166">Pakistanis</option>
            <option value="167">Palauans</option>
            <option value="168">Palestinians</option>
            <option value="169">Panamanians</option>
            <option value="170">Papua New Guineans</option>
            <option value="171">Paraguayans</option>
            <option value="172">Peruvians</option>
            <option value="173">Philippinos</option>
            <option value="174">Pitcairn Island</option>
            <option value="175">Poles</option>
            <option value="176">Portuguese</option>
            <option value="177">Puerto Ricans</option>
            <option value="178">Qatari</option>
            <option value="179">Réunionnais</option>
            <option value="180">Romanians</option>
            <option value="181">Russians</option>
            <option value="182">Rwandans</option>
            <option value="183">Saint Helena</option>
            <option value="184">Saint Kitts and Nevis</option>
            <option value="185">Saint Lucians</option>
            <option value="186">Saint Pierre and Miquelon</option>
            <option value="187">Saint Vincent And The Grenadines</option>
            <option value="188">Samoans</option>
            <option value="189">San Marino</option>
            <option value="190">São Tomé and Príncipe</option>
            <option value="191">Saudis</option>
            <option value="192">Senegalese</option>
            <option value="193">Serbs</option>
            <option value="194">Seychellois</option>
            <option value="195">Sierra Leoneans</option>
            <option value="196">Singaporeans</option>
            <option value="197">Slovaks</option>
            <option value="198">Slovenes</option>
            <option value="199">Smaller Territories of the UK</option>
            <option value="200">Solomon Islanders</option>
            <option value="201">Somalis</option>
            <option value="202">South Africans</option>
            <option value="203">South Georgia</option>
            <option value="204">South Sudan</option>
            <option value="205">Spaniards</option>
            <option value="206">Sri Lankans</option>
            <option value="207">Sudanese</option>
            <option value="208">Surinamese</option>
            <option value="209">Svalbard And Jan Mayen Islands</option>
            <option value="210">Swazi</option>
            <option value="211">Swedes</option>
            <option value="212">Swiss</option>
            <option value="213">Syrians</option>
            <option value="214">Taiwanese</option>
            <option value="215">Tajik</option>
            <option value="216">Tanzanians</option>
            <option value="217">Thais</option>
            <option value="218">Togolese</option>
            <option value="219">Tokelau</option>
            <option value="220">Tongans</option>
            <option value="221">Trinidadians</option>
            <option value="222">Tunisians</option>
            <option value="223">Turks</option>
            <option value="224">Turkmenistan</option>
            <option value="225">Turks And Caicos Islands</option>
            <option value="226">Tuvaluans</option>
            <option value="227">Ugandans</option>
            <option value="228">Ukrainians</option>
            <option value="229">Emirati</option>
            <option value="232">Americans</option>
            <option value="233">Uruguayans</option>
            <option value="234">Uzbeks</option>
            <option value="235">Vanuatuans</option>
            <option value="236">Vatican City State (Holy See)</option>
            <option value="237">Venezuelans</option>
            <option value="238">Vietnamese</option>
            <option value="239">Virgin Islands (British)</option>
            <option value="240">Virgin Islands (US)</option>
            <option value="241">Wallis And Futuna Islands</option>
            <option value="242">Western Sahara</option>
            <option value="243">Yemenis</option>
            <option value="244">Yugoslavian</option>
            <option value="245">Zambians</option>
            <option value="246">Zimbabweans</option>
            <option value="990"></option>
        </select>
    </div>
</div>
<!-- four end -->

<!-- five start -->
<div class="col-md-6">
    <div class="formrow mb-3">
        <label class="mb-0" for="">Job Experience <span>*</span></label>
        <select class="form-control" id="job_experience_id" name="job_experience_id">
            <option value="">Select Experience</option>
            <option value="11">Fresh</option>
            <option value="12">Less Than 1 Year</option>
            <option value="1">1 Year</option>
            <option value="3">2 years</option>
            <option value="4">3 years</option>
            <option value="5">4 years</option>
            <option value="6">5 years</option>
            <option value="7" selected="selected">6 years</option>
            <option value="8">7 years</option>
            <option value="9">8 years</option>
            <option value="10">9 years</option>
            <option value="2">10 years</option>
            <option value="52">11 years</option>
            <option value="54">12 Years</option>
            <option value="55">13 Years</option>
            <option value="56">14 Years</option>
            <option value="57">15 Years</option>
            <option value="58">16 Years</option>
            <option value="59">17 Years</option>
            <option value="60">18 Years</option>
            <option value="61">19 Years</option>
            <option value="62">20 Years</option>
            <option value="63">21 Years</option>
            <option value="64">22 years</option>
            <option value="65">23 years</option>
            <option value="66">24 Years</option>
            <option value="67">25 Years</option>
            <option value="68">26 Years</option>
            <option value="69">27 Years</option>
            <option value="70">28 Years</option>
            <option value="71">29 Years</option>
            <option value="72">30 years</option>
            <option value="73">31 Years</option>
            <option value="74">32 Years</option>
            <option value="75">33 Years</option>
            <option value="76">34 Years</option>
            <option value="77">35 Years</option>
            <option value="78">36 Years</option>
            <option value="79">37 Years</option>
            <option value="80">38 Years</option>
            <option value="81">39 Years</option>
            <option value="82">40 Years</option>
            <option value="83">41 Years</option>
            <option value="84">42 Years</option>
            <option value="85">43 Years</option>
            <option value="86">44 Years</option>
            <option value="87">45 Years</option>
            <option value="88">46 Years</option>
            <option value="89">47 Years</option>
            <option value="90">48 Years</option>
            <option value="91">49 Years</option>
            <option value="92">50 Years</option>
            <option value="93">51 Years</option>
            <option value="94">52 Years</option>
            <option value="95">53 Years</option>
            <option value="96">54 Years</option>
            <option value="97">55 Years</option>
            <option value="98">56 Years</option>
            <option value="99">57 Years</option>
            <option value="100">58 Years</option>
            <option value="101">59 Years</option>
            <option value="102">60 Years</option>
            <option value="103">61 Years</option>
            <option value="104">62 Years</option>
            <option value="105">63 Years</option>
            <option value="106">64 Years</option>
            <option value="107">65 Years</option>
            <option value="108">66 Years</option>
            <option value="109">67 Years</option>
            <option value="110">68 Years</option>
            <option value="111">70 Years</option>
            <option value="112"></option>
        </select>
    </div>
</div>
<!-- five -->

<!-- six start -->
<div class="col-md-6">
    <div class="formrow mb-3">
        <label class="mb-0" for="">Select Industry <span>*</span></label>
        <select class="form-control" id="industry_id" name="industry_id">
            <option value="">Select Industry</option>
            <option value="8">Accounting/Taxation</option>
            <option value="7" selected="selected">Advertising/PR</option>
            <option value="13">Agriculture/Fertilizer/Pesticide</option>
            <option value="53">Apparel/Clothing</option>
            <option value="33">Architecture/Interior Design</option>
            <option value="20">Arts / Entertainment</option>
            <option value="31">AutoMobile</option>
            <option value="58">Aviation</option>
            <option value="3">Banking/Financial Services</option>
            <option value="34">BPO</option>
            <option value="21">Broadcasting</option>
            <option value="22">Business Development</option>
            <option value="30">Call Center</option>
            <option value="12">Chemicals</option>
            <option value="17">Construction/Cement/Metals</option>
            <option value="49">Consultants</option>
            <option value="41">Courier/Logistics</option>
            <option value="57">Distribution and Logistics</option>
            <option value="11">Education/Training</option>
            <option value="28">Electronics</option>
            <option value="29">Engineering</option>
            <option value="35">Event Management</option>
            <option value="32">Fashion</option>
            <option value="4">Fast Moving Consumer Goods (FMCG)</option>
            <option value="54">Food &amp; Beverages</option>
            <option value="36">Gems &amp; Jewelery</option>
            <option value="37">Government</option>
            <option value="38">Health &amp; Fitness</option>
            <option value="39">Healthcare/Hospital/Medical</option>
            <option value="40">Hospitality</option>
            <option value="15">Hotel Management / Restaurants</option>
            <option value="48">Importers/ Distributors/Exporters</option>
            <option value="1">Information Technology</option>
            <option value="6">Insurance / Takaful</option>
            <option value="52">Investments</option>
            <option value="19">Law Firms/Legal</option>
            <option value="10">Manufacturing</option>
            <option value="18">Media/Communications</option>
            <option value="16">Mining/Oil &amp; Gas/Petroleum</option>
            <option value="27">N.G.O./Social Services</option>
            <option value="50">Packaging</option>
            <option value="51">Personal Care and Services</option>
            <option value="5">Pharmaceuticals/Clinical Research</option>
            <option value="42">Power/Energy</option>
            <option value="47">Project Management</option>
            <option value="23">Publishing/Printing</option>
            <option value="44">Real Estate/Property</option>
            <option value="43">Recruitment/Employment Firms</option>
            <option value="26">Retail</option>
            <option value="45">Security/Law Enforcement</option>
            <option value="25">Services</option>
            <option value="46">Shipping/Marine</option>
            <option value="2">Telecommunication/ISP</option>
            <option value="9">Textiles/Garments</option>
            <option value="55">Tiles &amp; Ceramics</option>
            <option value="24">Travel/Tourism/Transportation</option>
            <option value="56">Warehousing</option>
        </select>
    </div>
</div>
<!-- six -->

<!-- seven start -->
<div class="col-md-6">
    <div class="formrow mb-3">
        <label class="mb-0" for="">Functional Area <span>*</span></label>
        <select class="form-control" id="functional_area_id" name="functional_area_id">
            <option value="">Select Functional Area</option>
            <option value="640">Other</option>
            <option value="654"></option>
            <option value="633" selected="selected">Information Technology</option>
            <option value="634">Management and Manufacturing</option>
            <option value="637">Engineering and Information Technology</option>
            <option value="638">Health Care Provider</option>
            <option value="636">Accounting/Auditing and Finance</option>
            <option value="641">Administrative</option>
            <option value="639">Sales and Business Development</option>
            <option value="1">Accountant</option>
            <option value="2">Accounts, Finance &amp; Financial Services</option>
            <option value="3">Admin</option>
            <option value="4">Admin Operation</option>
            <option value="5">Administration</option>
            <option value="6">Administration Clerical</option>
            <option value="7">Advertising</option>
            <option value="8">Advertising</option>
            <option value="9">Advertisment</option>
            <option value="10">Architects &amp; Construction</option>
            <option value="11">Architecture</option>
            <option value="12">Bank Operation</option>
            <option value="13">Business Development</option>
            <option value="14">Business Management</option>
            <option value="15">Business Systems Analyst</option>
            <option value="16">Clerical</option>
            <option value="17">Client Services &amp; Customer Support</option>
            <option value="18">Computer Hardware</option>
            <option value="19">Computer Networking</option>
            <option value="20">Consultant</option>
            <option value="21">Content Writer</option>
            <option value="22">Corporate Affairs</option>
            <option value="23">Creative Design</option>
            <option value="24">Creative Writer</option>
            <option value="25">Customer Support</option>
            <option value="26">Data Entry</option>
            <option value="27">Data Entry Operator</option>
            <option value="28">Database Administration (DBA)</option>
            <option value="29">Development</option>
            <option value="30">Distribution &amp; Logistics</option>
            <option value="31">Education &amp; Training</option>
            <option value="32">Electronics Technician</option>
            <option value="33">Engineering</option>
            <option value="34">Engineering Construction</option>
            <option value="35">Executive Management</option>
            <option value="36">Executive Secretary</option>
            <option value="37">Field Operations</option>
            <option value="38">Front Desk Clerk</option>
            <option value="39">Front Desk Officer</option>
            <option value="40">Graphic Design</option>
            <option value="41">Hardware</option>
            <option value="42">Health &amp; Medicine</option>
            <option value="43">Health &amp; Safety</option>
            <option value="44">Health Care</option>
            <option value="45">Health Related</option>
            <option value="46">Hotel Management</option>
            <option value="47">Hotel/Restaurant Management</option>
            <option value="48">HR</option>
            <option value="49">Human Resources</option>
            <option value="50">Import &amp; Export</option>
            <option value="51">Industrial Production</option>
            <option value="52">Installation &amp; Repair</option>
            <option value="53">Interior Designers &amp; Architects</option>
            <option value="54">Intern</option>
            <option value="55">Internship</option>
            <option value="56">Investment Operations</option>
            <option value="57">IT Security</option>
            <option value="58">IT Systems Analyst</option>
            <option value="59">Legal &amp; Corporate Affairs</option>
            <option value="60">Legal Affairs</option>
            <option value="61">Legal Research</option>
            <option value="62">Logistics &amp; Warehousing</option>
            <option value="63">Maintenance/Repair</option>
            <option value="64">Management Consulting</option>
            <option value="65">Management Information System (MIS)</option>
            <option value="66">Managerial</option>
            <option value="67">Manufacturing</option>
            <option value="68">Manufacturing &amp; Operations</option>
            <option value="69">Marketing</option>
            <option value="70">Marketing</option>
            <option value="71">Media - Print &amp; Electronic</option>
            <option value="72">Media &amp; Advertising</option>
            <option value="73">Medical</option>
            <option value="74">Medicine</option>
            <option value="75">Merchandising</option>
            <option value="76">Merchandising &amp; Product Management</option>
            <option value="77">Monitoring &amp; Evaluation (M&amp;E)</option>
            <option value="78">Network Administration</option>
            <option value="79">Network Operation</option>
            <option value="80">Online Advertising</option>
            <option value="81">Online Marketing</option>
            <option value="82">Operations</option>
            <option value="83">Planning</option>
            <option value="84">Planning &amp; Development</option>
            <option value="85">PR</option>
            <option value="86">Print Media</option>
            <option value="87">Printing</option>
            <option value="88">Procurement</option>
            <option value="89">Product Developer</option>
            <option value="90">Product Development</option>
            <option value="91">Product Development</option>
            <option value="92">Product Management</option>
            <option value="93">Production</option>
            <option value="94">Production &amp; Quality Control</option>
            <option value="95">Project Management</option>
            <option value="96">Project Management Consultant</option>
            <option value="97">Public Relations</option>
            <option value="98">QA</option>
            <option value="99">QC</option>
            <option value="100">Qualitative Research</option>
            <option value="101">Quality Assurance (QA)</option>
            <option value="102">Quality Control</option>
            <option value="103">Quality Inspection</option>
            <option value="104">Recruiting</option>
            <option value="105">Recruitment</option>
            <option value="106">Repair &amp; Overhaul</option>
            <option value="107">Research &amp; Development (R&amp;D)</option>
            <option value="108">Research &amp; Evaluation</option>
            <option value="109">Research &amp; Fellowships</option>
            <option value="110">Researcher</option>
            <option value="111">Restaurant Management</option>
            <option value="112">Retail</option>
            <option value="113">Retail &amp; Wholesale</option>
            <option value="114">Retail Buyer</option>
            <option value="115">Retail Buying</option>
            <option value="116">Retail Merchandising</option>
            <option value="117">Safety &amp; Environment</option>
            <option value="118">Sales</option>
            <option value="119">Sales &amp; Business Development</option>
            <option value="120">Sales Support</option>
            <option value="121">Search Engine Optimization (SEO)</option>
            <option value="122">Secretarial, Clerical &amp; Front Office</option>
            <option value="123">Security</option>
            <option value="124">Security &amp; Environment</option>
            <option value="125">Security Guard</option>
            <option value="126">SEM</option>
            <option value="127">SMO</option>
            <option value="128">Software &amp; Web Development</option>
            <option value="129">Software Engineer</option>
            <option value="130">Software Testing</option>
            <option value="131">Stores &amp; Warehousing</option>
            <option value="132">Supply Chain</option>
            <option value="133">Supply Chain Management</option>
            <option value="134">Systems Analyst</option>
            <option value="135">Teachers/Education, Training &amp; Development</option>
            <option value="136">Technical Writer</option>
            <option value="137">Tele Sale Representative</option>
            <option value="138">Telemarketing</option>
            <option value="139">Training &amp; Development</option>
            <option value="140">Transportation &amp; Warehousing</option>
            <option value="141">TSR</option>
            <option value="142">Typing</option>
            <option value="143">Warehousing</option>
            <option value="144">Web Developer</option>
            <option value="145">Web Marketing</option>
            <option value="146">Writer</option>
        </select>
    </div>
</div>
<!-- seven end -->