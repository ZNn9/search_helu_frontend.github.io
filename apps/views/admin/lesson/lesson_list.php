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
                  <h4 class="card-title">Lesson List</h4>
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
                <!-- Modal for Add Row -->
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
                          <span class="fw-light"> Lesson </span>
                        </h5>
                        <button
                          type="button"
                          class="close"
                          data-bs-dismiss="modal"
                          aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p class="small">
                          Create a new lesson using this form, make sure you fill all required fields
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
                                <select id="idCourse" class="form-control"></select>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group form-group-default">
                                <label>Copyright Type</label>
                                <select id="idCopyrightType" class="form-control"></select>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group form-group-default">
                                <label>Status Type</label>
                                <select id="idStatusType" class="form-control"></select>
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
                          data-bs-dismiss="modal">
                          Close
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal for Edit Row -->
                <div
                  class="modal fade"
                  id="editRowModal"
                  tabindex="-1"
                  role="dialog"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-0">
                        <h5 class="modal-title">
                          <span class="fw-mediumbold"> Edit</span>
                          <span class="fw-light"> Lesson </span>
                        </h5>
                        <button
                          type="button"
                          class="close"
                          data-bs-dismiss="modal"
                          aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p class="small">
                          Edit the lesson details below
                        </p>
                        <form>
                          <input type="hidden" id="editLessonId">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group form-group-default">
                                <label>Lesson Name</label>
                                <input
                                  id="editLessonName"
                                  type="text"
                                  class="form-control"
                                  placeholder="Lesson Name" />
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group form-group-default">
                                <label>Video Address</label>
                                <input
                                  id="editVideoAddress"
                                  type="text"
                                  class="form-control"
                                  placeholder="Video URL" />
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group form-group-default">
                                <label>Description</label>
                                <textarea
                                  id="editDescription"
                                  class="form-control"
                                  placeholder="Description"></textarea>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group form-group-default">
                                <label>Course</label>
                                <select id="editIdCourse" class="form-control"></select>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group form-group-default">
                                <label>Copyright Type</label>
                                <select id="editIdCopyrightType" class="form-control"></select>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group form-group-default">
                                <label>Status Type</label>
                                <select id="editIdStatusType" class="form-control"></select>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer border-0">
                        <button
                          type="button"
                          id="updateRowButton"
                          class="btn btn-success">
                          Save
                        </button>
                        <button
                          type="button"
                          class="btn btn-danger"
                          data-bs-dismiss="modal">
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
                <!-- Pagination -->
                <nav>
                  <ul class="pagination justify-content-center mt-3" id="pagination">
                    <!-- Pagination buttons will be created by JS -->
                  </ul>
                </nav>
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
</body>

