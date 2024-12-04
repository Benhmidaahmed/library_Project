let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}
list.forEach((item) => item.addEventListener("mouseover", activeLink));
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

document.addEventListener("DOMContentLoaded", () => {
  const navItems = document.querySelectorAll(".navigation ul li a");
  const dynamicContent = document.getElementById("dynamic-content");
  navItems.forEach((item) => {
    item.addEventListener("click", (e) => {
      e.preventDefault(); 
      const target = e.target.closest("a");
      const section = target.dataset.section;
      dynamicContent.innerHTML = "";

      if (section === "customers") {
        loadCustomers(dynamicContent);
      } else if (section === "books") {
        loadBooks(dynamicContent);
      }
    });
  });

  loadBooks(dynamicContent);
});

function loadCustomers(container) {
  container.innerHTML = `
      <div class="CustomersList">
          <h2>Customers</h2>
          <table>
              <thead>
                  <tr>
                      <td>Email</td>
                      <td>Borrowed Books Number</td>
                      <td>Status</td>
                  </tr>
              </thead>
              <tbody id="customer-rows">
                  <!-- Rows will be dynamically inserted here -->
              </tbody>
          </table>
      </div>
  `;
  fetchCustomerData();
}

function loadBooks(container) {
  container.innerHTML = `
      <div class="BooksInStock">
          <h2>Books In Stock</h2>
          <table>
              <thead>
                  <tr>
                      <td>Book Cover</td>
                      <td>Book Title</td>
                      <td>Author</td>
                      <td>Available Copies</td>
                      <td>Status</td>
                      <td>actions</td>
                  </tr>
              </thead>
              <tbody id="booksTableBody">
                  <!-- Rows will be dynamically inserted here -->
              </tbody>
          </table>
      </div>
  `;
  fetchBookData();
}


function fetchCustomerData() {
  fetch("assets/php/fetch_customers.php")
    .then((response) => {
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      return response.json();
    })
    .then((data) => {
      const tableBody = document.getElementById("customer-rows");
      tableBody.innerHTML = data
        .map(
          (customer) => `
              <tr>
                  <td>${customer.email}</td>
                  <td>${customer.borrowed_books}</td>
                  <td><span class="status ${customer.status === "All Returned" ? "AllReturned" : "NotReturned"}">
                      ${customer.status}
                  </span></td>
              </tr>
          `
        )
        .join("");
    })
    .catch((error) => console.error("Error fetching customers:", error));
}

function handleModify(event) {
  const bookName = event.target.dataset.name; 

  const newTitle = prompt(`Enter the new title for "${bookName}":`, bookName);
  const newAuthor = prompt(`Enter the new author for "${bookName}":`);
  const newQuantity = prompt(`Enter the new quantity for "${bookName}":`);
  const newStatus = confirm(`Set status to "Available"? Click "Cancel" for "Unavailable".`) ? 1 : 0;
  const newImageUrl = prompt(`Enter the new image URL for "${bookName}":`);

  if (newTitle && newAuthor && newQuantity && newImageUrl) {
    fetch("assets/php/modify_book.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        originalName: bookName, 
        newTitle,
        newAuthor,
        newQuantity: parseInt(newQuantity, 10),
        newStatus,
        newImageUrl,
      }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          alert("Book modified successfully!");
          fetchBookData();
        } else {
          alert(`Error: ${data.error}`);
        }
      })
      .catch((error) => console.error("Error modifying book:", error));
  } else {
    alert("Modification cancelled or invalid inputs provided.");
  }
}


function handleDelete(event) {
  const bookName = event.target.dataset.name;

  if (confirm(`Are you sure you want to delete "${bookName}"?`)) {
    fetch("assets/php/delete_book.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ bookName }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          alert("Book deleted successfully!");
          fetchBookData();
        } else {
          alert(`Error: ${data.error}`);
        }
      })
      .catch((error) => console.error("Error deleting book:", error));
  }
}

function fetchBookData() {
  fetch("assets/php/fetch_books.php")
    .then((response) => {
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      return response.json();
    })
    .then((books) => {
      console.log(books); 
      const tableBody = document.getElementById("booksTableBody");
      tableBody.innerHTML = books
        .map(
          (book) => `
              <tr>
                  <td><img src="${book.image_url}" alt="${book.nom_livre}" width="50" height="50"></td>
                  <td>${book.nom_livre}</td>
                  <td>${book.nom_auteur}</td>
                  <td>${book.quantite}</td>
                  <td><span class="status ${book.etat === 1 ? "Available" : "Unavailable"}">
                      ${book.etat === 1 ? "Available" : "Unavailable"}
                  </span></td>
                  <td>
                      <button class="modify-btn" data-name="${book.nom_livre}"><i class="bi bi-pencil-square"></i></button>
                      <button class="delete-btn" data-name="${book.nom_livre}"><i class="bi bi-trash-fill"></i></button>
                  </td>
              </tr>
          `
        )
        .join("");

      document.querySelectorAll(".modify-btn").forEach((btn) =>
        btn.addEventListener("click", handleModify)
      );
      document.querySelectorAll(".delete-btn").forEach((btn) =>
        btn.addEventListener("click", handleDelete)
      );
    })
    .catch((error) => console.error("Error fetching books:", error));
}

const addBookLink = document.getElementById("add-book-link");
addBookLink.addEventListener("click", (e) => {
  console.log("nkmk");

  window.location.href = "ajout.php"; 
});



document.addEventListener("DOMContentLoaded", () => {

  function updateCards() {
    fetch("assets/php/fetch_counts.php") 
      .then((response) => {
        if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
        return response.json();
      })
      .then((data) => {
        if (data.error) {
          console.error(data.error);
          return;
        }

        document.getElementById("subscribersCount").textContent = data.subscribers;
        document.getElementById("reservedBooksCount").textContent = data.reservedBooks;
        document.getElementById("returnedBooksCount").textContent = data.returnedBooks;
        document.getElementById("totalBooksCount").textContent = data.totalBooks;
      })
      .catch((error) => console.error("Error fetching counts:", error));
  }

  updateCards();
  setInterval(updateCards, 10000);
});

  
