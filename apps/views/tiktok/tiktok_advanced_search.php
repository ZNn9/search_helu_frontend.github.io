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
        <!-- Advanced Search Button -->
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
                  <!-- Options will be dynamically populated -->
                </select>
              </div>

              <!-- Select Columns to Display -->
              <div class="mb-6">
                <h3 class="font-bold mb-2">Columns to Display:</h3>
                <div id="columns-container" class="grid grid-cols-3 gap-2">
                  <!-- Columns will be dynamically populated -->
                </div>
              </div>

              <!-- Add Search Conditions -->
              <div id="search-conditions" class="space-y-4">
                <!-- Search conditions will be dynamically added -->
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

        <!-- Results Section -->
        <div id="results-section" class="bg-white shadow rounded-lg p-4">
          <h3 class="text-lg font-bold mb-4">Search Results</h3>
          <div id="results-container" class="overflow-x-auto">
            <!-- Results will be dynamically populated -->
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
      const resultsContainer = document.getElementById("results-container");

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
        fetch('/api/get-tables.php')
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
        tableSelect.innerHTML = "";
        tables.forEach((table) => {
          const option = document.createElement("option");
          option.value = table;
          option.textContent = table;
          tableSelect.appendChild(option);
        });

        if (tables.length > 0) {
          fetchColumns(tables[0]);
        }
      }

      // Fetch columns for the selected table
      tableSelect.addEventListener("change", () => {
        fetchColumns(tableSelect.value);
      });

      function fetchColumns(table) {
        fetch(`/api/get-columns.php?table=${table}`)
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
        columnsContainer.innerHTML = "";
        searchConditions.innerHTML = "";

        columns.forEach((column) => {
          const checkbox = document.createElement("label");
          checkbox.innerHTML = `<input type="checkbox" name="columns[]" value="${column}" checked> ${column}`;
          columnsContainer.appendChild(checkbox);
        });
      }

      // Handle form submission
      document.getElementById("advanced-search-form").addEventListener("submit", (e) => {
        e.preventDefault();

        const selectedTable = tableSelect.value;
        const selectedColumns = Array.from(document.querySelectorAll('input[name="columns[]"]:checked')).map(
          (checkbox) => checkbox.value
        );
        const searchConditionsData = Array.from(document.querySelectorAll('select[name="search_columns[]"]')).map(
          (select, index) => ({
            column: select.value,
            value: document.querySelectorAll('input[name="search_values[]"]')[index].value,
          })
        );

        // Send data to server
        fetch('/api/advanced-search.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({
            table: selectedTable,
            columns: selectedColumns,
            conditions: searchConditionsData,
          }),
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.results) {
              displayResults(data.results, selectedColumns);
            } else {
              console.error('Error fetching results:', data.error);
            }
          })
          .catch((error) => console.error('Error fetching results:', error));
      });

      // Display results in the results section
      function displayResults(results, columns) {
        resultsContainer.innerHTML = "";

        if (results.length === 0) {
          resultsContainer.innerHTML = "<p>No results found.</p>";
          return;
        }

        const table = document.createElement("table");
        table.classList.add("table-auto", "w-full", "border-collapse", "border", "border-gray-300");

        // Create table header
        const thead = document.createElement("thead");
        const headerRow = document.createElement("tr");
        columns.forEach((column) => {
          const th = document.createElement("th");
          th.textContent = column;
          th.classList.add("border", "border-gray-300", "p-2", "bg-gray-100");
          headerRow.appendChild(th);
        });
        thead.appendChild(headerRow);
        table.appendChild(thead);

        // Create table body
        const tbody = document.createElement("tbody");
        results.forEach((row) => {
          const tr = document.createElement("tr");
          columns.forEach((column) => {
            const td = document.createElement("td");
            td.textContent = row[column] || "";
            td.classList.add("border", "border-gray-300", "p-2");
            tr.appendChild(td);
          });
          tbody.appendChild(tr);
        });
        table.appendChild(tbody);

        resultsContainer.appendChild(table);
      }
    });
  </script>
</body>

</html>