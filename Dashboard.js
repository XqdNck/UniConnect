document.addEventListener('DOMContentLoaded', function() {
    const itemsGrid = document.getElementById('itemsGrid');
    const filterButtons = document.querySelectorAll('.filter-btn');
    
    // 20 Demo Items for UNIBEN Students
    const demoItems = [
        { id: 1, title: "Chemistry 101 Textbook (5th Ed.)", price: "₦5,000", seller: "Sarah K.", category: "Books", image: "assets/chem-book.jpg", rating: 4.2 },
        { id: 2, title: "TI-84 Graphing Calculator", price: "₦8,500", seller: "David M.", category: "Electronics", image: "assets/calculator.jpg", rating: 4.5 },
        { id: 3, title: "Engineering Lab Notebook", price: "₦2,000", seller: "Emmanuel O.", category: "Stationery", image: "assets/notebook.jpg", rating: 3.8 },
        { id: 4, title: "Python Crash Course", price: "₦4,500", seller: "Grace L.", category: "Books", image: "assets/python-book.jpg", rating: 4.7 },
        { id: 5, title: "Wireless Mouse (Logitech)", price: "₦3,200", seller: "Tunde B.", category: "Electronics", image: "assets/mouse.jpg", rating: 4.0 },
        { id: 6, title: "Organic Chemistry Model Kit", price: "₦6,800", seller: "Chioma A.", category: "Lab Equipment", image: "assets/chem-kit.jpg", rating: 4.3 },
        { id: 7, title: "UNIBEN Hoodie (Medium)", price: "₦7,500", seller: "Bola W.", category: "Clothing", image: "assets/hoodie.jpg", rating: 4.8 },
        { id: 8, title: "Scientific Calculator (FX-991EX)", price: "₦6,000", seller: "James U.", category: "Electronics", image: "assets/sci-calculator.jpg", rating: 4.6 },
        { id: 9, title: "Microeconomics Textbook", price: "₦4,000", seller: "Aisha M.", category: "Books", image: "assets/econ-book.jpg", rating: 3.9 },
        { id: 10, title: "Backpack (Like New)", price: "₦9,000", seller: "Obinna C.", category: "Accessories", image: "assets/backpack.jpg", rating: 4.4 },
        { id: 11, title: "Stethoscope (Dual Head)", price: "₦12,000", seller: "Dr. Osagie", category: "Medical", image: "assets/stethoscope.jpg", rating: 4.9 },
        { id: 12, title: "French-English Dictionary", price: "₦2,500", seller: "Fatima D.", category: "Books", image: "assets/dictionary.jpg", rating: 3.7 },
        { id: 13, title: "Portable Desk Lamp", price: "₦3,500", seller: "Kunle F.", category: "Electronics", image: "assets/lamp.jpg", rating: 4.1 },
        { id: 14, title: "Anatomy Poster Set", price: "₦5,500", seller: "Med Student", category: "Study Aids", image: "assets/anatomy-posters.jpg", rating: 4.2 },
        { id: 15, title: "Football Cleats (Size 42)", price: "₦10,000", seller: "Victor J.", category: "Sports", image: "assets/cleats.jpg", rating: 4.0 },
        { id: 16, title: "Java Programming Book", price: "₦4,800", seller: "Tech Guru", category: "Books", image: "assets/java-book.jpg", rating: 4.5 },
        { id: 17, title: "Wireless Earbuds", price: "₦15,000", seller: "Gadget King", category: "Electronics", image: "assets/earbuds.jpg", rating: 4.3 },
        { id: 18, title: "UNIBEN Face Cap", price: "₦2,500", seller: "Campus Vendor", category: "Clothing", image: "assets/cap.jpg", rating: 3.9 },
        { id: 19, title: "Math Set (Compass, Protractor)", price: "₦1,800", seller: "Student Helper", category: "Stationery", image: "assets/math-set.jpg", rating: 3.5 },
        { id: 20, title: "Power Bank (20,000mAh)", price: "₦11,000", seller: "Gadget Boy", category: "Electronics", image: "assets/powerbank.jpg", rating: 4.7 }
    ];

    // Generate item cards
    function displayItems(items) {
        itemsGrid.innerHTML = '';
        items.forEach(item => {
            const card = document.createElement('div');
            card.className = 'item-card';
            card.innerHTML = `
                <img src="${item.image}" alt="${item.title}" class="item-img">
                <div class="item-details">
                    <h3 class="item-title">${item.title}</h3>
                    <span class="item-price">${item.price}</span>
                    <div class="item-footer">
                        <div class="item-seller">
                            <img src="assets/default-avatar.png" class="seller-avatar">
                            <span>${item.seller}</span>
                        </div>
                        <button class="add-to-cart" data-id="${item.id}">
                            <i class="fas fa-cart-plus"></i> Add
                        </button>
                    </div>
                </div>
            `;
            itemsGrid.appendChild(card);
        });

        // Add to Cart Logic
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.getAttribute('data-id');
                const item = demoItems.find(i => i.id == itemId);
                alert(`Added to cart: ${item.title}`);
                // In a real app: Update cart in localStorage
            });
        });
    }

    // Filter functionality
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            const filter = this.textContent;
            displayItems(filter === 'All' ? demoItems : demoItems.filter(item => item.category === filter));
        });
    });

    // Initial display
    displayItems(demoItems);
});