CREATE TABLE item_menu(
    item_id int AUTO_INCREMENT,
    item_name varchar(500),
    price int,
    type varchar(500),
    PRIMARY KEY(item_id)
);

INSERT INTO item_menu(item_name,price,type) VALUES 

        ("Samosa Pav",
        12,"snacks")
    
    ,
        ("Wada Pav",
        12,"snacks")
    
    ,
        ("Batata Wada",
        18,"snacks")
    
    ,
        ("Samosa Usal",
        28,"snacks")
    
    ,
        ("Vada Usal",
        24,"snacks")
    
    ,
        ("Vada Samosa Usal",
        28,"snacks")
    
    ,
        ("Dahi Samosa",
        28,"snacks")
    
    ,
        ("Usal Pav",
        20,"snacks")
    
    ,
        ("Misal Pav",
        32,"snacks")
    
    ,
        ("Bread Pakoda",
        38,"snacks")
    
    ,
        ("Idli Sambhar",
        25,"snacks")
    
    ,
        ("Mendu Wada Sambhar",
        28,"snacks")
    
    ,
        ("Idli Wada",
        26,"snacks")
    
    ,
        ("Dahi Idli",
        28,"snacks")
    
    ,
        ("Butter Idli",
        28,"snacks")
    
    ,
        ("Idli Fry",
        28,"snacks")
    
    ,
        ("Dahi Misal Pav",
        40,"snacks")
    
    ,
        ("Upma/Poha",
        20,"snacks")
    
    ,
        ("Dahi Kachori",
        30,"snacks")
    
    ,
        ("Chapati Bhaji",
        38,"lunch")
    
    ,
        ("Chapati Paneer Bhaji",
        43,"lunch")
    
    ,
        ("Puri Bhaji",
        40,"lunch")
    
    ,
        ("Puri Paneer Bhaji",
        43,"lunch")
    
    ,
        ("Potato Bhaji",
        28,"lunch")
    
    ,
        ("Panner Bhaji",
        45,"lunch")
    
    ,
        ("Sada Bhaji",
        35,"lunch")
    
    ,
        ("Raita",
        18,"lunch")
    
    ,
        ("Dahi(Curd)",
        14,"lunch")
    
    ,
        ("Puri Plate",
        18,"lunch")
    
    ,
        ("Chapati(Single)",
        05,"lunch")
    
    ,
        ("Dal Fry",
        23,"lunch")
    
    ,
        ("Lunch",
        48,"lunch")
    
    ,
        ("Lunch With Pulav",
        53,"lunch")
    
    ,
        ("Lunh With Jira-Rice",
        53,"lunch")
    
    ,
        ("Dal Rice",
        28,"lunch")
    
    ,
        ("Dal Fry Rice",
        40,"lunch")
    
    ,
        ("Dal Rice with Bhaji",
        38,"lunch")
    
    ,
        ("Plain Dahi Rice",
        38,"lunch")
    
    ,
        ("Haka Noodles",
        48,"chinese")
    
    ,
        ("Shezwan Noodles",
        54,"chinese")
    
    ,
        ("Singapore Noodles",
        54,"chinese")
    
    ,
        ("Manchow Noodles",
        54,"chinese")
    
    ,
        ("Manchurian Noodles",
        57,"chinese")
    
    ,
        ("Triple Noodles",
        57,"chinese")
    
    ,
        ("Chinese Bhel",
        43,"chinese")
    
    ,
        ("Chinese Cheese Bhel",
        63,"chinese")
    
    ,
        ("Fried Rice",
        48,"chinese")
    
    ,
        ("Shezwan Rice",
        54,"chinese")
    
    ,
        ("Singapore Rice",
        54,"chinese")
    
    ,
        ("Manchow Rice",
        58,"chinese")
    
    ,
        ("Manchurian Rice",
        57,"chinese")
    
    ,
        ("Triple Shezwan Rice",
        57,"chinese")
    
    ,
        ("Tomato Rice(With Dahi)",
        48,"chinese")
    
    ,
        ("Cocktail",
        30,"refreshments")
    
    ,
        ("Water Melon",
        30,"refreshments")
    
    ,
        ("Pineapple",
        30,"refreshments")
    
    ,
        ("Grapes",
        30,"refreshments")
    
    ,
        ("Pineapple + Water Melone",
        30,"refreshments")
    
    ,
        ("Papaya",
        30,"refreshments")
    
    ,
        ("Ice Tea",
        30,"refreshments")
    
    ,
        ("Mosambi",
        30,"refreshments")
    
    ,
        ("Orange",
        30,"refreshments")
    
    ,
        ("Maramari",
        30,"refreshments")
    
    ,
        ("Ganga Jmuna",
        30,"refreshments")
    
    ,
        ("Masmelone",
        30,"refreshments")
    
    ,
        ("Anar",
        30,"refreshments");
    

    CREATE TABLE `registered_users` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(55) NOT NULL,
  `gender` varchar(20) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    INSERT INTO `registered_users` (`id`, `user_name`, `first_name`, `last_name`, `password`, `email`, `gender`) VALUES
(1, 'raoniz', 'Rahul', 'Soni', 'rahul', 'soni.rv@somaiya.edu', 'Male');