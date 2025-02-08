-- Drop the foreign key and column first if they exist to prevent errors
ALTER TABLE ads DROP FOREIGN KEY IF EXISTS FK_category_id;
ALTER TABLE ads DROP COLUMN IF EXISTS category_id;

-- Create categories table
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE
);

-- Insert predefined categories
INSERT INTO categories (name) VALUES
    ('Electronics'),
    ('Vehicles'),
    ('Home Goods'),
    ('Furniture'),
    ('Jobs'),
    ('Real Estate'),
    ('Services'),
    ('Fashion'),
    ('Books'),
    ('Toys'),
    ('Sports');

-- Add category_id column to ads table
ALTER TABLE ads 
ADD COLUMN category_id INT NOT NULL;

-- Add foreign key constraint
ALTER TABLE ads 
ADD CONSTRAINT FK_category_id 
FOREIGN KEY (category_id) 
REFERENCES categories(id) 
ON DELETE CASCADE;
