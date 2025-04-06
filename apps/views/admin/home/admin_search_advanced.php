<?php
// Debugging: Check if the file exists before including
if (!file_exists(__DIR__ . '/../shared/left_sidebar.php')) {
    echo "Error: left_sidebar.php not found!";
} else {
    include __DIR__ . '/../shared/left_sidebar.php';
}
?>

<head>

    <style>
        /* Modal visibility */
        .hidden {
            display: none;
        }

        #advanced-search-modal {
            z-index: 1000;
        }

        .remove-condition {
            min-width: 80px;
            text-align: center;
        }
    </style>
</head>

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
                    <!-- Advanced Search Button -->
                    <div class="container my-4">
                        <!-- Advanced Search Button -->
                        <button id="advanced-search-btn"
                            class="btn btn-primary btn-round ms-auto"
                            data-bs-toggle="modal"
                            data-bs-target="#addRowModal">
                            Search Advanced
                        </button>

                        <!-- Advanced Search Modal -->
                        <div id="advanced-search-modal" class="modal fade" tabindex="-1" aria-labelledby="advancedSearchModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="advancedSearchModalLabel">Advanced Search</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="advanced-search-form">
                                            <!-- Select Table -->
                                            <div class="mb-3">
                                                <label for="table-select" class="form-label">Select Table:</label>
                                                <select id="table-select" name="table" class="form-select">
                                                    <!-- Options will be dynamically populated -->
                                                </select>
                                            </div>

                                            <!-- Select Columns to Display -->
                                            <div class="mb-3">
                                                <label class="form-label">Columns to Display:</label>
                                                <div id="columns-container" class="row">
                                                    <!-- Columns will be dynamically populated -->
                                                </div>
                                            </div>

                                            <!-- Add Search Conditions -->
                                            <div id="search-conditions" class="mb-3">
                                                <label class="form-label">Search Conditions:</label>
                                                <!-- Search conditions will be dynamically added -->
                                            </div>
                                            <button type="button" id="add-condition" class="btn btn-success">Add Condition</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" id="apply-search" class="btn btn-primary">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


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
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header border-0">
                                                        <h5 class="modal-title">
                                                            <span class="fw-mediumbold">Search Advanced</span>
                                                        </h5>
                                                        <button
                                                            type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="advanced-search-form">
                                                            <!-- Select Table -->
                                                            <div class="mb-3">
                                                                <label for="table-select" class="form-label">Select Table:</label>
                                                                <select id="table-select" name="table" class="form-select">
                                                                    <!-- Options will be dynamically populated -->
                                                                </select>
                                                            </div>

                                                            <!-- Select Columns to Display -->
                                                            <div class="mb-3">
                                                                <label class="form-label">Columns to Display:</label>
                                                                <div id="columns-container" class="row">
                                                                    <!-- Columns will be dynamically populated -->
                                                                </div>
                                                            </div>

                                                            <!-- Add Search Conditions -->
                                                            <div id="search-conditions" class="mb-3">
                                                                <label class="form-label">Search Conditions:</label>
                                                                <!-- Search conditions will be dynamically added -->
                                                            </div>
                                                            <button type="button" id="add-condition" class="btn btn-success">Add Condition</button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer border-0">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" id="apply-search" class="btn btn-primary">Apply</button>
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

    document.addEventListener("DOMContentLoaded", () => {
        const tableSelect = document.getElementById("table-select");
        const columnsContainer = document.getElementById("columns-container");
        const searchConditions = document.getElementById("search-conditions");
        const addConditionBtn = document.getElementById("add-condition");
        const applySearchBtn = document.getElementById("apply-search");

        // Fetch all table names
        async function fetchTables() {

            const apiUrl = `http://${window.location.hostname}:3000/api/table`;
            try {
                const response = await fetch(apiUrl, {
                    method: 'GET',
                     mode: 'no-cors',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();
                if (data.tables && data.tables.length > 0) {
                    populateTableSelect(data.tables);
                } else {
                    alert("No tables found in the database.");
                }
            } catch (error) {
                console.error('Error fetching tables:', error);
                alert("Failed to fetch tables. Please try again later.");
            }
        }

        function populateTableSelect(tables) {
            tableSelect.innerHTML = "";
            tables.forEach(table => {
                const option = document.createElement("option");
                option.value = table;
                option.textContent = table;
                tableSelect.appendChild(option);
            });

            if (tables.length > 0) {
                fetchColumns(tables[0]);
            }
        }

        tableSelect.addEventListener("change", () => {
            fetchColumns(tableSelect.value);
        });

        async function fetchColumns(table) {
            const apiUrl = `http://${window.location.hostname}:3000/api/${table}/attributes-name-only`;
            try {
                const response = await fetch(apiUrl);
                const data = await response.json();
                if (data.attributes) {
                    populateColumns(data.attributes);
                } else {
                    console.error("No columns found.");
                }
            } catch (error) {
                console.error('Error fetching columns:', error);
            }
        }

        // Populate columns checkboxes
        function populateColumns(columns) {
            columnsContainer.innerHTML = "";
            searchConditions.innerHTML = "";

            columns.forEach(column => {
                const checkboxDiv = document.createElement("div");
                checkboxDiv.className = "col-4";

                const checkbox = document.createElement("input");
                checkbox.type = "checkbox";
                checkbox.name = "columns[]";
                checkbox.value = column;
                checkbox.className = "form-check-input";

                const label = document.createElement("label");
                label.textContent = column;
                label.className = "form-check-label ms-2";

                checkboxDiv.appendChild(checkbox);
                checkboxDiv.appendChild(label);
                columnsContainer.appendChild(checkboxDiv);
            });
        }

        // Add search condition
        addConditionBtn.addEventListener("click", () => {
            const conditionDiv = document.createElement("div");
            conditionDiv.className = "row mb-2";

            const columnSelect = document.createElement("select");
            columnSelect.name = "search_columns[]";
            columnSelect.className = "form-select col me-2";
            columnsContainer.querySelectorAll("input[name='columns[]']").forEach(checkbox => {
                const option = document.createElement("option");
                option.value = checkbox.value;
                option.textContent = checkbox.value;
                columnSelect.appendChild(option);
            });

            const operatorSelect = document.createElement("select");
            operatorSelect.name = "search_operators[]";
            operatorSelect.className = "form-select col me-2";
            ["=", "!=", ">", "<", ">=", "<="].forEach(operator => {
                const option = document.createElement("option");
                option.value = operator;
                option.textContent = operator;
                operatorSelect.appendChild(option);
            });

            const valueInput = document.createElement("input");
            valueInput.type = "text";
            valueInput.name = "search_values[]";
            valueInput.className = "form-control col";

            const removeBtn = document.createElement("button");
            removeBtn.type = "button";
            removeBtn.className = "btn btn-danger col-auto ms-2";
            removeBtn.textContent = "Remove";
            removeBtn.addEventListener("click", () => {
                conditionDiv.remove();
            });

            conditionDiv.appendChild(columnSelect);
            conditionDiv.appendChild(operatorSelect);
            conditionDiv.appendChild(valueInput);
            conditionDiv.appendChild(removeBtn);
            searchConditions.appendChild(conditionDiv);
        });

        // Handle search form submission
        applySearchBtn.addEventListener("click", (e) => {
            e.preventDefault();

            const selectedTable = tableSelect.value;
            const selectedColumns = Array.from(document.querySelectorAll('input[name="columns[]"]:checked')).map(
                checkbox => checkbox.value
            );
            const searchConditionsData = Array.from(document.querySelectorAll('select[name="search_columns[]"]')).map(
                (select, index) => ({
                    column: select.value,
                    operator: document.querySelectorAll('select[name="search_operators[]"]')[index].value,
                    value: document.querySelectorAll('input[name="search_values[]"]')[index].value,
                })
            );

            const queryParams = new URLSearchParams();
            queryParams.append("columns", selectedColumns.join(","));
            searchConditionsData.forEach(condition => {
                queryParams.append(condition.column, `${condition.operator}:${condition.value}`);
            });

            fetch(`/search/${selectedTable}?${queryParams.toString()}`)
                .then(response => response.json())
                .then(data => {
                    console.log("Search Results:", data);
                    // Handle search results (e.g., display in a table)
                })
                .catch(error => console.error('Error performing search:', error));
        });

        // Fetch tables on page load
        fetchTables();
    });
</script>