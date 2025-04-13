<?php
$token = $_COOKIE['token'] ?? null;

// Kiểm tra nếu token không tồn tại
if (!$token) {
    echo "<script>console.error('Token not found in PHP.');</script>";
}

// Debugging: Check if the file exists before including
if (!file_exists(__DIR__ . '/../shared/left_sidebar.php')) {
    echo "Error: left_sidebar.php not found!";
} else {
    include __DIR__ . '/../shared/left_sidebar.php';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Custom CSS with higher specificity */
        body .hidden {
            display: none !important;
        }

        /* Modal z-index fixes */
        body #advanced-search-modal,
        body #addRowModal,
        body #editRowModal {
            z-index: 1055 !important; /* Higher than default */
        }

        body .modal-backdrop {
            z-index: 1050 !important;
        }

        /* Custom button styles */
        body .remove-condition {
            min-width: 80px;
            text-align: center;
        }

        /* Table styles */
        body .table-responsive {
            overflow-x: auto;
        }

        body .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgba(33, 40, 50, 0.15);
        }

        body .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        }

        /* Form control adjustments */
        body .form-select,
        body .form-control {
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            line-height: 1.5;
        }

        /* Button adjustments */
        body .btn-round {
            border-radius: 50px !important;
        }

        /* Pagination controls */
        body .pagination-controls {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        /* Fix for modal padding */
        body .modal-body {
            padding: 1.5rem;
        }

        /* Fix for checkbox alignment */
        body .form-check-input {
            margin-top: 0.2em;
        }
    </style>
</head>

<body>
    <!-- Phần còn lại của HTML giữ nguyên -->
    <div class="wrapper">
        <div class="container">
            <?php
            if (!file_exists(__DIR__ . '/shared/header.php')) {
                echo "Error: header.php not found!";
            } else {
                include __DIR__ . '/shared/header.php';
            }
            ?>

            <main class="flex-1 p-4 space-y-8" style="margin-top: 2rem;">
                <!-- Advanced Search Button -->
                <div class="container my-4" >
                    <button id="advanced-search-btn" class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#advanced-search-modal">
                        <i class="bi bi-search"></i> Advanced Search
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
                                        <div class="mb-3">
                                            <label for="table-select" class="form-label">Select Table:</label>
                                            <select id="table-select" name="table" class="form-select"></select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Columns to Display:</label>
                                            <div id="columns-container" class="row g-2"></div>
                                        </div>
                                        <div id="search-conditions" class="mb-3">
                                            <label class="form-label">Search Conditions:</label>
                                        </div>
                                        <button type="button" id="add-condition" class="btn btn-success">
                                            <i class="bi bi-plus-circle"></i> Add Condition
                                        </button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" id="apply-search" class="btn btn-primary">Apply</button>
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
                                        <h4 class="card-title">Data Table</h4>
                                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">
                                            <i class="bi bi-plus-lg"></i> Add Row
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <label for="rowsPerPageSelect" class="form-label me-2">Rows per page:</label>
                                            <select id="rowsPerPageSelect" class="form-select form-select-sm d-inline-block w-auto">
                                                <option value="5" selected>5</option>
                                                <option value="10">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Add Row Modal -->
                                    <div class="modal fade" id="addRowModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title">Add New Row</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="add-row-form">
                                                        <div class="mb-3">
                                                            <label for="addName" class="form-label">Name:</label>
                                                            <input id="addName" type="text" class="form-control" placeholder="Enter name">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="addPosition" class="form-label">Position:</label>
                                                            <input id="addPosition" type="text" class="form-control" placeholder="Enter position">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="addOffice" class="form-label">Office:</label>
                                                            <input id="addOffice" type="text" class="form-control" placeholder="Enter office">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="button" id="apply-add-row" class="btn btn-primary">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead id="table-header"></thead>
                                            <tbody id="table-body"></tbody>
                                            <tfoot id="table-footer"></tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

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
    <div class="modal fade" id="editRowModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Edit Row</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="edit-form-container"></div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-primary" id="save-changes">Save Changes</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
   
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editModal = document.getElementById("editRowModal");
            const saveChangesButton = document.getElementById("save-changes");
            const applyAddRowButton = document.getElementById("apply-add-row");
            const addNameInput = document.getElementById("addName");
            const addPositionInput = document.getElementById("addPosition");
            const addOfficeInput = document.getElementById("addOffice");
            const tableBody = document.getElementById("table-body");
            const tableHeader = document.getElementById("table-header");
            const tableFooter = document.getElementById("table-footer");
            const addRowModal = document.getElementById("addRowModal");
            const rowsPerPageSelect = document.getElementById("rowsPerPageSelect");
            let rowsPerPage = parseInt(rowsPerPageSelect.value, 10);
            let currentPage = 1;
            let currentRow = null;

            function paginateTable() {
                const rows = Array.from(tableBody.querySelectorAll("tr"));
                const totalRows = rows.length;
                const totalPages = Math.ceil(totalRows / rowsPerPage);

                if (currentPage > totalPages) currentPage = totalPages || 1;

                rows.forEach((row, index) => {
                    row.style.display = (index >= (currentPage - 1) * rowsPerPage && index < currentPage * rowsPerPage) ? "" : "none";
                });

                updatePaginationControls(totalPages);
            }

            function updatePaginationControls(totalPages) {
                let paginationContainer = document.getElementById("pagination-controls") || document.createElement("div");
                paginationContainer.id = "pagination-controls";
                paginationContainer.className = "pagination-controls mt-3";
                if (!paginationContainer.parentElement) tableBody.parentElement.appendChild(paginationContainer);

                paginationContainer.innerHTML = "";
                for (let i = 1; i <= totalPages; i++) {
                    const pageButton = document.createElement("button");
                    pageButton.textContent = i;
                    pageButton.className = `btn btn-sm btn-secondary mx-1 ${i === currentPage ? "btn-primary" : ""}`;
                    pageButton.addEventListener("click", () => {
                        currentPage = i;
                        paginateTable();
                    });
                    paginationContainer.appendChild(pageButton);
                }
            }

            rowsPerPageSelect.addEventListener("change", () => {
                rowsPerPage = parseInt(rowsPerPageSelect.value, 10);
                currentPage = 1;
                paginateTable();
            });

            function attachEditDeleteEvents() {
                document.querySelectorAll(".btn-link.btn-primary").forEach(button => {
                    button.addEventListener("click", function() {
                        currentRow = this.closest("tr");
                        const rowData = Array.from(currentRow.querySelectorAll("td:not(:last-child)")).map(td => td.textContent.trim());
                        const headers = Array.from(tableHeader.querySelectorAll("th:not(:last-child)")).map(th => th.textContent.trim());

                        const editFormContainer = document.getElementById("edit-form-container");
                        editFormContainer.innerHTML = headers.map((header, index) => `
                            <div class="mb-3">
                                <label for="edit-${header}" class="form-label">${header}</label>
                                <input id="edit-${header}" type="text" class="form-control" value="${rowData[index]}" placeholder="Edit ${header}">
                            </div>
                        `).join("");

                        new bootstrap.Modal(editModal).show();
                    });
                });

                document.querySelectorAll(".btn-link.btn-danger").forEach(button => {
                    button.addEventListener("click", function() {
                        if (confirm("Are you sure you want to delete this row?")) {
                            this.closest("tr").remove();
                            paginateTable();
                        }
                    });
                });
            }

            saveChangesButton.addEventListener("click", () => {
                if (currentRow) {
                    const headers = Array.from(tableHeader.querySelectorAll("th:not(:last-child)")).map(th => th.textContent.trim());
                    headers.forEach((header, index) => {
                        const input = document.getElementById(`edit-${header}`);
                        currentRow.querySelector(`td:nth-child(${index + 1})`).textContent = input.value.trim();
                    });
                    bootstrap.Modal.getInstance(editModal).hide();
                    paginateTable();
                }
            });

            applyAddRowButton.addEventListener("click", () => {
                const name = addNameInput.value.trim();
                const position = addPositionInput.value.trim();
                const office = addOfficeInput.value.trim();

                if (!name || !position || !office) {
                    alert("Please fill in all fields.");
                    return;
                }

                const newRow = document.createElement("tr");
                newRow.innerHTML = `
                    <td>${name}</td>
                    <td>${position}</td>
                    <td>${office}</td>
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
                addNameInput.value = addPositionInput.value = addOfficeInput.value = "";
                bootstrap.Modal.getInstance(addRowModal).hide();
                attachEditDeleteEvents();
                paginateTable();
            });

            // Advanced Search Logic
            const tableSelect = document.getElementById("table-select");
            const columnsContainer = document.getElementById("columns-container");
            const searchConditions = document.getElementById("search-conditions");
            const addConditionBtn = document.getElementById("add-condition");
            const applySearchBtn = document.getElementById("apply-search");

            let availableColumns = [];

            async function fetchTables() {
                try {
                    const response = await fetch(`http://localhost:3000/api/table`);
                    const data = await response.json();
                    if (data.tables?.length) populateTableSelect(data.tables);
                    else alert("No tables found.");
                } catch (error) {
                    console.error('Error fetching tables:', error);
                    alert("Failed to fetch tables.");
                }
            }

            function populateTableSelect(tables) {
                tableSelect.innerHTML = tables.map(table => `<option value="${table}">${table}</option>`).join("");
                fetchColumns(tables[0]);
            }

            tableSelect.addEventListener("change", () => {
                // Xóa các điều kiện tìm kiếm
                searchConditions.innerHTML = "<label class='form-label'>Search Conditions:</label>";

                // Xóa các cột đã chọn bằng cách bỏ chọn tất cả checkbox trong columnsContainer
                const checkboxes = columnsContainer.querySelectorAll('input[name="columns[]"]');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = false; // Bỏ chọn tất cả checkbox
                });

                // Tải lại các cột cho bảng mới
                fetchColumns(tableSelect.value);
            });

            async function fetchColumns(table) {
                try {
                    const apiUrl = `http://localhost:3000/api/table/${table}/attributes-name-only`;
                    console.log(`Fetching columns for table: ${table} from ${apiUrl}`);
                    const response = await fetch(apiUrl);
                    if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
                    const data = await response.json();
                    console.log(`Columns response for ${table}:`, data);

                    if (data.tableInfo?.columns?.length) {
                        availableColumns = data.tableInfo.columns.map(col => col.name);
                        populateColumns(availableColumns);
                    } else {
                        console.warn(`No columns found for table ${table}:`, data);
                        alert(`No columns found for table ${table}. Using dummy columns.`);
                        availableColumns = ["id", "title", "description"];
                        populateColumns(availableColumns);
                    }
                } catch (error) {
                    console.error(`Error fetching columns for ${table}:`, error);
                    alert(`Failed to fetch columns for ${table}. Using dummy columns.`);
                    availableColumns = ["id", "title", "description"];
                    populateColumns(availableColumns);
                }
            }

            function populateColumns(columns) {
                columnsContainer.innerHTML = "";
                if (!columns || columns.length === 0) {
                    columnsContainer.innerHTML = "<p>No columns available.</p>";
                    return;
                }
                columns.forEach(column => {
                    const checkboxDiv = document.createElement("div");
                    checkboxDiv.className = "col-4";
                    checkboxDiv.innerHTML = `
            <input type="checkbox" name="columns[]" value="${column}" class="form-check-input" id="col-${column}">
            <label class="form-check-label ms-2" for="col-${column}">${column}</label>
        `;
                    columnsContainer.appendChild(checkboxDiv);
                });
            }

            function getSelectedColumns() {
                const selectedColumnElements = searchConditions.querySelectorAll('select[name="search_columns[]"]');
                return Array.from(selectedColumnElements).map(select => select.value);
            }

            addConditionBtn.addEventListener("click", () => {
                const selectedColumns = getSelectedColumns();
                const availableForNewCondition = availableColumns.filter(col => !selectedColumns.includes(col));

                if (availableForNewCondition.length === 0) {
                    alert("All columns are already used in conditions. Cannot add more.");
                    return;
                }

                const conditionDiv = document.createElement("div");
                conditionDiv.className = "row mb-2";
                conditionDiv.innerHTML = `
        <select name="search_columns[]" class="form-select col me-2">
            ${availableForNewCondition.map(col => `<option value="${col}">${col}</option>`).join("")}
        </select>
        <select name="search_operators[]" class="form-select col me-2">
            ${["="].map(op => `<option value="${op}">${op}</option>`).join("")}
        </select>
        <input type="text" name="search_values[]" class="form-control col">
        <button type="button" class="btn btn-danger col-auto ms-2 remove-condition">Remove</button>
    `;
                conditionDiv.querySelector(".remove-condition").addEventListener("click", () => {
                    conditionDiv.remove();
                    updateAllConditionDropdowns();
                });
                searchConditions.appendChild(conditionDiv);
                updateAllConditionDropdowns();
            });

            function updateAllConditionDropdowns() {
                const allConditionSelects = searchConditions.querySelectorAll('select[name="search_columns[]"]');
                const selectedColumns = getSelectedColumns();

                allConditionSelects.forEach(select => {
                    const currentValue = select.value;
                    select.innerHTML = availableColumns
                        .filter(col => !selectedColumns.includes(col) || col === currentValue)
                        .map(col => `<option value="${col}" ${col === currentValue ? 'selected' : ''}>${col}</option>`)
                        .join("");
                });
            }

            applySearchBtn.addEventListener("click", async () => {
                const selectedTable = tableSelect.value;
                const selectedColumns = Array.from(document.querySelectorAll('input[name="columns[]"]:checked')).map(cb => cb.value);
                const conditions = Array.from(searchConditions.querySelectorAll(".row")).map(row => ({
                    column: row.querySelector('select[name="search_columns[]"]').value,
                    operator: row.querySelector('select[name="search_operators[]"]').value,
                    value: row.querySelector('input[name="search_values[]"]').value
                }));

                const baseUrl = `http://localhost:3000/api/search/${selectedTable}`;
                const queryParams = new URLSearchParams();

                if (selectedColumns.length > 0) {
                    queryParams.append("columns", selectedColumns.join(","));
                } // Nếu không chọn cột nào, API sẽ trả về tất cả cột

                conditions.forEach(condition => {
                    if (condition.column && condition.value) {
                        queryParams.append(condition.column, condition.value);
                    }
                });

                const finalUrl = `${baseUrl}?${queryParams.toString()}`;
                console.log("Final URL:", finalUrl);

                try {
                    const token = <?php echo json_encode($token); ?>;
                    console.log("Token:", token);
                    if (!token) throw new Error("Token is null or undefined");

                    const response = await fetch(finalUrl, {
                        headers: {
                            'Authorization': `Bearer ${token}`,
                            'Content-Type': 'application/json',
                        }
                    });

                    if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

                    const data = await response.json();
                    console.log("Search Results:", data);
                    
                    // Xử lý dữ liệu trả về từ API
                    if (data.rows && data.rows.length > 0) {
                        const allColumns = Object.keys(data.rows[0]); // Lấy tất cả cột từ dòng đầu tiên
                        const displayColumns = selectedColumns.length > 0 ? selectedColumns : allColumns;

                        // Cập nhật header và footer của bảng
                        tableHeader.innerHTML = `
                <tr>
                    ${displayColumns.map(col => `<th>${col}</th>`).join("")}
                    <th style="width: 10%">Action</th>
                </tr>
            `;
                        tableFooter.innerHTML = tableHeader.innerHTML;

                        // Cập nhật body của bảng
                        tableBody.innerHTML = data.rows.map(row => `
                <tr>
                    ${displayColumns.map(col => `<td>${row[col] || ''}</td>`).join("")}
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
                </tr>
            `).join("");

                        attachEditDeleteEvents();
                        paginateTable();
                    } else {
                        tableBody.innerHTML = "<tr><td colspan='100'>No data found</td></tr>";
                    }

                    bootstrap.Modal.getInstance(document.getElementById("advanced-search-modal")).hide();
                } catch (error) {
                    console.error('Error performing search:', error);
                    alert('Failed to perform search. Please check your authentication or server.');
                }
            });

            fetchTables();
            paginateTable();
        });
    </script>
</body>

</html>