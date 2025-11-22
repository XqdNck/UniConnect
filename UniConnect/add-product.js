document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("addProductForm");
  const imageInput = document.getElementById("productImage");
  const imagePreview = document.getElementById("imagePreview");

  // Optional: Show image preview when user uploads a file
  imageInput.addEventListener("change", () => {
    const file = imageInput.files[0];
    if (
      (file && file.type.startsWith("image/")) ||
      (file && file.type.startsWith("video/"))
    ) {
      const reader = new FileReader();
      reader.onload = function (e) {
        imagePreview.src = e.target.result;
        imagePreview.style.display = "block";
      };
      reader.readAsDataURL(file);
    } else {
      imagePreview.style.display = "none";
    }
  });

  // Handle form submission
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    // Collect input values
    const name = document.getElementById("productName").value.trim();
    const description = document.getElementById("productDesc").value.trim();
    const price = document.getElementById("productPrice").value.trim();
    const category = document.getElementById("productCategory").value;
    const imageFile = imageInput.files[0];

    // Basic validation
    if (!name || !description || !price || !category || !imageFile) {
      alert("Please fill out all fields.");
      return;
    }

    // You can now send this data to a server or save it locally
    const productData = {
      name,
      description,
      price,
      category,
      imageName: imageFile.name,
    };

    // Example: Save to localStorage (can be changed later to send to a server)
    let products = JSON.parse(localStorage.getItem("products")) || [];
    products.push(productData);
    localStorage.setItem("products", JSON.stringify(products));

    alert("Product added successfully!");

    // Reset form
    form.reset();
    imagePreview.style.display = "none";
  });
});
