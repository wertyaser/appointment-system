CREATE TABLE `users` (
  `student_id` int(11) NOT NULL,
  `grade` float(11) default NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `course` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `users` (`student_id`, `grade`, `name`, `birthday`, `course`, `email`, `password`) VALUES
(1, 1.25, 'john delacruz', '2009-01-01', 'BSIT', 'delacruz@gmail.com', '1234'),
(2, 4.0, 'janric tapales', '2004-01-01', 'BSIT', 'tapales@gmail.com', '1234');
