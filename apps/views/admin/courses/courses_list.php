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

  <!-- Phân trang -->
  <nav>
    <ul class="pagination justify-content-center" id="pagination">
      <!-- Nút trang sẽ được tạo bằng JS -->
    </ul>
  </nav>
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
        <input type="hidden" id="editCourseId">
        <input id="editCourseName" class="form-control mb-2" placeholder="Tên khoá học">
        <textarea id="editCourseDesc" class="form-control mb-2" placeholder="Mô tả"></textarea>
        <select id="editAccountSelect" class="form-select mb-2"></select>
        <select id="editIndustrySelect" class="form-select mb-2"></select>
        <select id="editPrioritySelect" class="form-select mb-2"></select>
        <select id="editCopyrightSelect" class="form-select mb-2"></select>
        <select id="editStatusSelect" class="form-select mb-2"></select>
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
  let courses = [];
  let currentPage = 1;
  const pageSize = 5;

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

    // Load dropdowns for edit modal
    loadSelect("accounts", "editAccountSelect", "idAccount", "accountName");
    loadSelect("industrytypes", "editIndustrySelect", "idIndustryType", "nameIndustryType");
    loadSelect("prioritytypes", "editPrioritySelect", "idPriorityType", "namePriorityType");
    loadSelect("copyrighttypes", "editCopyrightSelect", "idCopyrightType", "nameCopyrightType");
    loadSelect("statustypes", "editStatusSelect", "idStatusType", "nameStatusType");
  }

  async function loadSelect(endpoint, selectId, valueField, textField) {
    try {
      const res = await fetch(`http://127.0.0.1:8000/api/${endpoint}`);
      const data = await res.json();
      const select = document.getElementById(selectId);
      select.innerHTML = "";
      data.data.forEach(item => {
        const option = document.createElement("option");
        option.value = item[valueField];
        option.textContent = item[textField];
        select.appendChild(option);
      });
    } catch (error) {
      console.error(`Error loading ${endpoint}:`, error);
      alert(`Không thể tải danh sách ${endpoint}!`);
    }
  }

  async function loadCourses() {
    try {
      const res = await fetch(API_BASE);
      const data = await res.json();
      courses = data.data; // Lưu dữ liệu vào biến toàn cục
      renderTable();
      renderPagination();
    } catch (error) {
      console.error("Error loading courses:", error);
      alert("Không thể tải danh sách khoá học!");
    }
  }

  function renderTable() {
    const tbody = document.querySelector("#courseTable tbody");
    tbody.innerHTML = "";

    const start = (currentPage - 1) * pageSize;
    const paginatedCourses = courses.slice(start, start + pageSize);

    paginatedCourses.forEach(course => {
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
  }

  function renderPagination() {
    const totalPages = Math.ceil(courses.length / pageSize);
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

    // Ensure the last page is displayed correctly
    if (courses.length % pageSize !== 0 && currentPage > totalPages) {
      currentPage = totalPages;
      renderTable();
      renderPagination();
    }
  }

  async function addCourse() {
    const name = document.getElementById("courseName").value;
    const desc = document.getElementById("courseDesc").value;
    const idAccount = document.getElementById("accountSelect").value;
    const idIndustryType = document.getElementById("industrySelect").value;
    const idPriorityType = document.getElementById("prioritySelect").value;
    const idCopyrightType = document.getElementById("copyrightSelect").value;
    const idStatusType = document.getElementById("statusSelect").value;

    if (!name || !desc) {
      alert("Vui lòng điền đầy đủ tên và mô tả!");
      return;
    }

    try {
      const res = await fetch(API_BASE, {
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
      });

      const data = await res.json();

      if (res.status === 201 || res.status === 200) {
        alert("Thêm thành công!");
        document.getElementById("courseName").value = "";
        document.getElementById("courseDesc").value = "";
        const addModal = new bootstrap.Modal(document.getElementById("addModal"));
        addModal.hide();

        // Reload the page after adding a course
        location.reload();
      } else {
        alert("Thêm thất bại: " + (data.message || "Lỗi không xác định"));
      }
    } catch (error) {
      console.error("Error adding course:", error);
      alert("Đã có lỗi xảy ra khi thêm khoá học!");
    }
  }

  async function deleteCourse(id) {
    if (!confirm("Bạn có chắc muốn xoá?")) return;

    try {
      const res = await fetch(`${API_BASE}/${id}`, {
        method: "DELETE"
      });

      const data = await res.json();

      if (res.status === 200 || res.status === 204) {
        alert("Xoá thành công!");
        // Xoá khoá học khỏi danh sách cục bộ
        courses = courses.filter(course => course.idCourse !== id);
        currentPage = 1; // Reset về trang đầu
        renderTable();
        renderPagination();
      } else {
        alert("Xoá thất bại: " + (data.message || "Lỗi không xác định"));
      }
    } catch (error) {
      console.error("Error deleting course:", error);
      alert("Đã có lỗi xảy ra khi xoá khoá học!");
    }
  }

  function showEdit(course) {
    document.getElementById("editCourseId").value = course.idCourse;
    document.getElementById("editCourseName").value = course.courseName;
    document.getElementById("editCourseDesc").value = course.description;

    // Set selected values for dropdowns
    document.getElementById("editAccountSelect").value = course.idAccount;
    document.getElementById("editIndustrySelect").value = course.idIndustryType;
    document.getElementById("editPrioritySelect").value = course.idPriorityType;
    document.getElementById("editCopyrightSelect").value = course.idCopyrightType;
    document.getElementById("editStatusSelect").value = course.idStatusType;

    const editModal = new bootstrap.Modal(document.getElementById("editModal"));
    editModal.show();
  }

  async function updateCourse() {
  const id = document.getElementById("editCourseId").value;
  const name = document.getElementById("editCourseName").value;
  const desc = document.getElementById("editCourseDesc").value;
  const idAccount = document.getElementById("editAccountSelect").value;
  const idIndustryType = document.getElementById("editIndustrySelect").value;
  const idPriorityType = document.getElementById("editPrioritySelect").value;
  const idCopyrightType = document.getElementById("editCopyrightSelect").value;
  const idStatusType = document.getElementById("editStatusSelect").value;

  if (!name || !desc) {
    alert("Vui lòng điền đầy đủ tên và mô tả!");
    return;
  }

  try {
    const res = await fetch(`${API_BASE}/${id}`, {
      method: "PUT",
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
    });

    const data = await res.json();

    if (res.status === 200) {
      alert("Cập nhật thành công!");
      const editModalElement = document.getElementById("editModal");
      const editModal = bootstrap.Modal.getInstance(editModalElement) || new bootstrap.Modal(editModalElement);
      editModal.hide();

      // Cập nhật khoá học trong danh sách cục bộ
      const courseIndex = courses.findIndex(course => course.idCourse === parseInt(id));
      if (courseIndex !== -1) {
        courses[courseIndex] = {
          ...courses[courseIndex],
          courseName: name,
          description: desc,
          idAccount,
          idIndustryType,
          idPriorityType,
          idCopyrightType,
          idStatusType
        };
      }
      renderTable();
      renderPagination();
    } else {
      alert("Cập nhật thất bại: " + (data.message || "Lỗi không xác định"));
    }
  } catch (error) {
    console.error("Error updating course:", error);
    alert("Đã có lỗi xảy ra khi cập nhật khoá học!");
  }
}
</script>