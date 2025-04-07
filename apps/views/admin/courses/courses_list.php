<?php
include __DIR__ . '/../shared/left_sidebar.php';
include __DIR__ . '/../shared/header.php';
?>

<div class="container mt-4">
  <h2>Danh sách khoá học</h2>
  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Thêm khoá học</button>

  <table class="table table-bordered" id="courseTable">
    <thead>
      <tr>
        <th>Tên khoá học</th>
        <th>Mô tả</th>
        <th>Ngày tạo</th>
        <th>Hành động</th>
      </tr>
    </thead>
    <tbody>
      <!-- Dữ liệu sẽ được load bằng JS -->
    </tbody>
  </table>
</div>

<!-- Modal Thêm -->
<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm khoá học</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input id="courseName" class="form-control mb-2" placeholder="Tên khoá học">
        <textarea id="courseDesc" class="form-control mb-2" placeholder="Mô tả"></textarea>

        <select id="accountSelect" class="form-select mb-2"></select>
        <select id="industrySelect" class="form-select mb-2"></select>
        <select id="prioritySelect" class="form-select mb-2"></select>
        <select id="copyrightSelect" class="form-select mb-2"></select>
        <select id="statusSelect" class="form-select mb-2"></select>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" onclick="addCourse()">Thêm</button>
        <button class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Sửa -->
<div class="modal fade" id="editModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sửa khoá học</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input id="editCourseName" class="form-control mb-2" placeholder="Tên khoá học">
        <textarea id="editCourseDesc" class="form-control mb-2" placeholder="Mô tả"></textarea>
        <input type="hidden" id="editCourseId">
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" onclick="updateCourse()">Lưu</button>
        <button class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../shared/footer.php'; ?>

<script>
  const API_BASE = "http://127.0.0.1:8000/api/courses";

  document.addEventListener("DOMContentLoaded", () => {
    loadCourses();
    loadDropdowns();
  });

  function loadDropdowns() {
    loadSelect("accounts", "accountSelect", "idAccount", "accountName");
    loadSelect("industrytypes", "industrySelect", "idIndustryType", "nameIndustryType");
    loadSelect("prioritytypes", "prioritySelect", "idPriorityType", "namePriorityType");
    loadSelect("copyrighttypes", "copyrightSelect", "idCopyrightType", "nameCopyrightType");
    loadSelect("statustypes", "statusSelect", "idStatusType", "nameStatusType");
  }

  function loadSelect(endpoint, selectId, valueField, textField) {
    fetch(`http://127.0.0.1:8000/api/${endpoint}`)
      .then(res => res.json())
      .then(data => {
        const select = document.getElementById(selectId);
        select.innerHTML = "";
        data.data.forEach(item => {
          const option = document.createElement("option");
          option.value = item[valueField];
          option.textContent = item[textField];
          select.appendChild(option);
        });
      });
  }

  function loadCourses() {
    fetch(API_BASE)
      .then(res => res.json())
      .then(data => {
        const tbody = document.querySelector("#courseTable tbody");
        tbody.innerHTML = "";
        data.data.forEach(course => {
          const row = `
            <tr>
              <td>${course.courseName}</td>
              <td>${course.description}</td>
              <td>${course.timeCreated}</td>
              <td>
                <button class="btn btn-sm btn-warning" onclick='showEdit(${JSON.stringify(course)})'>Sửa</button>
                <button class="btn btn-sm btn-danger" onclick="deleteCourse(${course.idCourse})">Xoá</button>
              </td>
            </tr>
          `;
          tbody.innerHTML += row;
        });
      });
  }

  function addCourse() {
    const name = document.getElementById("courseName").value;
    const desc = document.getElementById("courseDesc").value;

    const idAccount = document.getElementById("accountSelect").value;
    const idIndustryType = document.getElementById("industrySelect").value;
    const idPriorityType = document.getElementById("prioritySelect").value;
    const idCopyrightType = document.getElementById("copyrightSelect").value;
    const idStatusType = document.getElementById("statusSelect").value;

    fetch(API_BASE, {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({
          idAccount,
          idIndustryType,
          idPriorityType,
          idCopyrightType,
          idStatusType,
          courseName: name,
          description: desc
        })
      })
      .then(res => res.json())
      .then(() => {
        alert("Thêm thành công!");
        document.getElementById("courseName").value = "";
        document.getElementById("courseDesc").value = "";
        bootstrap.Modal.getInstance(document.getElementById("addModal")).hide();
        loadCourses();
      });
  }

  function deleteCourse(id) {
    if (!confirm("Bạn có chắc muốn xoá?")) return;
    fetch(`${API_BASE}/${id}`, {
        method: "DELETE"
      })
      .then(res => res.json())
      .then(() => {
        alert("Xoá thành công!");
        loadCourses();
      });
  }

  function showEdit(course) {
    document.getElementById("editCourseId").value = course.idCourse;
    document.getElementById("editCourseName").value = course.courseName;
    document.getElementById("editCourseDesc").value = course.description;
    bootstrap.Modal.getInstance(document.getElementById("editModal")).show();
  }

  function updateCourse() {
    const id = document.getElementById("editCourseId").value;
    const name = document.getElementById("editCourseName").value;
    const desc = document.getElementById("editCourseDesc").value;

    // Dùng lại dropdown chọn mặc định account đầu tiên (id = 6) như yêu cầu trước
    fetch(`${API_BASE}/${id}`, {
        method: "PUT",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({
          idAccount: 6,
          idIndustryType: 1,
          idPriorityType: 1,
          idCopyrightType: 1,
          idStatusType: 1,
          courseName: name,
          description: desc
        })
      })
      .then(res => res.json())
      .then(() => {
        alert("Cập nhật thành công!");
        bootstrap.Modal.getInstance(document.getElementById("editModal")).hide();
        loadCourses();
      });
  }
</script>