<script>
  let lessons = [];
  let currentPage = 1;
  const pageSize = 5;

  document.addEventListener("DOMContentLoaded", function() {
    // Load dropdowns for Course, Copyright Type, and Status Type
    loadSelect("http://127.0.0.1:8000/api/courses", "idCourse", "idCourse", "courseName");
    loadSelect("http://127.0.0.1:8000/api/copyrighttypes", "idCopyrightType", "idCopyrightType", "nameCopyrightType");
    loadSelect("http://127.0.0.1:8000/api/statustypes", "idStatusType", "idStatusType", "nameStatusType");

    // Load dropdowns for Edit Modal
    loadSelect("http://127.0.0.1:8000/api/courses", "editIdCourse", "idCourse", "courseName");
    loadSelect("http://127.0.0.1:8000/api/copyrighttypes", "editIdCopyrightType", "idCopyrightType", "nameCopyrightType");
    loadSelect("http://127.0.0.1:8000/api/statustypes", "editIdStatusType", "idStatusType", "nameStatusType");

    async function loadSelect(url, selectId, valueField, textField) {
      try {
        const res = await fetch(url);
        if (!res.ok) throw new Error(`Failed to fetch ${url}: ${res.statusText}`);
        const data = await res.json();
        const select = document.getElementById(selectId);
        select.innerHTML = "";
        data.data.forEach(item => {
          const opt = document.createElement("option");
          opt.value = item[valueField];
          opt.text = item[textField];
          select.appendChild(opt);
        });
      } catch (err) {
        console.error("Failed to load " + selectId, err);
        alert("Failed to load dropdown data for " + selectId);
      }
    }

    // Add new lesson
    document.getElementById("addRowButton").addEventListener("click", async function() {
      const lessonData = {
        idCourse: parseInt(document.getElementById("idCourse").value),
        idCopyrightType: parseInt(document.getElementById("idCopyrightType").value),
        idStatusType: parseInt(document.getElementById("idStatusType").value),
        lessonName: document.getElementById("lessonName").value.trim(),
        videoAddress: document.getElementById("videoAddress").value.trim(),
        description: document.getElementById("description").value.trim(),
        quantityView: 0,
        quantityComment: 0,
        quantityFavorite: 0,
        quantityShared: 0,
        quantitySaved: 0
      };

      if (!lessonData.lessonName || !lessonData.videoAddress) {
        alert("Please fill in Lesson Name and Video Address!");
        return;
      }

      try {
        const res = await fetch("http://127.0.0.1:8000/api/lessons", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(lessonData),
        });

        const data = await res.json();

        if (res.status === 201 || res.status === 200) {
          alert("Lesson created successfully!");
          lessons.push({
            ...lessonData,
            idLesson: data.data?.idLesson || Date.now()
          });
          renderTable();
          renderPagination();

          // Clear form and close modal
          document.getElementById("lessonName").value = "";
          document.getElementById("videoAddress").value = "";
          document.getElementById("description").value = "";
          const addModal = new bootstrap.Modal(document.getElementById("addRowModal"));
          addModal.hide();
        } else {
          alert("Failed to create lesson: " + (data.message || "Unknown error"));
        }
      } catch (err) {
        console.error("Failed to create lesson", err);
        alert("Failed to create lesson.");
      }
    });

    // Update lesson
    document.getElementById("updateRowButton").addEventListener("click", async function() {
      const lessonId = document.getElementById("editLessonId").value;
      const currentLesson = lessons.find(lesson => lesson.idLesson === parseInt(lessonId));

      if (!currentLesson) {
        alert("Lesson not found in local data!");
        return;
      }

      const lessonData = {
        idCourse: parseInt(document.getElementById("editIdCourse").value),
        idCopyrightType: parseInt(document.getElementById("editIdCopyrightType").value),
        idStatusType: parseInt(document.getElementById("editIdStatusType").value),
        lessonName: document.getElementById("editLessonName").value.trim(),
        videoAddress: document.getElementById("editVideoAddress").value.trim(),
        description: document.getElementById("editDescription").value.trim(),
        quantityView: currentLesson.quantityView || 0,
        quantityComment: currentLesson.quantityComment || 0,
        quantityFavorite: currentLesson.quantityFavorite || 0,
        quantityShared: currentLesson.quantityShared || 0,
        quantitySaved: currentLesson.quantitySaved || 0
      };

      if (!lessonData.lessonName || !lessonData.videoAddress) {
        alert("Please fill in Lesson Name and Video Address!");
        return;
      }

      try {
        const res = await fetch(`http://127.0.0.1:8000/api/lessons/${lessonId}`, {
          method: "PUT",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(lessonData),
        });

        if (!res.ok) {
          const errorData = await res.json();
          throw new Error(errorData.message || "Failed to update lesson");
        }

        const data = await res.json();

        if (res.status === 200) {
          alert("Lesson updated successfully!");
          const lessonIndex = lessons.findIndex(lesson => lesson.idLesson === parseInt(lessonId));
          if (lessonIndex !== -1) {
            lessons[lessonIndex] = {
              ...lessons[lessonIndex],
              ...lessonData,
              idLesson: parseInt(lessonId)
            };
          }
          renderTable();
          renderPagination();

          // Close modal
          const editModal = new bootstrap.Modal(document.getElementById("editRowModal"));
          editModal.hide();
        } else {
          alert("Failed to update lesson: " + (data.message || "Unknown error"));
        }
      } catch (err) {
        console.error("Failed to update lesson", err);
        alert("Failed to update lesson: " + err.message);
      }
    });

    // Load lessons into table
    async function loadLessons() {
      try {
        const res = await fetch("http://127.0.0.1:8000/api/lessons");
        if (!res.ok) throw new Error(`Failed to fetch lessons: ${res.statusText}`);
        const data = await res.json();
        lessons = data.data;
        renderTable();
        renderPagination();
      } catch (err) {
        console.error("Failed to load lessons", err);
        alert("Failed to load lessons: " + err.message);
      }
    }

    function renderTable() {
      const tableBody = document.querySelector("table tbody");
      tableBody.innerHTML = ""; // Clear existing rows

      const start = (currentPage - 1) * pageSize;
      const paginatedLessons = lessons.slice(start, start + pageSize);

      paginatedLessons.forEach((lesson) => {
        const row = document.createElement("tr");
        row.innerHTML = `
          <td>${lesson.lessonName}</td>
          <td>${lesson.videoAddress}</td>
          <td>${lesson.description}</td>
          <td>
            <button class="btn btn-warning btn-sm" onclick="editLesson(${lesson.idLesson})">Edit</button>
            <button class="btn btn-danger btn-sm" onclick="deleteLesson(${lesson.idLesson})">Delete</button>
          </td>
        `;
        tableBody.appendChild(row);
      });
    }

    function renderPagination() {
      const totalPages = Math.ceil(lessons.length / pageSize);
      const pagination = document.getElementById("pagination");
      pagination.innerHTML = "";

      for (let i = 1; i <= totalPages; i++) {
        const li = document.createElement("li");
        li.className = `page-item ${i === currentPage ? 'active' : ''}`;
        li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
        li.addEventListener("click", function(e) {
          e.preventDefault();
          currentPage = i;
          renderTable();
          renderPagination();
        });
        pagination.appendChild(li);
      }
    }

    // Initial load of lessons
    loadLessons();

    // Edit lesson
    window.editLesson = async function(id) {
      try {
        // Tìm bài học trong danh sách cục bộ trước
        const lesson = lessons.find(lesson => lesson.idLesson === id);
        if (!lesson) {
          // Nếu không tìm thấy trong danh sách cục bộ, gọi API
          const res = await fetch(`http://127.0.0.1:8000/api/lessons/${id}`);
          if (!res.ok) throw new Error(`Failed to fetch lesson: ${res.statusText}`);
          const data = await res.json();
          if (!data.data) throw new Error("Lesson not found in API response");
          lesson = data.data;
          // Cập nhật danh sách cục bộ nếu cần
          const lessonIndex = lessons.findIndex(l => l.idLesson === id);
          if (lessonIndex === -1) {
            lessons.push(lesson);
          } else {
            lessons[lessonIndex] = lesson;
          }
        }

        // Điền dữ liệu vào modal
        document.getElementById("editLessonId").value = lesson.idLesson;
        document.getElementById("editLessonName").value = lesson.lessonName || "";
        document.getElementById("editVideoAddress").value = lesson.videoAddress || "";
        document.getElementById("editDescription").value = lesson.description || "";
        document.getElementById("editIdCourse").value = lesson.idCourse || "";
        document.getElementById("editIdCopyrightType").value = lesson.idCopyrightType || "";
        document.getElementById("editIdStatusType").value = lesson.idStatusType || "";

        const editModal = new bootstrap.Modal(document.getElementById("editRowModal"));
        editModal.show();
      } catch (err) {
        console.error("Failed to load lesson for editing", err);
        alert("Failed to load lesson for editing: " + err.message);
      }
    };

    // Delete lesson
    window.deleteLesson = async function(id) {
      if (confirm("Are you sure you want to delete this lesson?")) {
        try {
          const res = await fetch(`http://127.0.0.1:8000/api/lessons/${id}`, {
            method: "DELETE"
          });

          if (res.status === 200 || res.status === 204) {
            alert("Lesson deleted successfully.");
            lessons = lessons.filter(lesson => lesson.idLesson !== id);
            currentPage = 1; // Reset to first page
            renderTable();
            renderPagination();
          } else {
            const data = await res.json();
            alert("Failed to delete lesson: " + (data.message || "Unknown error"));
          }
        } catch (err) {
          console.error("Failed to delete lesson", err);
          alert("Failed to delete lesson: " + err.message);
        }
      }
    };
  });
</script>