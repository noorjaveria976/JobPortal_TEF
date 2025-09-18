 <div class="card">
     <div class="card-header">
         <h4 onclick="showExperience();">Experience</h4>
         <button type="button" class="btn" data-toggle="modal" data-target="#experienceModal"><i class="fas fa-plus"></i>
         </button>
     </div>

     <div class="card-body">
         <?php
            $user_id = $_SESSION['user_id'];

            // Query with JOINs for readable names
            $query = mysqli_query($conn, "
                                    SELECT e.id, e.title, e.company, e.date_start, e.date_end, e.is_currently_working, e.description,
                                    c.country_name, s.state_name, ci.city_name
                                    FROM job_seeker_experiences e
                                    LEFT JOIN countries c ON e.country_id = c.id
                                    LEFT JOIN states s ON e.state_id = s.id
                                    LEFT JOIN cities ci ON e.city_id = ci.id
                                    WHERE e.user_id = '$user_id'
                                    ORDER BY e.id DESC
                                    ");
            ?>

         <div class="row">
             <?php
                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        $exp_id = $row['id'];
                        $title = htmlspecialchars($row['title']);
                        $company = htmlspecialchars($row['company']);
                        $city = htmlspecialchars($row['city_name']);
                        $country = htmlspecialchars($row['country_name']);
                        $date_start = !empty($row['date_start']) ? date('d M, Y', strtotime($row['date_start'])) : '';
                        $date_end = ($row['is_currently_working'] == 1) ? 'Present' : (!empty($row['date_end']) ? date('d M, Y', strtotime($row['date_end'])) : '');
                        $description = htmlspecialchars($row['description']);
                ?>
                     <div class="col-md-4 mb-3">
                         <div class="card h-100 shadow-sm">
                             <div class="card-body">
                                 <h5 class="card-title"><?php echo $title; ?></h5>
                                 <h6 class="card-subtitle mb-2 text-muted"><?php echo $company; ?></h6>
                                 <p class="card-text">
                                     <i class="fas fa-map-marker-alt"></i> <?php echo "$city - $country"; ?><br>
                                     <small><?php echo "$date_start - $date_end"; ?></small>
                                 </p>
                                 <p class="card-text"><?php echo $description; ?></p>
                             </div>
                             <div class="card-footer text-end">
                                 <a href="javascript:;" onclick="editExperience(<?php echo $exp_id; ?>);" class="text-primary me-2">
                                     <i class="fas fa-pencil-alt"></i>
                                 </a>
                                 <a href="delete_experience.php?id=<?php echo $exp_id; ?>"
                                     class="text-danger"
                                     onclick="return confirm('Delete this Experience?');">
                                     <i class="fas fa-times"></i>
                                 </a>
                             </div>
                         </div>
                     </div>
             <?php
                    }
                } else {
                    echo '<div class="col-12 text-center">No Experience Added Yet</div>';
                }
                ?>
         </div>
     </div>




 </div>



 <script>
     // Fetch Experiences
     function fetchExperiences() {
         $.get('fetch_experiences_sql.php', function(data) {
             const experiences = JSON.parse(data);
             let html = '';

             experiences.forEach(exp => {
                 const endDate = (exp.is_currently_working == 1) ? "Present" : (exp.date_end || "N/A");

                 html += `
             <li>
                 <span class="exdot"></span>
                 <div class="expbox" id="experience_${exp.id}">
                     <div class="d-flex">
                         <h4>${exp.title || ''}</h4>
                         <div class="cvnewbxedit ms-auto">
                             <a href="javascript:void(0);" onclick="editExperience(${exp.id});" class="text text-dark">
                                 <i class="fas fa-pencil-alt"></i>
                             </a> 
                             <a href="javascript:void(0);" onclick="delete_profile_experience(${exp.id});" class="text text-danger ms-2">
                                 <i class="fas fa-times"></i>
                             </a>
                         </div>
                     </div>
                     <div class="excity">
                         <i class="fas fa-map-marker-alt"></i> ${exp.city_name || ''} - ${exp.country_name || ''}
                     </div>
                     <div class="expcomp"><i class="fas fa-building"></i> ${exp.company || ''}</div>
                     <div class="expcomp"><i class="fas fa-calendar-alt"></i> From ${exp.date_start || ''} - ${endDate}</div>
                     <p>${exp.description || ''}</p>
                 </div>
             </li>
             `;
             });

             if (html === '') {
                 html = '<li><p>No experiences added yet.</p></li>';
             }

             $('#experience_div .experienceList').html(html);
         });
     }

     // Edit experience
     function editExperience(expId) {
         console.log("Experience ID:", expId);
         $.ajax({
             url: "get_experience_sql.php",
             type: "GET",
             data: {
                 id: expId
             },
             success: function(response) {
                 const data = JSON.parse(response);
                 if (data.success) {
                     // fill values
                     $('#experience_id').val(data.experience.id);
                     $('#title').val(data.experience.title);
                     $('#company').val(data.experience.company);
                     $('#experience_country_id').val(data.experience.country_id);
                     $('#experience_state_id').val(data.experience.state_id);
                     $('#city_id').val(data.experience.city_id);


                     $('#date_start').val(data.experience.date_start);
                     $('#date_end').val(data.experience.date_end);
                     $('input[name="is_currently_working"][value="' + data.experience.is_currently_working + '"]').prop('checked', true);
                     $('#description').val(data.experience.description);

                     // Show/Hide end date row according to radio
                     if (data.experience.is_currently_working == 1) {
                         $('#div_date_end').hide();
                     } else {
                         $('#div_date_end').show();
                     }

                     // Show modal
                     const modalEl = document.getElementById('experienceModal');
                     const modal = new bootstrap.Modal(modalEl);
                     modal.show();
                 } else {
                     alert('Experience not found!');
                 }
             }
         });
     }

     // Delete experience
     function delete_profile_experience(id) {
         if (confirm("Are you sure you want to delete this experience?")) {
             $.post("delete_experience_sql.php", {
                 id: id
             }, function(response) {
                 let res = JSON.parse(response);
                 if (res.success) {
                     fetchExperiences();
                 } else {
                     alert("Delete failed: " + res.message);
                 }
             });
         }
     }

     // Submit form (Add/Edit)
     function submitProfileExperienceForm() {
         const formData = $("#add_edit_profile_experience").serialize();

         $.post("save_experience_sql.php", formData, function(response) {
             let res = JSON.parse(response);

             if (res.success) {
                 // Refresh list
                 fetchExperiences();

                 // Close modal automatically
                 const modalEl = document.getElementById('experienceModal');
                 const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                 modal.hide();

                 // Reset form
                 $("#add_edit_profile_experience")[0].reset();
                 $('#experience_id').val(''); // clear hidden field
             } else {
                 alert("Error: " + res.message);
             }
         });
     }

     // On page load
     $(document).ready(function() {
         fetchExperiences();

         // Init datepickers
         $('.datepicker').datepicker({
             format: "yyyy-mm-dd",
             autoclose: true,
             todayHighlight: true
         });
     });
 </script>


 <li><span class="exdot"></span>
     <div class="expbox" id="experience_16">
         <div class="d-flex">
             <h4>UI UX Designer</h4>
             <div class="cvnewbxedit ms-auto"><a href="javascript:void(0);" onclick="showProfileExperienceEditModal(16,2554,29756);" class="text text-dark"><i class="fas fa-pencil-alt"></i></a> <a href="javascript:void(0);" onclick="delete_profile_experience(16);" class="text text-danger ms-2"><i class="fas fa-times"></i></a></div>
         </div>
         <div class="excity"><i class="fas fa-map-marker-alt"></i>Maltahohe - Namibia</div>
         <div class="expcomp"><i class="fas fa-building"></i>Amoka Int</div>
         <div class="expcomp"><i class="fas fa-calendar-alt"></i>From 13 Dec, 2009 - 07 Feb, 2012</div>
         <p>- This is just for testing experience details
             - This is just for testing experience details
             - This is just for testing experience details</p>

     </div>
 </li>