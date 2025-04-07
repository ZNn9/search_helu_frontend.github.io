<?php
// Debugging: Check if the file exists before including
if (!file_exists(__DIR__ . '/../shared/left_sidebar.php')) {
  echo "Error: left_sidebar.php not found!";
} else {
  include __DIR__ . '/../shared/left_sidebar.php';
}
?>

<body>
  <div class="wrapper">
    <div class="container">
      <!-- Debugging: Check if header.php exists -->
      <?php
      if (!file_exists(__DIR__ . '/../shared/header.php')) {
        echo "Error: header.php not found!";
      } else {
        include __DIR__ . '/../shared/header.php';
      }
      ?>
      <div class="page-inner">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="d-flex align-items-center">
                  <h4 class="card-title">Add Row</h4>
                  <button
                    class="btn btn-primary btn-round ms-auto"
                    data-bs-toggle="modal"
                    data-bs-target="#addRowModal">
                    <i class="fa fa-plus"></i>
                    Add Row
                  </button>
                </div>
              </div>
              <div class="card-body">
                <!-- Modal -->
                <div
                  class="modal fade"
                  id="addRowModal"
                  tabindex="-1"
                  role="dialog"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-0">
                        <h5 class="modal-title">
                          <span class="fw-mediumbold"> New</span>
                          <span class="fw-light"> Row </span>
                        </h5>
                        <button
                          type="button"
                          class="close"
                          data-dismiss="modal"
                          aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p class="small">
                          Create a new row using this form, make sure you
                          fill them all
                        </p>
                        <form>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group form-group-default">
                                <label>Lesson Name</label>
                                <input
                                  id="lessonName"
                                  type="text"
                                  class="form-control"
                                  placeholder="Lesson Name" />
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group form-group-default">
                                <label>Video Address</label>
                                <input
                                  id="videoAddress"
                                  type="text"
                                  class="form-control"
                                  placeholder="Video URL" />
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group form-group-default">
                                <label>Description</label>
                                <textarea
                                  id="description"
                                  class="form-control"
                                  placeholder="Description"></textarea>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group form-group-default">
                                <label>Course</label>
                                <select id="idCourse" class="form-control">
                                  <!-- Options will be populated via JS -->
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group form-group-default">
                                <label>Copyright Type</label>
                                <select id="idCopyrightType" class="form-control">
                                  <!-- Options will be populated via JS -->
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group form-group-default">
                                <label>Status Type</label>
                                <select id="idStatusType" class="form-control">
                                  <!-- Options will be populated via JS -->
                                </select>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer border-0">
                        <button
                          type="button"
                          id="addRowButton"
                          class="btn btn-primary">
                          Add
                        </button>
                        <button
                          type="button"
                          class="btn btn-danger"
                          data-dismiss="modal">
                          Close
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="table-responsive">
                  <table
                    id="add-row"
                    class="display table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Lesson Name</th>
                        <th>Video Address</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Data will be inserted here by JavaScript -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Debugging: Check if footer.php exists -->
    <?php
    if (!file_exists(__DIR__ . '/../shared/footer.php')) {
      echo "Error: footer.php not found!";
    } else {
      include __DIR__ . '/../shared/footer.php';
    }
    ?>
  </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Load dropdowns for Course, Copyright Type, and Status Type
      loadSelect("http://127.0.0.1:8000/api/courses", "idCourse", "idCourse", "courseName");
      loadSelect("http://127.0.0.1:8000/api/copyrighttypes", "idCopyrightType", "idCopyrightType", "nameCopyrightType");
      loadSelect("http://127.0.0.1:8000/api/statustypes", "idStatusType", "idStatusType", "nameStatusType");

      function loadSelect(url, selectId, valueField, textField) {
        fetch(url)
          .then(res => res.json())
          .then(data => {
            const select = document.getElementById(selectId);
            select.innerHTML = "";
            data.data.forEach(item => {
              const opt = document.createElement("option");
              opt.value = item[valueField];
              opt.text = item[textField];
              select.appendChild(opt);
            });
          })
          .catch(err => console.error("Failed to load " + selectId, err));
      }

      // Add new lesson
      document.getElementById("addRowButton").addEventListener("click", function() {
        const lessonData = {
          idCourse: parseInt(document.getElementById("idCourse").value),
          idCopyrightType: parseInt(document.getElementById("idCopyrightType").value),
          idStatusType: parseInt(document.getElementById("idStatusType").value),
          lessonName: document.getElementById("lessonName").value,
          videoAddress: document.getElementById("videoAddress").value,
          description: document.getElementById("description").value,
          quantityView: 0,
          quantityComment: 0,
          quantityFavorite: 0,
          quantityShared: 0,
          quantitySaved: 0
        };

        fetch("http://127.0.0.1:8000/api/lessons", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify(lessonData),
          })
          .then((res) => res.json())
          .then((data) => {
            alert("Lesson created successfully!");

            // Refresh the table after adding a new lesson
            loadLessons();

            // Close modal
            $('#addRowModal').modal('hide');
          })
          .catch((err) => {
            console.error("Failed to create lesson", err);
            alert("Failed to create lesson.");
          });
      });

      // Load lessons into table
      function loadLessons() {
        fetch("http://127.0.0.1:8000/api/lessons")
          .then((res) => res.json())
          .then((data) => {
            const tableBody = document.querySelector("table tbody");
            tableBody.innerHTML = ""; // Clear existing rows

            data.data.forEach((lesson) => {
              const row = document.createElement("tr");

              row.innerHTML = `
            <td>${lesson.lessonName}</td>
            <td>${lesson.videoAddress}</td>
            <td>${lesson.description}</td>
            <td>
              <button class="btn btn-warning btn-sm" onclick="editLesson(${lesson.id})">Edit</button>
              <button class="btn btn-danger btn-sm" onclick="deleteLesson(${lesson.id})">Delete</button>
            </td>
          `;
              tableBody.appendChild(row);
            });
          })
          .catch((err) => console.error("Failed to load lessons", err));
      }

      // Initial load of lessons
      loadLessons();
    });

    function deleteLesson(id) {
      if (confirm("Are you sure you want to delete this lesson?")) {
        fetch(`http://127.0.0.1:8000/api/lessons/${id}`, {
            method: "DELETE"
          })
          .then((res) => res.json())
          .then(() => {
            alert("Lesson deleted successfully.");
            loadLessons(); // Reload lessons after deletion
          })
          .catch((err) => {
            console.error("Failed to delete lesson", err);
            alert("Failed to delete lesson.");
          });
      }
    }

    function editLesson(id) {
      // Your edit logic goes here
      alert("Edit feature is not yet implemented.");
    }
  </script>

</body>