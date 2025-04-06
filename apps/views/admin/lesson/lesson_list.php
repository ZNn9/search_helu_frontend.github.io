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
                    data-bs-target="#addRowModal">
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
                    <tbody id="tableBody">
                      <!-- Rows will be inserted here via JS -->
                    </tbody>
                  </table>
                </div>
                <!-- Pagination -->
                <div id="pagination" class="d-flex justify-content-center">
                  <!-- Pagination links will be dynamically inserted here -->
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
      const tableBody = document.getElementById("tableBody");
      const pagination = document.getElementById("pagination");
      let currentPage = 1;
      const perPage = 1;

      function fetchData(page = 1) {
        fetch(`http://127.0.0.1:8000/api/lessons?per_page=${perPage}&page=${page}`)
          .then((response) => response.json())
          .then((data) => {
            const rows = data.data;
            const total = data.total;
            const lastPage = data.last_page;

            // Clear the table body before inserting new rows
            tableBody.innerHTML = '';

            rows.forEach((row) => {
              const tr = document.createElement('tr');
              tr.innerHTML = `
                <td>${row.name}</td>
                <td>${row.position}</td>
                <td>${row.office}</td>
                <td>
                  <button class="btn btn-primary">Edit</button>
                  <button class="btn btn-danger">Delete</button>
                </td>
              `;
              tableBody.appendChild(tr);
            });

            // Handle pagination
            pagination.innerHTML = '';
            for (let i = 1; i <= lastPage; i++) {
              const pageLink = document.createElement('a');
              pageLink.href = '#';
              pageLink.textContent = i;
              pageLink.classList.add('page-link');
              pageLink.classList.toggle('active', i === page);
              pageLink.addEventListener('click', () => {
                currentPage = i;
                fetchData(i);
              });
              pagination.appendChild(pageLink);
            }
          })
          .catch((error) => console.error('Error fetching data:', error));
      }

      // Initial data fetch
      fetchData(currentPage);
    });
  </script>

</body>