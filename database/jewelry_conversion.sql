-- Jewelry Parts Store Database Conversion Script
-- This script converts the e-commerce store to a jewelry parts store

-- Update Sections to Jewelry Categories
UPDATE `sections` SET 
    `name` = 'Beads & Stones',
    `status` = 1
WHERE `id` = 1;

UPDATE `sections` SET 
    `name` = 'Metal Components',
    `status` = 1
WHERE `id` = 2;

-- Add new sections if they don't exist (sections 3, 4, 5)
UPDATE `sections` SET `name` = 'Findings & Clasps', `status` = 1 WHERE `id` = 3;
UPDATE `sections` SET `name` = 'Chains & Cords', `status` = 1 WHERE `id` = 4;

-- Update Categories for Jewelry Parts
UPDATE `categories` SET 
    `section_id` = 1,
    `parent_id` = 0,
    `category_name` = 'Glass Beads',
    `url` = 'glass-beads',
    `description` = 'High-quality glass beads in various shapes, sizes, and colors',
    `status` = 1
WHERE `id` = 1;

UPDATE `categories` SET 
    `section_id` = 1,
    `parent_id` = 0,
    `category_name` = 'Gemstone Beads',
    `url` = 'gemstone-beads',
    `description` = 'Natural and semi-precious gemstone beads for jewelry making',
    `status` = 1
WHERE `id` = 2;

UPDATE `categories` SET 
    `section_id` = 1,
    `parent_id` = 0,
    `category_name` = 'Crystal Beads',
    `url` = 'crystal-beads',
    `description` = 'Sparkling crystal beads and rhinestones',
    `status` = 1
WHERE `id` = 3;

UPDATE `categories` SET 
    `section_id` = 2,
    `parent_id` = 0,
    `category_name` = 'Silver Findings',
    `url` = 'silver-findings',
    `description` = '925 Sterling silver jewelry findings and components',
    `status` = 1
WHERE `id` = 4;

UPDATE `categories` SET 
    `section_id` = 2,
    `parent_id` = 0,
    `category_name` = 'Gold Findings',
    `url` = 'gold-findings',
    `description` = '14K and 18K gold-filled jewelry findings',
    `status` = 1
WHERE `id` = 5;

-- Update Products to Jewelry Parts
UPDATE `products` SET 
    `product_name` = 'Czech Glass Beads Round 6mm',
    `product_code` = 'JWL-GB-001',
    `product_color` = 'Crystal Clear',
    `description` = 'High-quality Czech glass round beads, 6mm diameter. Perfect for bracelets, necklaces, and earrings. Smooth finish with consistent hole size.',
    `category_id` = 1,
    `brand_id` = 1,
    `product_price` = 12.99,
    `product_discount` = 10,
    `product_weight` = 50,
    `is_featured` = 'Yes',
    `status` = 1
WHERE `id` = 1;

UPDATE `products` SET 
    `product_name` = 'Natural Amethyst Beads 8mm',
    `product_code` = 'JWL-AME-002',
    `product_color` = 'Purple',
    `description` = 'Genuine natural amethyst gemstone beads, 8mm round. Grade A quality with beautiful deep purple color. 15.5 inch strand.',
    `category_id` = 2,
    `brand_id` = 1,
    `product_price` = 28.50,
    `product_discount` = 15,
    `product_weight` = 80,
    `is_featured` = 'Yes',
    `status` = 1
WHERE `id` = 2;

UPDATE `products` SET 
    `product_name` = 'Swarovski Crystal Bicone 4mm',
    `product_code` = 'JWL-CRY-003',
    `product_color` = 'Crystal AB',
    `description` = 'Authentic Swarovski crystal bicone beads, 4mm. Aurora Borealis coating for maximum sparkle. Pack of 144 beads.',
    `category_id` = 3,
    `brand_id` = 2,
    `product_price` = 18.99,
    `product_discount` = 0,
    `product_weight` = 25,
    `is_featured` = 'Yes',
    `status` = 1
WHERE `id` = 3;

UPDATE `products` SET 
    `product_name` = '925 Sterling Silver Lobster Clasps',
    `product_code` = 'JWL-SLV-004',
    `product_color` = 'Silver',
    `description` = 'Premium 925 sterling silver lobster claw clasps. Size: 12mm. Pack of 10. Perfect for necklaces and bracelets.',
    `category_id` = 4,
    `brand_id` = 3,
    `product_price` = 15.99,
    `product_discount` = 5,
    `product_weight` = 15,
    `is_featured` = 'No',
    `status` = 1
WHERE `id` = 4;

UPDATE `products` SET 
    `product_name` = '14K Gold-Filled Jump Rings',
    `product_code` = 'JWL-GLD-005',
    `product_color` = 'Gold',
    `description` = '14K gold-filled jump rings, 6mm diameter, 20 gauge. Pack of 50. Ideal for connecting jewelry components.',
    `category_id` = 5,
    `brand_id` = 3,
    `product_price` = 22.50,
    `product_discount` = 0,
    `product_weight` = 10,
    `is_featured` = 'Yes',
    `status` = 1
WHERE `id` = 5;

-- Update Brands to Jewelry Suppliers
UPDATE `brands` SET `name` = 'CzechMates' WHERE `id` = 1;
UPDATE `brands` SET `name` = 'Swarovski Elements' WHERE `id` = 2;
UPDATE `brands` SET `name` = 'TierraCast' WHERE `id` = 3;

-- Add more jewelry-specific product attributes
UPDATE `products_attributes` SET 
    `size` = '6mm',
    `price` = 11.69,
    `stock` = 500
WHERE `product_id` = 1 LIMIT 1;

UPDATE `products_attributes` SET 
    `size` = '8mm',
    `price` = 24.23,
    `stock` = 300
WHERE `product_id` = 2 LIMIT 1;

UPDATE `products_attributes` SET 
    `size` = '4mm',
    `price` = 18.99,
    `stock` = 1000
WHERE `product_id` = 3 LIMIT 1;

-- Update meta information
UPDATE `products` SET 
    `meta_title` = CONCAT(product_name, ' - Jewelry Parts Store'),
    `meta_description` = SUBSTRING(description, 1, 255),
    `meta_keywords` = CONCAT(product_name, ', jewelry making, beads, findings, supplies')
WHERE `id` > 0 AND description IS NOT NULL;

-- Success message
SELECT 'Database successfully converted to Jewelry Parts Store!' as Status;

