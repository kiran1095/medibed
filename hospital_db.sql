SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
-- Database: `hospital_db`
--
-- --------------------------------------------------------
--
-- Table structure for table `admins`
--
CREATE TABLE `admin` (`id` int(11) NOT NULL,`email` varchar(255) NOT NULL,`password` varchar(255) NOT NULL,`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;
-- --------------------------------------------------------
--
-- Table structure for table `doctors`
--
create table doctor(id int(11),foreign key(id) references user(id),phone varchar(15) primary key,address varchar(255) NOT NULL,gender varchar(20) NOT NULL,specialist varchar(30) NOT NULL,created_time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP);



-- Table structure for table `nurses`
--
CREATE TABLE `nurses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Dumping data for table `nurses`
--

--
-- Table structure for table `patients`
--
/*CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` int(11) NOT NULL,
  `health_condition` varchar(255) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `nurse_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
*/--
-- Dumping data for table `patients`
--
create table patient(id int(11) auto_increment primary key,name varchar(255)UNIQUE NOT NULL,email varchar(255)UNIQUE NOT NULL,phone int(15)UNIQUE NOT NULL,gender int(11)NOT NULL,health_issue varchar(255)NOT NULL,doctor_id int(11),foreign key(doctor_id) references user(id),nurse_id int(11),foreign key(nurse_id) references user(id),created_time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,is_discharged int(11) NOT NULL);

-- Indexes for dumped tables
--
--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`);
--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `nurse_id` (`nurse_id`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--
--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `patients_ibfk_2` FOREIGN KEY (`nurse_id`) REFERENCES `nurses` (`id`);
COMMIT;




PATIENT TABLE CREATION:

create table patients(id int(11) auto_increment primary key,name varchar(255)UNIQUE NOT NULL,email varchar(255)UNIQUE NOT NULL,phone int(15)UNIQUE NOT NULL,gender int(11)NOT NULL,health_issue varchar(255)NOT NULL,assigned_doctor varchar(255),foreign key(assigned_doctor) references doctors(name),assigned_nurse varchar(255) UNIQUE,foreign key(assigned_nurse) references nurses(name),created_time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP);

alter table patients add is_discharged int(11);







