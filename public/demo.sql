CREATE TABLE IF NOT EXISTS Banner (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(200) NOT NULL ,
    image varchar (200) NOT NULL,
    link varchar (300) default'#',
    description varchar (300) ,
    status TINYINT DEFAULT'1' COMMENT '1 là Hiển Thị , 0 là Ẩn ',
    prioty TINYINT  DEFAULT'0',
    created_at date default current_timestamp(),  
    updated_at date default NOW()  
) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS Account (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(100) NOT NULL ,
    phone varchar(100) NOT NULL UNIQUE,
    email varchar(100) NOT NULL UNIQUE,
    password varchar(100) NOT NULL ,
    address varchar(200) NOT NULL ,
    rule varchar(50) DEFAULT'customer',
    status TINYINT DEFAULT'1' COMMENT '1 là Okay , 0 là Khóa ',
    created_at date default current_timestamp(),  
    updated_at date default NOW()  
) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS Blog (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(200) NOT NULL ,
    image varchar(200) NOT NULL,
    sumary varchar(300) ,
    description text ,
    account_id int NOT NULL,
    status TINYINT(1) DEFAULT'1' COMMENT '1 là Hiển Thị , 0 là Ẩn ',
    created_at date default current_timestamp(),  
    updated_at date default NOW(),
    FOREIGN KEY (account_id) REFERENCES account(id)  
) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS `order` (
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(100) NULL ,
    phone varchar(100) NULL UNIQUE,
    email varchar(100) NULL UNIQUE,
    address varchar(200) NULL ,
    note text ,
    account_id int NOT NULL,
    status TINYINT(1) DEFAULT'1' COMMENT '1 là Hiển Thị , 0 là Ẩn ',
    created_at date default current_timestamp(),  
    updated_at date default NOW(),
    FOREIGN KEY (account_id) REFERENCES account(id)  
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS order_detail (
    order_id int NOT NULL,
    product_id int NOT NULL,
    quantity int NOT NULL,
    price float NOT NULL ,
    FOREIGN KEY (order_id) REFERENCES `order`(id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `product_image` (
    `id `int PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(100) NOT NULL UNIQUE,
    `image` varchar(100) NOT NULL,
    `status` TINYINT(1) DEFAULT'1' ,
    `product_img_id` int NOT NULL,
    `created_at` timestamp default current_timestamp(),  
    `updated_at` date NULL,
    FOREIGN KEY (`product_img_id`) REFERENCES `product`(`id`)  
) ENGINE=InnoDB;