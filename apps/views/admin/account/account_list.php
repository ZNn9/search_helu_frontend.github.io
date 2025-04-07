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
        <main class="flex-1 p-4 space-y-8">
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
                                    <label>Name</label>
                                    <input
                                      id="addName"
                                      type="text"
                                      class="form-control"
                                      placeholder="fill name" />
                                  </div>
                                </div>
                                <div class="col-md-6 pe-0">
                                  <div class="form-group form-group-default">
                                    <label>Position</label>
                                    <input
                                      id="addPosition"
                                      type="text"
                                      class="form-control"
                                      placeholder="fill position" />
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-group-default">
                                    <label>Office</label>
                                    <input
                                      id="addOffice"
                                      type="text"
                                      class="form-control"
                                      placeholder="fill office" />
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
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th style="width: 10%">Action</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>
                              <div class="form-button-action">
                                <button
                                  type="button"
                                  data-bs-toggle="tooltip"
                                  title=""
                                  class="btn btn-link btn-primary btn-lg"
                                  data-original-title="Edit Task">
                                  <i class="fa fa-edit"></i>
                                </button>
                                <button
                                  type="button"
                                  data-bs-toggle="tooltip"
                                  title=""
                                  class="btn btn-link btn-danger"
                                  data-original-title="Remove">
                                  <i class="fa fa-times"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
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
      const editButtons = document.querySelectorAll(".btn-link.btn-primary");
      const deleteButtons = document.querySelectorAll(".btn-link.btn-danger");
      const editModal = document.getElementById("editRowModal");
      const editNameInput = document.getElementById("editName");
      const editPositionInput = document.getElementById("editPosition");
      const editOfficeInput = document.getElementById("editOffice");
      const saveChangesButton = document.querySelector("#editRowModal .btn-primary");

      const addRowButton = document.getElementById("addRowButton");
      const addNameInput = document.getElementById("addName");
      const addPositionInput = document.getElementById("addPosition");
      const addOfficeInput = document.getElementById("addOffice");
      const tableBody = document.querySelector("#add-row tbody");
      const addRowModal = document.getElementById("addRowModal");

      const table = document.getElementById("add-row");
      const rowsPerPageSelect = document.getElementById("rowsPerPageSelect");
      let rowsPerPage = parseInt(rowsPerPageSelect.value, 10);
      let currentPage = 1;

      function paginateTable() {
        const rows = Array.from(table.querySelectorAll("tbody tr"));
        const totalRows = rows.length;
        const totalPages = Math.ceil(totalRows / rowsPerPage);

        // Adjust current page if it exceeds total pages
        if (currentPage > totalPages) {
          currentPage = totalPages;
        }

        // Hide all rows
        rows.forEach((row, index) => {
          row.style.display = "none";
          if (
            index >= (currentPage - 1) * rowsPerPage &&
            index < currentPage * rowsPerPage
          ) {
            row.style.display = "";
          }
        });

        // Update pagination controls
        updatePaginationControls(totalPages);
      }

      function updatePaginationControls(totalPages) {
        let paginationContainer = document.getElementById("pagination-controls");
        if (!paginationContainer) {
          paginationContainer = document.createElement("div");
          paginationContainer.id = "pagination-controls";
          paginationContainer.className = "pagination-controls mt-3";
          table.parentElement.appendChild(paginationContainer);
        }

        paginationContainer.innerHTML = "";

        for (let i = 1; i <= totalPages; i++) {
          const pageButton = document.createElement("button");
          pageButton.textContent = i;
          pageButton.className = "btn btn-sm btn-secondary mx-1";
          if (i === currentPage) {
            pageButton.classList.add("btn-primary");
          }
          pageButton.addEventListener("click", function() {
            currentPage = i;
            paginateTable();
          });
          paginationContainer.appendChild(pageButton);
        }
      }

      rowsPerPageSelect.addEventListener("change", function() {
        rowsPerPage = parseInt(this.value, 10); // Update rowsPerPage with the selected value
        currentPage = 1; // Reset to the first page
        paginateTable();
      });

      // Re-paginate whenever a new row is added
      addRowButton.addEventListener("click", function() {
        setTimeout(paginateTable, 100); // Delay to ensure the row is added
      });

      // Initial pagination
      paginateTable();

      let currentRow = null; // To track the row being edited

      if (!editModal) {
        console.error("Edit modal not found!");
        return;
      }

      // Handle edit functionality
      editButtons.forEach((button) => {
        button.addEventListener("click", function() {
          currentRow = this.closest("tr");
          if (!currentRow) {
            console.error("Row not found!");
            return;
          }

          const name = currentRow.querySelector("td:nth-child(1)").textContent.trim();
          const position = currentRow.querySelector("td:nth-child(2)").textContent.trim();
          const office = currentRow.querySelector("td:nth-child(3)").textContent.trim();

          // Populate modal inputs
          editNameInput.value = name;
          editPositionInput.value = position;
          editOfficeInput.value = office;

          // Show the modal
          const bootstrapModal = new bootstrap.Modal(editModal);
          bootstrapModal.show();
        });
      });

      // Handle save changes functionality
      saveChangesButton.addEventListener("click", function() {
        if (!currentRow) {
          console.error("No row selected for editing!");
          return;
        }

        // Update the table row with the new values
        currentRow.querySelector("td:nth-child(1)").textContent = editNameInput.value.trim();
        currentRow.querySelector("td:nth-child(2)").textContent = editPositionInput.value.trim();
        currentRow.querySelector("td:nth-child(3)").textContent = editOfficeInput.value.trim();

        // Hide the modal
        const bootstrapModal = bootstrap.Modal.getInstance(editModal);
        bootstrapModal.hide();
      });

      function attachDeleteEvent() {
        const deleteButtons = document.querySelectorAll(".btn-link.btn-danger");
        deleteButtons.forEach((button) => {
          button.addEventListener("click", function() {
            const row = this.closest("tr");
            if (row) {
              const confirmDelete = confirm("Are you sure you want to delete this row?");
              if (confirmDelete) {
                row.remove();
                paginateTable(); // Re-paginate after deletion
              }
            } else {
              console.error("Row not found!");
            }
          });
        });
      }

      // Attach delete event to existing rows
      attachDeleteEvent();

      // Re-attach delete event to dynamically added rows
      addRowButton.addEventListener("click", function() {
        setTimeout(attachDeleteEvent, 100); // Delay to ensure the row is added
      });

      // Handle add row functionality
      addRowButton.addEventListener("click", function() {
        const name = addNameInput.value.trim();
        const position = addPositionInput.value.trim();
        const office = addOfficeInput.value.trim();

        if (!name || !position || !office) {
          alert("Please fill in all fields before adding a row.");
          return;
        }

        // Create a new row
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
          <td>${name}</td>
          <td>${position}</td>
          <td>${office}</td>
          <td>
            <div class="form-button-action">
              <button
                type="button"
                data-bs-toggle="tooltip"
                title=""
                class="btn btn-link btn-primary btn-lg"
                data-original-title="Edit Task"
              >
                <i class="fa fa-edit"></i>
              </button>
              <button
                type="button"
                data-bs-toggle="tooltip"
                title=""
                class="btn btn-link btn-danger"
                data-original-title="Remove"
              >
                <i class="fa fa-times"></i>
              </button>
            </div>
          </td>
        `;

        // Append the new row to the table
        tableBody.appendChild(newRow);

        // Clear input fields
        addNameInput.value = "";
        addPositionInput.value = "";
        addOfficeInput.value = "";

        // Close the modal
        const bootstrapModal = bootstrap.Modal.getInstance(addRowModal);
        bootstrapModal.hide();

        // Add event listeners for the new row's buttons
        const editButton = newRow.querySelector(".btn-link.btn-primary");
        const deleteButton = newRow.querySelector(".btn-link.btn-danger");

        editButton.addEventListener("click", function() {
          currentRow = newRow;
          const name = newRow.querySelector("td:nth-child(1)").textContent.trim();
          const position = newRow.querySelector("td:nth-child(2)").textContent.trim();
          const office = newRow.querySelector("td:nth-child(3)").textContent.trim();

          editNameInput.value = name;
          editPositionInput.value = position;
          editOfficeInput.value = office;

          const bootstrapModal = new bootstrap.Modal(editModal);
          bootstrapModal.show();
        });

        deleteButton.addEventListener("click", function() {
          // const confirmDelete = confirm("Are you sure you want to delete this row?");
          if (confirmDelete) {
            newRow.remove();
            paginateTable(); // Re-paginate after deletion
          }
        });

        paginateTable(); // Re-paginate after adding a new row
      });

      // Fix "Close" button functionality for the add row modal
      const closeButtons = document.querySelectorAll('[data-dismiss="modal"]');
      closeButtons.forEach((button) => {
        button.addEventListener("click", function() {
          const bootstrapModal = bootstrap.Modal.getInstance(addRowModal);
          bootstrapModal.hide();
        });
      });
    });
  </script>

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
                  <label>Name</label>
                  <input
                    id="editName"
                    type="text"
                    class="form-control"
                    placeholder="Edit name" />
                </div>
              </div>
              <div class="col-md-6 pe-0">
                <div class="form-group form-group-default">
                  <label>Position</label>
                  <input
                    id="editPosition"
                    type="text"
                    class="form-control"
                    placeholder="Edit position" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group form-group-default">
                  <label>Office</label>
                  <input
                    id="editOffice"
                    type="text"
                    class="form-control"
                    placeholder="Edit office" />
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
</body>