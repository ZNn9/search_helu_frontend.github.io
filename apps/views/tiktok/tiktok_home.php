<html>

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
  <?php include __DIR__ . '/../shared/header_tiktok.php'; ?>
  <div class="flex flex-col h-screen bg-background">
    <div class="flex flex-1">
      <?php include __DIR__ . '/../shared/sibebar_left_tiktok.php'; ?>
      <!-- Main Content -->
      <main class="flex-1 p-4 space-y-8">
        <!-- Stories -->
        <div class="flex space-x-2 mb-4">
          <?php
          for ($i = 0; $i < 10; $i++) { ?>
            <button class="bg-zinc-200 rounded-full w-8 h-8"></button>
          <?php } ?>
        </div>
        <!-- Button search advenced -->
        <div class="flex justify-between items-center mb-4">
          <button id="advanced-search-btn" class="bg-blue-500 text-white hover:bg-blue-600 active:bg-blue-700 p-2 rounded-lg transition-colors duration-200">
            Search advanced
          </button>
        </div>

        <!-- Advanced Search Modal -->
        <div id="advanced-search-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
          <div class="bg-white rounded-lg p-6 w-3/4">
            <h2 class="text-lg font-bold mb-4">Advanced Search</h2>
            <form id="advanced-search-form">
              <!-- Select Table -->
              <div class="mb-6">
                <h3 class="font-bold mb-2">Select Table:</h3>
                <select id="table-select" name="table" class="border border-gray-300 rounded-lg p-2 w-full">
                  <option value="users">Users</option>
                  <option value="posts">Posts</option>
                  <option value="comments">Comments</option>
                </select>
              </div>

              <!-- Select Columns to Display -->
              <div class="mb-6">
                <h3 class="font-bold mb-2">Columns to Display:</h3>
                <div id="columns-container" class="grid grid-cols-3 gap-2">
                  <!-- Columns will be dynamically populated based on the selected table -->
                </div>
              </div>

              <!-- Add Search Conditions -->
              <div id="search-conditions" class="space-y-4">
                <div class="flex items-center space-x-2">
                  <select name="search_columns[]" class="border border-gray-300 rounded-lg p-2">
                    <!-- Options will be dynamically populated based on the selected table -->
                  </select>
                  <input type="text" name="search_values[]" placeholder="Value" class="border border-gray-300 rounded-lg p-2 flex-1">
                  <button type="button" class="remove-condition bg-red-500 text-white p-2 rounded-lg">Remove</button>
                </div>
              </div>
              <button type="button" id="add-condition" class="bg-green-500 text-white p-2 rounded-lg mt-4">Add Condition</button>

              <!-- Buttons -->
              <div class="flex justify-end space-x-2 mt-4">
                <button type="button" id="cancel-btn" class="bg-gray-300 text-black p-2 rounded-lg">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg">Apply</button>
              </div>
            </form>
          </div>
        </div>

        <?php
        for ($i = 0; $i < 3; $i++) { ?>
          <div class="bg-white shadow rounded-lg">
            <div class="p-4 flex items-center justify-between">
            <a href="/search_helu_frontend/tiktok/account/1" class="flex items-center hover:opacity-80">
            <div class="rounded-full w-12 h-12 bg-zinc-200"></div>
            <span class="ml-4 font-bold text-foreground">zzzz</span>
          </a>

              <button class="text-muted-foreground">...</button>
            </div>
            <div class="bg-zinc-300 h-64"></div>
            <div class="p-4">
              <div class="text-sm text-muted-foreground">73,186 likes</div>
              <div class="text-sm text-muted-foreground">lewisharrietson <span class="text-zinc-500">7h</span></div>
              <div class="text-sm text-muted-foreground">See translation</div>
              <div class="text-sm text-muted-foreground">View all 1,136 comments</div>
              <div class="mt-2">
                <input type="text" placeholder="Add a comment..." class="border border-zinc-300 rounded-lg p-2 w-full" />
              </div>
            </div>
          </div>
        <?php } ?>
      </main>

      <!-- Suggestions (Right) -->
      <aside class="w-1/4 p-4 bg-card">
        <h3 class="text-lg font-bold">Suggestions for you</h3>
        <ul class="mt-4">
          <?php
          for ($i = 0; $i < 5; $i++) { ?>
            <li class="flex items-center py-2">
              <div class="bg-zinc-200 rounded-full w-8 h-8"></div>
              <span class="ml-2 text-muted-foreground">user1</span>
            <?php } ?>
        </ul>
      </aside>
    </div>

    <!-- Footer -->
    <footer class="p-4 text-center text-muted-foreground">
      <p>2024 TikTok</p>
    </footer>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const modal = document.getElementById("advanced-search-modal");
      const openBtn = document.getElementById("advanced-search-btn");
      const cancelBtn = document.getElementById("cancel-btn");
      const addConditionBtn = document.getElementById("add-condition");
      const searchConditions = document.getElementById("search-conditions");
      const tableSelect = document.getElementById("table-select");
      const columnsContainer = document.getElementById("columns-container");

      // Open modal
      openBtn.addEventListener("click", () => {
        modal.classList.remove("hidden");
        fetchTables(); // Fetch tables when modal opens
      });

      // Close modal
      cancelBtn.addEventListener("click", () => {
        modal.classList.add("hidden");
      });

      // Fetch tables from server
      function fetchTables() {
        // Gán lại API
        fetch('/api/get-tables.php') // Gọi API lấy danh sách bảng
          .then((response) => response.json())
          .then((data) => {
            if (data.tables) {
              populateTableSelect(data.tables);
            } else {
              console.error('Error fetching tables:', data.error);
            }
          })
          .catch((error) => console.error('Error fetching tables:', error));
      }

      // Populate table select dropdown
      function populateTableSelect(tables) {
        tableSelect.innerHTML = ""; // Clear existing options
        tables.forEach((table) => {
          const option = document.createElement("option");
          option.value = table;
          option.textContent = table;
          tableSelect.appendChild(option);
        });

        // Fetch columns for the first table by default
        if (tables.length > 0) {
          fetchColumns(tables[0]);
        }
      }

      // Fetch columns for the selected table
      tableSelect.addEventListener("change", () => {
        fetchColumns(tableSelect.value);
      });

      function fetchColumns(table) {
        // Gán lại API
        fetch(`/api/get-columns.php?table=${table}`) // Gọi API lấy danh sách cột
          .then((response) => response.json())
          .then((data) => {
            if (data.columns) {
              populateColumns(data.columns);
            } else {
              console.error('Error fetching columns:', data.error);
            }
          })
          .catch((error) => console.error('Error fetching columns:', error));
      }

      // Populate columns checkboxes and search condition options
      function populateColumns(columns) {
        columnsContainer.innerHTML = ""; // Clear existing columns
        searchConditions.innerHTML = ""; // Clear existing search conditions

        // Populate checkboxes for columns
        columns.forEach((column) => {
          const checkbox = document.createElement("label");
          checkbox.innerHTML = `<input type="checkbox" name="columns[]" value="${column}" checked> ${column}`;
          columnsContainer.appendChild(checkbox);
        });

        // Populate options for search conditions
        const selectElements = document.querySelectorAll('select[name="search_columns[]"]');
        selectElements.forEach((select) => {
          select.innerHTML = ""; // Clear existing options
          columns.forEach((column) => {
            const option = document.createElement("option");
            option.value = column;
            option.textContent = column;
            select.appendChild(option);
          });
        });
      }

      // Add new search condition
      addConditionBtn.addEventListener("click", () => {
        const condition = document.createElement("div");
        condition.classList.add("flex", "items-center", "space-x-2");
        condition.innerHTML = `
          <select name="search_columns[]" class="border border-gray-300 rounded-lg p-2">
            ${Array.from(columnsContainer.querySelectorAll('input[name="columns[]"]')).map(
              (checkbox) => `<option value="${checkbox.value}">${checkbox.value}</option>`
            ).join("")}
          </select>
          <input type="text" name="search_values[]" placeholder="Value" class="border border-gray-300 rounded-lg p-2 flex-1">
          <button type="button" class="remove-condition bg-red-500 text-white p-2 rounded-lg">Remove</button>
        `;
        searchConditions.appendChild(condition);

        // Add event listener to remove button
        condition.querySelector(".remove-condition").addEventListener("click", () => {
          condition.remove();
        });
      });

      // Handle form submission
      document.getElementById("advanced-search-form").addEventListener("submit", (e) => {
        e.preventDefault();

        // Collect selected table
        const selectedTable = tableSelect.value;

        // Collect selected columns
        const selectedColumns = Array.from(document.querySelectorAll('input[name="columns[]"]:checked')).map(
          (checkbox) => checkbox.value
        );

        // Collect search conditions
        const searchConditionsData = Array.from(document.querySelectorAll('select[name="search_columns[]"]')).map(
          (select, index) => ({
            column: select.value,
            value: document.querySelectorAll('input[name="search_values[]"]')[index].value,
          })
        );

        console.log("Selected Table:", selectedTable);
        console.log("Selected Columns:", selectedColumns);
        console.log("Search Conditions:", searchConditionsData);

        // TODO: Send data to the server or update the table dynamically
      });
    });
  </script>
</body>

</html>