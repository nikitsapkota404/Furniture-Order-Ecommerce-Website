-- Table: admin_table
CREATE TABLE admin_table (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    admin_name VARCHAR(100) NOT NULL,
    admin_email VARCHAR(100) NOT NULL UNIQUE,
    admin_image VARCHAR(255),
    admin_password VARCHAR(255) NOT NULL
);

-- Table: cart_details
CREATE TABLE cart_details (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    ip_address VARCHAR(50),
    product_id INT,
    quantity INT DEFAULT 1
);

-- Table: products
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255),
    price DECIMAL(10,2),
    description TEXT,
    image VARCHAR(255)
);

-- Table: categories
CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL
);

-- Table: feedback
CREATE TABLE feedback (
    feedback_id INT AUTO_INCREMENT PRIMARY KEY,
    feedback_text TEXT NOT NULL
);

-- Table: user_orders
CREATE TABLE user_orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total_amount DECIMAL(10,2),
    order_status VARCHAR(50),
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP
);
