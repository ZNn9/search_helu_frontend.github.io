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
      <main class="flex-1 p-4 space-y-8">
        <div class="page-inner">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <h4 class="card-title">Account Table</h4>
                    <div class="ms-auto">
                      <button class="btn btn-info btn-round ms-2" id="loadAccountsButton">
                        <i class="fa fa-list"></i> List Account
                      </button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <!-- Dropdown for rows per page -->
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                      <label for="rowsPerPageSelect">Rows per page:</label>
                      <select id="rowsPerPageSelect" class="form-select form-select-sm w-auto">
                        <option value="5" selected>5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                      </select>
                    </div>
                  </div>
                  <!-- Table -->
                  <div class="table-responsive">
                    <table
                      id="add-row"
                      class="display table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Account Name</th>
                          <th>Email</th>
                          <th style="width: 10%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Dynamic rows will be inserted here -->
                      </tbody>
                    </table>
                  </div>
                  <ul class="pagination justify-content-center mt-3" id="pagination"></ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
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

  <!-- Edit Modal -->
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
            <span class="fw-light"> Row </span>
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group form-group-default">
                  <label>ID</label>
                  <input
                    id="editId"
                    type="text"
                    class="form-control"
                    placeholder="Edit ID" />
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group form-group-default">
                  <label>Account Name</label>
                  <input
                    id="editName"
                    type="text"
                    class="form-control"
                    placeholder="Edit name" />
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group form-group-default">
                  <label>Email</label>
                  <input
                    id="editEmail"
                    type="email"
                    class="form-control"
                    placeholder="Edit email" />
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-primary">Save Changes</button>
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

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const editButtons = document.querySelectorAll(".btn-link.btn-primary");
      const deleteButtons = document.querySelectorAll(".btn-link.btn-danger");
      const editModal = document.getElementById("editRowModal");
      const editIdInput = document.getElementById("editId");
      const editNameInput = document.getElementById("editName");
      const editEmailInput = document.getElementById("editEmail");
      const saveChangesButton = document.querySelector("#editRowModal .btn-primary");

      const addRowButton = document.getElementById("addRowButton");
      const addIdInput = document.getElementById("addId");
      const addNameInput = document.getElementById("addName");
      const addEmailInput = document.getElementById("addEmail");
      const tableBody = document.querySelector("#add-row tbody");
      const addRowModal = document.getElementById("addRowModal");

      const table = document.getElementById("add-row");
      const rowsPerPageSelect = document.getElementById("rowsPerPageSelect");
      let rowsPerPage = parseInt(rowsPerPageSelect.value, 10);
      let currentPage = 1;

      // Function to fetch accounts from API
      document.getElementById("loadAccountsButton").addEventListener("click", function() {
        fetch("http://127.0.0.1:8000/api/accounts")
          .then(response => response.json())
          .then(data => {
            const accounts = data.data;
            tableBody.innerHTML = "";

            accounts.forEach(account => {
              const row = document.createElement("tr");
              row.innerHTML = `
                <td>${account.idAccount}</td>
                <td>${account.accountName}</td>
                <td>${account.email}</td>
                <td>
                  <div class="form-button-action">
                    <button type="button" class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip" title="Edit Task">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-link btn-danger" data-bs-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i>
                    </button>
                  </div>
                </td>
              `;
              tableBody.appendChild(row);
            });

            attachEditDeleteEvents();
            paginateTable();
          })
          .catch(error => {
            console.error("Error loading accounts:", error);
            alert("Không thể tải danh sách tài khoản!");
          });
      });

      // Function to handle pagination
      function paginateTable() {
        const rows = Array.from(table.querySelectorAll("tbody tr"));
        const totalPages = Math.ceil(rows.length / rowsPerPage);
        const pagination = document.getElementById("pagination");
        pagination.innerHTML = "";

        // Hide all rows
        rows.forEach(row => row.style.display = "none");

        // Show rows for the current page
        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        rows.slice(start, end).forEach(row => row.style.display = "");

        // Create pagination buttons
        for (let i = 1; i <= totalPages; i++) {
          const li = document.createElement("li");
          li.className = `page-item ${i === currentPage ? "active" : ""}`;
          li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
          li.addEventListener("click", function(e) {
            e.preventDefault();
            currentPage = i;
            paginateTable();
          });
          pagination.appendChild(li);
        }
      }

      // Update rows per page when dropdown changes
      rowsPerPageSelect.addEventListener("change", function() {
        rowsPerPage = parseInt(this.value, 10);
        currentPage = 1;
        paginateTable();
      });

      // Function to attach edit and delete events to rows
      function attachEditDeleteEvents() {
        const editButtons = document.querySelectorAll(".btn-link.btn-primary");
        const deleteButtons = document.querySelectorAll(".btn-link.btn-danger");

        editButtons.forEach((button) => {
          button.addEventListener("click", function() {
            currentRow = this.closest("tr");
            if (!currentRow) {
              console.error("Row not found!");
              return;
            }

            const id = currentRow.querySelector("td:nth-child(1)").textContent.trim();
            const name = currentRow.querySelector("td:nth-child(2)").textContent.trim();
            const email = currentRow.querySelector("td:nth-child(3)").textContent.trim();

            editIdInput.value = id;
            editNameInput.value = name;
            editEmailInput.value = email;

            const bootstrapModal = new bootstrap.Modal(editModal);
            bootstrapModal.show();
          });
        });

        deleteButtons.forEach((button) => {
          button.addEventListener("click", function() {
            const row = this.closest("tr");
            if (row) {
              const confirmDelete = confirm("Are you sure you want to delete this row?");
              if (confirmDelete) {
                row.remove();
                paginateTable();
              }
            } else {
              console.error("Row not found!");
            }
          });
        });
      }

      // Handle add row functionality
      addRowButton.addEventListener("click", function() {
        const id = addIdInput.value.trim();
        const name = addNameInput.value.trim();
        const email = addEmailInput.value.trim();

        if (!id || !name || !email) {
          alert("Please fill in all fields before adding a row.");
          return;
        }

        const newRow = document.createElement("tr");
        newRow.innerHTML = `
          <td>${id}</td>
          <td>${name}</td>
          <td>${email}</td>
          <td>
            <div class="form-button-action">
              <button type="button" class="btn btn-link btn-primary btn-lg" data-bs-toggle="tooltip" title="Edit Task">
                <i class="fa fa-edit"></i>
              </button>
              <button type="button" class="btn btn-link btn-danger" data-bs-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i>
              </button>
            </div>
          </td>
        `;

        tableBody.appendChild(newRow);
        addIdInput.value = "";
        addNameInput.value = "";
        addEmailInput.value = "";

        const bootstrapModal = bootstrap.Modal.getInstance(addRowModal);
        bootstrapModal.hide();

        attachEditDeleteEvents();
        paginateTable();
      });

      // Handle save changes functionality
      saveChangesButton.addEventListener("click", function() {
        if (!currentRow) {
          console.error("No row selected for editing!");
          return;
        }

        currentRow.querySelector("td:nth-child(1)").textContent = editIdInput.value.trim();
        currentRow.querySelector("td:nth-child(2)").textContent = editNameInput.value.trim();
        currentRow.querySelector("td:nth-child(3)").textContent = editEmailInput.value.trim();

        const bootstrapModal = bootstrap.Modal.getInstance(editModal);
        bootstrapModal.hide();
      });

      // Fix "Close" button functionality for the add row modal
      const closeButtons = document.querySelectorAll('[data-dismiss="modal"]');
      closeButtons.forEach((button) => {
        button.addEventListener("click", function() {
          const bootstrapModal = bootstrap.Modal.getInstance(addRowModal);
          bootstrapModal.hide();
        });
      });

      // Initial pagination
      paginateTable();
    });
  </script>
</body>