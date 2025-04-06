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
                        data-bs-target="#addRowModal"
                      >
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
                      aria-hidden="true"
                    >
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
                              aria-label="Close"
                            >
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
                                      placeholder="fill name"
                                    />
                                  </div>
                                </div>
                                <div class="col-md-6 pe-0">
                                  <div class="form-group form-group-default">
                                    <label>Position</label>
                                    <input
                                      id="addPosition"
                                      type="text"
                                      class="form-control"
                                      placeholder="fill position"
                                    />
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-group-default">
                                    <label>Office</label>
                                    <input
                                      id="addOffice"
                                      type="text"
                                      class="form-control"
                                      placeholder="fill office"
                                    />
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer border-0">
                            <button
                              type="button"
                              id="addRowButton"
                              class="btn btn-primary"
                            >
                              Add
                            </button>
                            <button
                              type="button"
                              class="btn btn-danger"
                              data-dismiss="modal"
                            >
                              Close
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="table-responsive">
                      <table
                        id="add-row"
                        class="display table table-striped table-hover"
                      >
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
    document.addEventListener("DOMContentLoaded", function () {
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
      const addRowModal = document.getElementById("addRowModal");
      const tableBody = document.querySelector("#add-row tbody");

      let currentRow = null; // To track the row being edited

      if (!editModal) {
        console.error("Edit modal not found!");
        return;
      }

      // Handle edit functionality
      editButtons.forEach((button) => {
        button.addEventListener("click", function () {
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
      saveChangesButton.addEventListener("click", function () {
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

      // Handle delete functionality
      deleteButtons.forEach((button) => {
        button.addEventListener("click", function () {
          const row = this.closest("tr");
          if (row) {
            // Confirm before deleting
            const confirmDelete = confirm("Are you sure you want to delete this row?");
            if (confirmDelete) {
              row.remove();
            }
          } else {
            console.error("Row not found!");
          }
        });
      });
      // Handle add row functionality
      addRowButton.addEventListener("click", function () {
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

        // Clear the input fields
        addNameInput.value = "";
        addPositionInput.value = "";
        addOfficeInput.value = "";

        // Hide the modal
        const bootstrapModal = bootstrap.Modal.getInstance(addRowModal);
        bootstrapModal.hide();

        // Reinitialize event listeners for edit and delete buttons
        initializeRowActions();
      });

      function initializeRowActions() {
        const editButtons = document.querySelectorAll(".btn-link.btn-primary");
        const deleteButtons = document.querySelectorAll(".btn-link.btn-danger");

        // Reattach event listeners for edit and delete buttons
        editButtons.forEach((button) => {
          button.addEventListener("click", function () {
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

        deleteButtons.forEach((button) => {
          button.addEventListener("click", function () {
            const row = this.closest("tr");
            if (row) {
              const confirmDelete = confirm("Are you sure you want to delete this row?");
              if (confirmDelete) {
                row.remove();
              }
            } else {
              console.error("Row not found!");
            }
          });
        });
      }

      // Initialize actions for existing rows
      initializeRowActions();
    });
  </script>

  <!-- Edit Modal -->
  <div
    class="modal fade"
    id="editRowModal"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
  >
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
            aria-label="Close"
          ></button>
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
                    placeholder="Edit name"
                  />
                </div>
              </div>
              <div class="col-md-6 pe-0">
                <div class="form-group form-group-default">
                  <label>Position</label>
                  <input
                    id="editPosition"
                    type="text"
                    class="form-control"
                    placeholder="Edit position"
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group form-group-default">
                  <label>Office</label>
                  <input
                    id="editOffice"
                    type="text"
                    class="form-control"
                    placeholder="Edit office"
                  />
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
            data-bs-dismiss="modal"
          >
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
</body>


