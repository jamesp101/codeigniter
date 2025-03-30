-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2025 at 08:08 AM
-- Server version: 10.6.20-MariaDB-cll-lve
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qaadmavl_qaadms`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_users`
--

CREATE TABLE `all_users` (
  `user_id` int(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `office` varchar(200) NOT NULL,
  `office_id` int(200) NOT NULL,
  `e_manual_viewing` varchar(200) NOT NULL,
  `email_add` varchar(200) NOT NULL,
  `e_signature` varchar(200) DEFAULT NULL,
  `type` enum('Super Admin','Administrator','Requester','Department Head','Director for QAIE','QAIE Management Officer','Document Controller','President') NOT NULL,
  `my_img` varchar(200) DEFAULT NULL,
  `validation_key` varchar(200) DEFAULT NULL,
  `vkey` varchar(200) NOT NULL,
  `verification_status` varchar(200) NOT NULL,
  `creation_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `all_users`
--

INSERT INTO `all_users` (`user_id`, `firstname`, `lastname`, `username`, `password`, `department`, `office`, `office_id`, `e_manual_viewing`, `email_add`, `e_signature`, `type`, `my_img`, `validation_key`, `vkey`, `verification_status`, `creation_date`) VALUES
(108, 'Elon', 'Musk', 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'No Department', 'No Office', 0, '', 'superadmin@gmail.com', NULL, 'Super Admin', '5701d51baafb4b5b62deee43df9e1358.PNG', '0', '', '', '2024-05-31 21:47:40.840281'),
(212, 'Evan', 'Spiegel', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'No Department', 'No Office', 0, '', 'admin2@gmail.com', NULL, 'Administrator', '25b7fdd0075767dbabb55deb7d25d1f1.PNG', NULL, '91dbeb2ca37a2fc7fba12846f4a85927', 'VERIFIED', '2024-05-31 21:48:45.047057'),
(218, 'Steve', 'Rogers', 'requester', '0bc2b09c07005b410cae62912ae70206', 'Academics', 'SCMCS', 5, 'ENABLED', 'requester@gmail.com', NULL, 'Requester', 'd7a834a8abad3a83ecc2b458aabe6b15.PNG', NULL, 'fab72a8af49b889f9e02b7cf1d58b234', 'VERIFIED', '2024-05-31 21:49:49.381224'),
(220, 'Donald', 'Trump', 'president', 'c8d56be998c94089ea6e1147dc9253c1', 'Academics', 'SCMCS', 5, 'ENABLED', 'president@gmail.com', NULL, 'President', '121df3103833eec63cf18d5f393fe4a2.PNG', NULL, 'e6c8f28627b4a810dec6687369e74043', 'VERIFIED', '2024-05-31 22:03:01.829681'),
(221, 'James', 'Cameron', 'director', '3d4e992d8d8a7d848724aa26ed7f4176', 'Academics', 'SCMCS', 5, 'ENABLED', 'directorforqaie@gmail.com', '2379e15867f17cc612c1b52a733f2de9.PNG', 'Director for QAIE', 'e4213749fc05120692f7133aef5aac35.PNG', NULL, 'fb1dec807baffe24f7d3faed0c1fce94', 'VERIFIED', '2024-05-31 21:55:27.248505'),
(222, 'Peter', 'Parker', 'officer', 'd31d86d0de8dd34fc535c67e480deaa2', 'Academics', 'SCMCS', 5, 'ENABLED', 'qaiemgmtofficer@gmail.com', NULL, 'QAIE Management Officer', 'a2867b7c8af46596fec5e7c145943dfc.PNG', NULL, 'f288539cca98a8484851c753e2b27409', 'VERIFIED', '2024-05-31 21:57:40.598509'),
(223, 'Simon', 'Cowell', 'departmenthead', '38433473a49db5555aaf4a3a6f03ed76', 'Academics', 'SCMCS', 5, 'ENABLED', 'departmenthead@gmail.com', '564cbfe7801b200f68bbf0f37ff5f082.png', 'Department Head', '26be45b563a87652fbcb78769c5610c8.PNG', NULL, '7539b9f20395c656aeaf694f6d8566b0', 'VERIFIED', '2024-05-31 21:52:25.381402'),
(224, 'Harry', 'Potter', 'documentcontroller', '59ff0ac8f5019543d3fc4634be687723', 'Academics', 'SCMCS', 5, 'ENABLED', 'documentcontroller@gmail.com', NULL, 'Document Controller', 'c558ce22fc359553e59dc747130ffb03.PNG', NULL, '8ec96e046051e90a23292fe75b40223d', 'VERIFIED', '2024-05-31 21:59:51.810216');

-- --------------------------------------------------------

--
-- Table structure for table `auditee_afsform`
--

CREATE TABLE `auditee_afsform` (
  `AFSForm_ID` int(100) NOT NULL,
  `Name_Of_Auditor` varchar(100) NOT NULL,
  `Name_Of_Auditee` varchar(100) NOT NULL,
  `Date_Accomplished` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Office` varchar(100) NOT NULL,
  `Question_1A` varchar(100) NOT NULL,
  `Remarks_1A` varchar(100) NOT NULL,
  `Question_2A` varchar(100) NOT NULL,
  `Remarks_2A` varchar(100) NOT NULL,
  `Question_3A` varchar(100) NOT NULL,
  `Remarks_3A` varchar(100) NOT NULL,
  `Question_4A` varchar(100) NOT NULL,
  `Remarks_4A` varchar(100) NOT NULL,
  `Question_5A` varchar(100) NOT NULL,
  `Remarks_5A` varchar(100) NOT NULL,
  `Question_1B` varchar(100) NOT NULL,
  `Remarks_1B` varchar(100) NOT NULL,
  `Question_2B` varchar(100) NOT NULL,
  `Remarks_2B` varchar(100) NOT NULL,
  `Question_3B` varchar(100) NOT NULL,
  `Remarks_3B` varchar(100) NOT NULL,
  `Question_4B` varchar(100) NOT NULL,
  `Remarks_4B` varchar(100) NOT NULL,
  `Question_5B` varchar(100) NOT NULL,
  `Remarks_5B` varchar(100) NOT NULL,
  `Question_1C` varchar(100) NOT NULL,
  `Remarks_1C` varchar(100) NOT NULL,
  `Question_2C` varchar(100) NOT NULL,
  `Remarks_2C` varchar(100) NOT NULL,
  `Question_3C` varchar(100) NOT NULL,
  `Remarks_3C` varchar(100) NOT NULL,
  `Question_4C` varchar(100) NOT NULL,
  `Remarks_4C` varchar(100) NOT NULL,
  `Question_5C` varchar(100) NOT NULL,
  `Remarks_5C` varchar(100) NOT NULL,
  `Question_1D` varchar(100) NOT NULL,
  `Remarks_1D` varchar(100) NOT NULL,
  `Question_2D` varchar(100) NOT NULL,
  `Remarks_2D` varchar(100) NOT NULL,
  `Question_3D` varchar(100) NOT NULL,
  `Remarks_3D` varchar(100) NOT NULL,
  `Question_4D` varchar(100) NOT NULL,
  `Remarks_4D` varchar(100) NOT NULL,
  `Question_5D` varchar(100) NOT NULL,
  `Remarks_5D` varchar(100) NOT NULL,
  `Comments_Suggestions` varchar(500) NOT NULL,
  `date_uploaded_dttbl` varchar(100) NOT NULL,
  `User_ID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `auditee_afsform`
--

INSERT INTO `auditee_afsform` (`AFSForm_ID`, `Name_Of_Auditor`, `Name_Of_Auditee`, `Date_Accomplished`, `Department`, `Office`, `Question_1A`, `Remarks_1A`, `Question_2A`, `Remarks_2A`, `Question_3A`, `Remarks_3A`, `Question_4A`, `Remarks_4A`, `Question_5A`, `Remarks_5A`, `Question_1B`, `Remarks_1B`, `Question_2B`, `Remarks_2B`, `Question_3B`, `Remarks_3B`, `Question_4B`, `Remarks_4B`, `Question_5B`, `Remarks_5B`, `Question_1C`, `Remarks_1C`, `Question_2C`, `Remarks_2C`, `Question_3C`, `Remarks_3C`, `Question_4C`, `Remarks_4C`, `Question_5C`, `Remarks_5C`, `Question_1D`, `Remarks_1D`, `Question_2D`, `Remarks_2D`, `Question_3D`, `Remarks_3D`, `Question_4D`, `Remarks_4D`, `Question_5D`, `Remarks_5D`, `Comments_Suggestions`, `date_uploaded_dttbl`, `User_ID`) VALUES
(7, 'Alvin Jason A. Virata', 'John Doe', '07/12/2022', 'Academics', 'SBCS', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'NO', 'Remarks Sample', 'Comments & Suggestions Sample', '2022-07-12, 23:01', 194),
(8, 'Alvin Jason A. Virata', 'Jane Doe', '07/12/2022', 'Finance', 'BDO', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'NO', 'Remarks Sample', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'Comments & Suggestions Sample', '2022-07-12, 23:05', 194),
(9, 'Alvin Jason A. Virata', 'Ryan Medina', '07/12/2022', 'ASF', 'RDO', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'NO', 'Remarks Sample', 'Comments & Suggestions Sample', '2022-07-12, 23:09', 194),
(10, 'Winterson C. Ambion', 'John Doe', '07/12/2022', 'Academics', 'SBCS', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'NO', 'Remarks Sample', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'Comments & Suggestions Sample', '2022-07-12, 23:30', 194),
(11, 'Winterson C. Ambion', 'Jane Doe', '07/12/2022', 'Finance', 'BDO', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'NO', 'Remarks Sample', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'Comments & Suggestions Sample', '2022-07-12, 23:32', 194),
(12, 'Winterson C. Ambion', 'Ryan Medina', '07/12/2022', 'ASF', 'RDO', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'NO', 'Remarks Sample', 'NO', 'Remarks Sample', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'Comments & Suggestions Sample', '2022-07-12, 23:34', 194),
(13, 'Winterson C. Ambion', 'Chris Medina', '07/12/2022', 'DSAS', 'Student Development', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'NO', 'Remarks Sample', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'YES', '', 'Comments & Suggestions Sample', '2022-07-12, 23:36', 194);

-- --------------------------------------------------------

--
-- Table structure for table `auditee_afsform_2_desc`
--

CREATE TABLE `auditee_afsform_2_desc` (
  `ID` int(100) NOT NULL,
  `School_Address_DESC` varchar(150) NOT NULL,
  `Phone_No_1_DESC` varchar(100) NOT NULL,
  `Phone_No_2_DESC` varchar(100) NOT NULL,
  `Phone_No_3_DESC` varchar(100) NOT NULL,
  `Phone_No_4_DESC` varchar(100) NOT NULL,
  `School_Website_DESC` varchar(100) NOT NULL,
  `School_Facebook_DESC` varchar(100) NOT NULL,
  `School_Instagram_DESC` varchar(100) NOT NULL,
  `QAIE_Office_Title_DESC` varchar(100) NOT NULL,
  `AFS_Generated_Report_Title_DESC` varchar(100) NOT NULL,
  `Total_Of_DESC` varchar(100) NOT NULL,
  `AFS_Submitted_DESC` varchar(100) NOT NULL,
  `#_Table_I_DESC` varchar(100) NOT NULL,
  `Table_I_DESC` varchar(500) NOT NULL,
  `Table_I_Yes_Total_DESC` varchar(100) NOT NULL,
  `Table_I_%_Yes_DESC` varchar(100) NOT NULL,
  `Table_I_No_Total_DESC` varchar(100) NOT NULL,
  `Table_I_%_No_DESC` varchar(100) NOT NULL,
  `#_Question_1A_DESC` varchar(100) NOT NULL,
  `Question_1A_DESC` varchar(500) NOT NULL,
  `#_Question_2A_DESC` varchar(100) NOT NULL,
  `Question_2A_DESC` varchar(500) NOT NULL,
  `#_Question_3A_DESC` varchar(100) NOT NULL,
  `Question_3A_DESC` varchar(500) NOT NULL,
  `#_Question_4A_DESC` varchar(100) NOT NULL,
  `Question_4A_DESC` varchar(500) NOT NULL,
  `#_Question_5A_DESC` varchar(100) NOT NULL,
  `Question_5A_DESC` varchar(500) NOT NULL,
  `#_Table_II_DESC` varchar(100) NOT NULL,
  `Table_II_DESC` varchar(500) NOT NULL,
  `Table_II_Yes_Total_DESC` varchar(100) NOT NULL,
  `Table_II_%_Yes_DESC` varchar(100) NOT NULL,
  `Table_II_No_Total_DESC` varchar(100) NOT NULL,
  `Table_II_%_No_DESC` varchar(100) NOT NULL,
  `#_Question_1B_DESC` varchar(100) NOT NULL,
  `Question_1B_DESC` varchar(500) NOT NULL,
  `#_Question_2B_DESC` varchar(100) NOT NULL,
  `Question_2B_DESC` varchar(500) NOT NULL,
  `#_Question_3B_DESC` varchar(100) NOT NULL,
  `Question_3B_DESC` varchar(500) NOT NULL,
  `#_Question_4B_DESC` varchar(100) NOT NULL,
  `Question_4B_DESC` varchar(500) NOT NULL,
  `#_Question_5B_DESC` varchar(100) NOT NULL,
  `Question_5B_DESC` varchar(500) NOT NULL,
  `#_Table_III_DESC` varchar(100) NOT NULL,
  `Table_III_DESC` varchar(500) NOT NULL,
  `Table_III_Yes_Total_DESC` varchar(100) NOT NULL,
  `Table_III_%_Yes_DESC` varchar(100) NOT NULL,
  `Table_III_No_Total_DESC` varchar(100) NOT NULL,
  `Table_III_%_No_DESC` varchar(100) NOT NULL,
  `#_Question_1C_DESC` varchar(100) NOT NULL,
  `Question_1C_DESC` varchar(500) NOT NULL,
  `#_Question_2C_DESC` varchar(100) NOT NULL,
  `Question_2C_DESC` varchar(500) NOT NULL,
  `#_Question_3C_DESC` varchar(100) NOT NULL,
  `Question_3C_DESC` varchar(500) NOT NULL,
  `#_Question_4C_DESC` varchar(100) NOT NULL,
  `Question_4C_DESC` varchar(500) NOT NULL,
  `#_Question_5C_DESC` varchar(100) NOT NULL,
  `Question_5C_DESC` varchar(500) NOT NULL,
  `#_Table_IV_DESC` varchar(100) NOT NULL,
  `Table_IV_DESC` varchar(500) NOT NULL,
  `Table_IV_Yes_Total_DESC` varchar(100) NOT NULL,
  `Table_IV_%_Yes_DESC` varchar(100) NOT NULL,
  `Table_IV_No_Total_DESC` varchar(100) NOT NULL,
  `Table_IV_%_No_DESC` varchar(100) NOT NULL,
  `#_Question_1D_DESC` varchar(100) NOT NULL,
  `Question_1D_DESC` varchar(500) NOT NULL,
  `#_Question_2D_DESC` varchar(100) NOT NULL,
  `Question_2D_DESC` varchar(500) NOT NULL,
  `#_Question_3D_DESC` varchar(100) NOT NULL,
  `Question_3D_DESC` varchar(500) NOT NULL,
  `#_Question_4D_DESC` varchar(100) NOT NULL,
  `Question_4D_DESC` varchar(500) NOT NULL,
  `#_Question_5D_DESC` varchar(100) NOT NULL,
  `Question_5D_DESC` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `auditee_afsform_2_desc`
--

INSERT INTO `auditee_afsform_2_desc` (`ID`, `School_Address_DESC`, `Phone_No_1_DESC`, `Phone_No_2_DESC`, `Phone_No_3_DESC`, `Phone_No_4_DESC`, `School_Website_DESC`, `School_Facebook_DESC`, `School_Instagram_DESC`, `QAIE_Office_Title_DESC`, `AFS_Generated_Report_Title_DESC`, `Total_Of_DESC`, `AFS_Submitted_DESC`, `#_Table_I_DESC`, `Table_I_DESC`, `Table_I_Yes_Total_DESC`, `Table_I_%_Yes_DESC`, `Table_I_No_Total_DESC`, `Table_I_%_No_DESC`, `#_Question_1A_DESC`, `Question_1A_DESC`, `#_Question_2A_DESC`, `Question_2A_DESC`, `#_Question_3A_DESC`, `Question_3A_DESC`, `#_Question_4A_DESC`, `Question_4A_DESC`, `#_Question_5A_DESC`, `Question_5A_DESC`, `#_Table_II_DESC`, `Table_II_DESC`, `Table_II_Yes_Total_DESC`, `Table_II_%_Yes_DESC`, `Table_II_No_Total_DESC`, `Table_II_%_No_DESC`, `#_Question_1B_DESC`, `Question_1B_DESC`, `#_Question_2B_DESC`, `Question_2B_DESC`, `#_Question_3B_DESC`, `Question_3B_DESC`, `#_Question_4B_DESC`, `Question_4B_DESC`, `#_Question_5B_DESC`, `Question_5B_DESC`, `#_Table_III_DESC`, `Table_III_DESC`, `Table_III_Yes_Total_DESC`, `Table_III_%_Yes_DESC`, `Table_III_No_Total_DESC`, `Table_III_%_No_DESC`, `#_Question_1C_DESC`, `Question_1C_DESC`, `#_Question_2C_DESC`, `Question_2C_DESC`, `#_Question_3C_DESC`, `Question_3C_DESC`, `#_Question_4C_DESC`, `Question_4C_DESC`, `#_Question_5C_DESC`, `Question_5C_DESC`, `#_Table_IV_DESC`, `Table_IV_DESC`, `Table_IV_Yes_Total_DESC`, `Table_IV_%_Yes_DESC`, `Table_IV_No_Total_DESC`, `Table_IV_%_No_DESC`, `#_Question_1D_DESC`, `Question_1D_DESC`, `#_Question_2D_DESC`, `Question_2D_DESC`, `#_Question_3D_DESC`, `Question_3D_DESC`, `#_Question_4D_DESC`, `Question_4D_DESC`, `#_Question_5D_DESC`, `Question_5D_DESC`) VALUES
(1, 'St. Dominic Complex, E. Aguinaldo Highway, Bacoor City, Cavite, Philippines 4102', '0917 625 8222', '0922 850 9200', '(046) 417 7322', '(046) 417 8161', 'www.stdominiccollege.edu.ph', 'stdominiccollege', '@sdcapikemen', 'QUALITY ASSURANCE & INSTITUTIONAL EFFECTIVENESS OFFICE', 'AUDITEE FEEDBACK SURVEY (GENERATED REPORT)', 'Total of', 'Auditee Feedback Survey(s) Submitted', 'I.', 'Auditor\'s Conduct and Decorum', 'YES (TOTAL)', '% (YES)', 'NO (TOTAL)', '% (NO)', '1.', 'The auditor maintained a positive attitude.', '2.', 'The auditor dressed appropriately during the audit.', '3.', 'The auditor exhibited courtesy and professionalism.', '4.', 'The auditor demonstrated the ability to empathize with the auditee.', '5.', 'The auditor listened attentively to the auditee\'s concerns.', 'II.', 'Competence', 'YES (TOTAL)', '% (YES)', 'NO (TOTAL)', '% (NO)', '1.', 'The auditor showed evidence of preparation.', '2.', 'The auditor demonstrated good communication skills.', '3.', 'The auditor provided the auditee an opportunity to ask questions.', '4.', 'The auditor demonstrated high level of objectivity and integrity.', '5.', 'The auditor demonstrated knowledge of the policies and procedures being audited.', 'III.', 'Auditing Process', 'YES (TOTAL)', '% (YES)', 'NO (TOTAL)', '% (NO)', '1.', 'A notice was given prior to the schedule of audit.', '2.', 'The audit was conducted on the agreed schedule.', '3.', 'The purpose and scope of audit were clearly communicated.', '4.', 'The audit was conducted systematically.', '5.', 'A timely and constructive wrap-up meeting was conducted and it provided enough opportunity to clarify the audit findings.', 'IV.', 'General Feedback', 'YES (TOTAL)', '% (YES)', 'NO (TOTAL)', '% (NO)', '1.', 'The recommendations are relevant and useful to address key issues on the existing policies and procedures.', '2.', 'The entire audit process has provided clarity in terms of carrying out the duties and responsibilities at work.', '3.', 'The audit was helpful in identifying areas of improvement of the current system.', '4.', 'Audit results were fairly and accurately reported using an objective perspective.', '5.', 'The audit added value and provided meaningful results.');

-- --------------------------------------------------------

--
-- Table structure for table `auditee_afsform_desc`
--

CREATE TABLE `auditee_afsform_desc` (
  `ID` int(100) NOT NULL,
  `School_Address_DESC` varchar(150) NOT NULL,
  `Phone_No_1_DESC` varchar(100) NOT NULL,
  `Phone_No_2_DESC` varchar(100) NOT NULL,
  `Phone_No_3_DESC` varchar(100) NOT NULL,
  `Phone_No_4_DESC` varchar(100) NOT NULL,
  `School_Website_DESC` varchar(100) NOT NULL,
  `School_Facebook_DESC` varchar(100) NOT NULL,
  `School_Instagram_DESC` varchar(100) NOT NULL,
  `QAIE_Office_Title_DESC` varchar(100) NOT NULL,
  `AFS_Title_DESC` varchar(100) NOT NULL,
  `Name_Of_Auditor_DESC` varchar(100) NOT NULL,
  `Date_Accomplished_DESC` varchar(100) NOT NULL,
  `Name_Of_Auditee_DESC` varchar(100) NOT NULL,
  `Department_Office_DESC` varchar(100) NOT NULL,
  `#_Table_I_DESC` varchar(100) NOT NULL,
  `Table_I_DESC` varchar(500) NOT NULL,
  `Table_I_Yes_Opt_DESC` varchar(100) NOT NULL,
  `Table_I_No_Opt_DESC` varchar(100) NOT NULL,
  `Table_I_Remarks_DESC` varchar(100) NOT NULL,
  `#_Question_1A_DESC` varchar(100) NOT NULL,
  `Question_1A_DESC` varchar(500) NOT NULL,
  `#_Question_2A_DESC` varchar(100) NOT NULL,
  `Question_2A_DESC` varchar(500) NOT NULL,
  `#_Question_3A_DESC` varchar(100) NOT NULL,
  `Question_3A_DESC` varchar(500) NOT NULL,
  `#_Question_4A_DESC` varchar(100) NOT NULL,
  `Question_4A_DESC` varchar(500) NOT NULL,
  `#_Question_5A_DESC` varchar(100) NOT NULL,
  `Question_5A_DESC` varchar(500) NOT NULL,
  `#_Table_II_DESC` varchar(100) NOT NULL,
  `Table_II_DESC` varchar(500) NOT NULL,
  `Table_II_Yes_Opt_DESC` varchar(100) NOT NULL,
  `Table_II_No_Opt_DESC` varchar(100) NOT NULL,
  `Table_II_Remarks_DESC` varchar(100) NOT NULL,
  `#_Question_1B_DESC` varchar(100) NOT NULL,
  `Question_1B_DESC` varchar(500) NOT NULL,
  `#_Question_2B_DESC` varchar(100) NOT NULL,
  `Question_2B_DESC` varchar(500) NOT NULL,
  `#_Question_3B_DESC` varchar(100) NOT NULL,
  `Question_3B_DESC` varchar(500) NOT NULL,
  `#_Question_4B_DESC` varchar(100) NOT NULL,
  `Question_4B_DESC` varchar(500) NOT NULL,
  `#_Question_5B_DESC` varchar(100) NOT NULL,
  `Question_5B_DESC` varchar(500) NOT NULL,
  `#_Table_III_DESC` varchar(100) NOT NULL,
  `Table_III_DESC` varchar(500) NOT NULL,
  `Table_III_Yes_Opt_DESC` varchar(100) NOT NULL,
  `Table_III_No_Opt_DESC` varchar(100) NOT NULL,
  `Table_III_Remarks_DESC` varchar(100) NOT NULL,
  `#_Question_1C_DESC` varchar(100) NOT NULL,
  `Question_1C_DESC` varchar(500) NOT NULL,
  `#_Question_2C_DESC` varchar(100) NOT NULL,
  `Question_2C_DESC` varchar(500) NOT NULL,
  `#_Question_3C_DESC` varchar(100) NOT NULL,
  `Question_3C_DESC` varchar(500) NOT NULL,
  `#_Question_4C_DESC` varchar(100) NOT NULL,
  `Question_4C_DESC` varchar(500) NOT NULL,
  `#_Question_5C_DESC` varchar(100) NOT NULL,
  `Question_5C_DESC` varchar(500) NOT NULL,
  `#_Table_IV_DESC` varchar(100) NOT NULL,
  `Table_IV_DESC` varchar(500) NOT NULL,
  `Table_IV_Yes_Opt_DESC` varchar(100) NOT NULL,
  `Table_IV_No_Opt_DESC` varchar(100) NOT NULL,
  `Table_IV_Remarks_DESC` varchar(100) NOT NULL,
  `#_Question_1D_DESC` varchar(100) NOT NULL,
  `Question_1D_DESC` varchar(500) NOT NULL,
  `#_Question_2D_DESC` varchar(100) NOT NULL,
  `Question_2D_DESC` varchar(500) NOT NULL,
  `#_Question_3D_DESC` varchar(100) NOT NULL,
  `Question_3D_DESC` varchar(500) NOT NULL,
  `#_Question_4D_DESC` varchar(100) NOT NULL,
  `Question_4D_DESC` varchar(500) NOT NULL,
  `#_Question_5D_DESC` varchar(100) NOT NULL,
  `Question_5D_DESC` varchar(500) NOT NULL,
  `#_Table_V_DESC` varchar(100) NOT NULL,
  `Table_V_DESC` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `auditee_afsform_desc`
--

INSERT INTO `auditee_afsform_desc` (`ID`, `School_Address_DESC`, `Phone_No_1_DESC`, `Phone_No_2_DESC`, `Phone_No_3_DESC`, `Phone_No_4_DESC`, `School_Website_DESC`, `School_Facebook_DESC`, `School_Instagram_DESC`, `QAIE_Office_Title_DESC`, `AFS_Title_DESC`, `Name_Of_Auditor_DESC`, `Date_Accomplished_DESC`, `Name_Of_Auditee_DESC`, `Department_Office_DESC`, `#_Table_I_DESC`, `Table_I_DESC`, `Table_I_Yes_Opt_DESC`, `Table_I_No_Opt_DESC`, `Table_I_Remarks_DESC`, `#_Question_1A_DESC`, `Question_1A_DESC`, `#_Question_2A_DESC`, `Question_2A_DESC`, `#_Question_3A_DESC`, `Question_3A_DESC`, `#_Question_4A_DESC`, `Question_4A_DESC`, `#_Question_5A_DESC`, `Question_5A_DESC`, `#_Table_II_DESC`, `Table_II_DESC`, `Table_II_Yes_Opt_DESC`, `Table_II_No_Opt_DESC`, `Table_II_Remarks_DESC`, `#_Question_1B_DESC`, `Question_1B_DESC`, `#_Question_2B_DESC`, `Question_2B_DESC`, `#_Question_3B_DESC`, `Question_3B_DESC`, `#_Question_4B_DESC`, `Question_4B_DESC`, `#_Question_5B_DESC`, `Question_5B_DESC`, `#_Table_III_DESC`, `Table_III_DESC`, `Table_III_Yes_Opt_DESC`, `Table_III_No_Opt_DESC`, `Table_III_Remarks_DESC`, `#_Question_1C_DESC`, `Question_1C_DESC`, `#_Question_2C_DESC`, `Question_2C_DESC`, `#_Question_3C_DESC`, `Question_3C_DESC`, `#_Question_4C_DESC`, `Question_4C_DESC`, `#_Question_5C_DESC`, `Question_5C_DESC`, `#_Table_IV_DESC`, `Table_IV_DESC`, `Table_IV_Yes_Opt_DESC`, `Table_IV_No_Opt_DESC`, `Table_IV_Remarks_DESC`, `#_Question_1D_DESC`, `Question_1D_DESC`, `#_Question_2D_DESC`, `Question_2D_DESC`, `#_Question_3D_DESC`, `Question_3D_DESC`, `#_Question_4D_DESC`, `Question_4D_DESC`, `#_Question_5D_DESC`, `Question_5D_DESC`, `#_Table_V_DESC`, `Table_V_DESC`) VALUES
(1, 'St. Dominic Complex, E. Aguinaldo Highway, Bacoor City, Cavite, Philippines 4102', '0917 625 8222', '0922 850 9200', '(046) 417 7322', '(046) 417 8161', 'www.stdominiccollege.edu.ph', 'stdominiccollege', '@sdcapikemen', 'QUALITY ASSURANCE & INSTITUTIONAL EFFECTIVENESS OFFICE', 'AUDITEE FEEDBACK SURVEY', 'Name of Auditor:', 'Date Accomplished:', 'Name of Auditee:', 'Department/Office/Unit:', 'I.', 'Auditor\'s Conduct and Decorum', 'YES', 'NO', 'REMARKS', '1.', 'The auditor maintained a positive attitude.', '2.', 'The auditor dressed appropriately during the audit.', '3.', 'The auditor exhibited courtesy and professionalism.', '4.', 'The auditor demonstrated the ability to empathize with the auditee.', '5.', 'The auditor listened attentively to the auditee\'s concerns.', 'II.', 'Competence', 'YES', 'NO', 'REMARKS', '1.', 'The auditor showed evidence of preparation.', '2.', 'The auditor demonstrated good communication skills.', '3.', 'The auditor provided the auditee an opportunity to ask questions.', '4.', 'The auditor demonstrated high level of objectivity and integrity.', '5.', 'The auditor demonstrated knowledge of the policies and procedures being audited.', 'III.', 'Auditing Process', 'YES', 'NO', 'REMARKS', '1.', 'A notice was given prior to the schedule of audit.', '2.', 'The audit was conducted on the agreed schedule.', '3.', 'The purpose and scope of audit were clearly communicated.', '4.', 'The audit was conducted systematically.', '5.', 'A timely and constructive wrap-up meeting was conducted and it provided enough opportunity to clarify the audit findings.', 'IV.', 'General Feedback', 'YES', 'NO', 'REMARKS', '1.', 'The recommendations are relevant and useful to address key issues on the existing policies and procedures.', '2.', 'The entire audit process has provided clarity in terms of carrying out the duties and responsibilities at work.', '3.', 'The audit was helpful in identifying areas of improvement of the current system.', '4.', 'Audit results were fairly and accurately reported using an objective perspective.', '5.', 'The audit added value and provided meaningful results.', 'V.', 'Please write down your comments or suggestions to improve the auditing services of the office:');

-- --------------------------------------------------------

--
-- Table structure for table `emanual_types`
--

CREATE TABLE `emanual_types` (
  `ID_Emanual_Type` int(200) NOT NULL,
  `Name_of_Emanual_Type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emanual_types`
--

INSERT INTO `emanual_types` (`ID_Emanual_Type`, `Name_of_Emanual_Type`) VALUES
(1, 'Uncontrolled Copy Version'),
(2, 'Master Copy Version');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` varchar(200) NOT NULL,
  `end` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'Test', '#01fe0a', '2024-10-06 00:00:00', '2024-10-07 00:00:00'),
(2, 'Accreditation Event Sample', '#004bfa', '2022-08-16 00:00:00', '2022-08-17 00:00:00'),
(3, 'Audit/Assessment Event Sample', '#ffdd00', '2022-08-17 00:00:00', '2022-08-18 00:00:00'),
(4, 'Holiday Event Sample', '#ff0d00', '2022-08-18 00:00:00', '2022-08-19 00:00:00'),
(5, 'Seminar Event Sample', '#01fe0a', '2022-08-19 07:00:00', '2022-08-19 10:00:00'),
(6, 'Wow', '#ffdd00', '2024-10-08 00:00:00', '2024-10-09 00:00:00'),
(7, 'Testt', '#004bfa', '2024-10-10 00:00:00', '2024-10-11 00:00:00'),
(8, 'Test Accrediation', '#004bfa', '2024-12-12 00:00:00', '2024-12-13 00:00:00'),
(9, 'Event', '#ffdd00', '2025-01-11 00:00:00', '2025-01-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE `event_types` (
  `ID_Event_Type` int(200) NOT NULL,
  `Color_of_Event_Type` varchar(200) NOT NULL,
  `Name_of_Event_Type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`ID_Event_Type`, `Color_of_Event_Type`, `Name_of_Event_Type`) VALUES
(8, '#004bfa', 'Accreditations'),
(12, '#01fe0a', 'Seminar'),
(13, '#ff0d00', 'Holiday'),
(14, '#ffdd00', 'Audit/Assessment');

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `name`, `parent_id`, `created_at`) VALUES
(10, 'New', NULL, '2024-12-16 03:50:00'),
(11, 'AAMB Uncontrolled Copy', NULL, '2024-12-16 06:37:47'),
(12, 'ISO', NULL, '2025-01-11 06:47:12'),
(13, 'Pacucoa', NULL, '2025-01-11 06:53:21'),
(15, 'Sample', NULL, '2025-01-18 10:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `folder_access`
--

CREATE TABLE `folder_access` (
  `folder_id` int(11) NOT NULL,
  `ID_Office` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `folder_access`
--

INSERT INTO `folder_access` (`folder_id`, `ID_Office`) VALUES
(0, 3),
(13, 5);

-- --------------------------------------------------------

--
-- Table structure for table `folder_offices`
--

CREATE TABLE `folder_offices` (
  `folder_id` int(11) NOT NULL,
  `ID_Office` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_nea_datatable`
--

CREATE TABLE `home_nea_datatable` (
  `ID_NEA` int(100) NOT NULL,
  `NEA_Image` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `NEA_Title` varchar(100) NOT NULL,
  `NEA_Description` varchar(5000) NOT NULL,
  `Date_Uploaded` varchar(100) NOT NULL,
  `date_uploaded_nea` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `home_nea_datatable`
--

INSERT INTO `home_nea_datatable` (`ID_NEA`, `NEA_Image`, `Category`, `NEA_Title`, `NEA_Description`, `Date_Uploaded`, `date_uploaded_nea`) VALUES
(54, '4355d6736d2c14d96cee4e1db7f652f8.jpg', 'Announcement', 'Announcement', 'Announcement', '05/12/2024', '2024-05-12, 22:06:22'),
(55, 'drymaster-logo2.png', 'Events', 'Event Test', 'Lorem', '2024-12-02 05:07:41', '2024-12-02 05:07:41'),
(57, 'AdobeStock_961888070-opt.jpeg', 'News', 'News ss', 'Newss lorem', '2024-12-02 05:51:26', '2024-12-02 05:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `qaiedirector_dcrform`
--

CREATE TABLE `qaiedirector_dcrform` (
  `Year_Generated` int(4) NOT NULL,
  `DCRForm_ID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `Status_DocuController` varchar(100) DEFAULT NULL,
  `Status_DeptHead` varchar(100) DEFAULT NULL,
  `Status_Requester` varchar(100) NOT NULL,
  `QAIE_Directors_Comments` varchar(100) NOT NULL,
  `DocuController_Comments` text NOT NULL,
  `Request_Status` varchar(100) DEFAULT NULL,
  `ESignature_DoQ` text DEFAULT NULL,
  `Name_Of_QAIE_Director` varchar(100) DEFAULT NULL,
  `Date_Of_QAIE_Director_Action` varchar(100) DEFAULT NULL,
  `ESignature_DeptHead` text DEFAULT NULL,
  `Name_Of_Approving_Authority` varchar(100) DEFAULT NULL,
  `Date_Of_Approval` varchar(100) DEFAULT NULL,
  `Date_Of_Request` varchar(100) NOT NULL,
  `To_Who` varchar(100) NOT NULL,
  `From_Office` varchar(100) NOT NULL,
  `Type_Of_Request` varchar(100) NOT NULL,
  `Document_No` varchar(100) NOT NULL,
  `Document_Title` varchar(100) NOT NULL,
  `Revision_Status` varchar(100) NOT NULL,
  `Changes_Requested` varchar(500) NOT NULL,
  `Reason_For_The_Change` varchar(500) NOT NULL,
  `Requested_By` varchar(100) NOT NULL,
  `New_Document_No` varchar(100) NOT NULL,
  `New_Document_Version` varchar(100) NOT NULL,
  `New_Document_Revision` varchar(100) NOT NULL,
  `date_uploaded_dttbl` varchar(100) NOT NULL,
  `Random_Unique_Code` varchar(100) NOT NULL,
  `User_ID` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `qaiedirector_dcrform`
--

INSERT INTO `qaiedirector_dcrform` (`Year_Generated`, `DCRForm_ID`, `Status_DocuController`, `Status_DeptHead`, `Status_Requester`, `QAIE_Directors_Comments`, `DocuController_Comments`, `Request_Status`, `ESignature_DoQ`, `Name_Of_QAIE_Director`, `Date_Of_QAIE_Director_Action`, `ESignature_DeptHead`, `Name_Of_Approving_Authority`, `Date_Of_Approval`, `Date_Of_Request`, `To_Who`, `From_Office`, `Type_Of_Request`, `Document_No`, `Document_Title`, `Revision_Status`, `Changes_Requested`, `Reason_For_The_Change`, `Requested_By`, `New_Document_No`, `New_Document_Version`, `New_Document_Revision`, `date_uploaded_dttbl`, `Random_Unique_Code`, `User_ID`) VALUES
(2024, 009, 'Already Sent to Director for QAIE', 'Already Sent to Document Controller', 'Already Sent to Department Head', 'Good narin to', 'Good na to', 'Request Accepted', '2379e15867f17cc612c1b52a733f2de9.PNG', 'James', '12/03/2024', '564cbfe7801b200f68bbf0f37ff5f082.png', 'SimonHH', '12/03/2024', '12/03/2024', 'Document Controller', 'SBCS', 'New Document', '8888', 'Test', 'Test', 'Test', 'Test', 'requester', 'Test', 'Test', 'Test', '2024-12-03 09:17:57', '66c08924d0eaeaa913c5d184ef2abc47', 221),
(2024, 008, 'Already Sent to Director for QAIE', 'Already Sent to Document Controller', 'Already Sent to Department Head', 'Test', 'Nice', 'Request Accepted', '2379e15867f17cc612c1b52a733f2de9.PNG', 'James', '12/03/2024', NULL, 'Simon', '12/03/2024', '12/03/2024', 'Document Controller', 'SBCS', 'New Document', 'New Test', 'NaNew Test', 'New Test', 'New Test', 'New Test', 'requester', 'New Test', 'New Test', 'New Test', '2024-12-03 09:08:03', '4f5e2094d848256e89c8be2975a0aada', 221),
(2024, 007, 'Already Sent to Director for QAIE', 'Already Sent to Document Controller', 'Already Sent to Department Head', 'Good', 'Nice', 'Request Accepted', NULL, 'James', '12/03/2024', NULL, 'SimonH', '12/03/2024', '12/03/2024', 'Document Controller', 'SBCS', 'New Document', '1112', '1112', '1112', '1112', '1112', 'requester', '1112', '1112', '1112', '2024-12-03 09:05:11', 'c916cadae399abd288d5eeb339be72c7', 221),
(2024, 005, 'Already Sent to Director for QAIE', 'Already Sent to Document Controller', 'Already Sent to Department Head', '', 'Test', 'Request Accepted', NULL, 'James', '12/03/2024', NULL, 'Simon DepartmentH', '12/03/2024', '12/03/2024', 'Document Controller', 'SBCS', 'New Document', '777', 'Wow', 'No', 'NONE', 'NONE', 'requester', 'NONE', 'NONE', 'NONE', '2024-12-03 07:58:43', '54d64925e1ac766547f9e33c76d8ace2', 218),
(2024, 006, NULL, 'Already Sent to Document Controller', 'Already Sent to Department Head', '', '', NULL, NULL, NULL, NULL, NULL, 'Simon H', '12/03/2024', '12/03/2024', 'Document Controller', 'SBCS', 'New Document', '333', 'Test', 'NONE', 'NONE', 'NONE', 'requester', 'NONE', 'NONE', 'NONE', '2024-12-03 08:59:21', '33351aba8305eb88bbf3267ae7a381a4', 223),
(2024, 010, NULL, 'Already Sent to Document Controller', 'Already Sent to Department Head', '', '', NULL, NULL, NULL, NULL, '564cbfe7801b200f68bbf0f37ff5f082.png', 'Mia Collado', '12/09/2024', '12/07/2024', 'Document Controller', 'SBCS', 'New Document', '12345', 'Test 12345', 'NONE', 'None', 'None', 'requester', 'None', 'None', 'None', '2024-12-07 15:40:44', 'b547ecae08bf1cff1b51a2fe27a84fa4', 223),
(2024, 011, NULL, NULL, 'Already Sent to Department Head', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12/09/2024', 'Document Controller', 'SHS', 'New Document', '123456', 'Document Title', 'N/A', 'Npne', 'Nothing', 'requester', '123456', '12', 'Revision', '2024-12-09 14:56:09', '9ee3e4cfdc6335609ba2cd94e81fa176', 218),
(2024, 012, NULL, NULL, 'Already Sent to Department Head', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12/12/2024', 'Document Controller', 'SBCS', 'Amend Document', 'AAMH 6.`18', 'Calibration of equipment', 'ewan', '12345', 'walalang', 'requester', '12345', '12345', '12345', '2024-12-12 09:13:47', '5c42968baf1b8d6a4ef6658719d4fdbc', 218),
(2024, 013, 'Already Sent to Director for QAIE', 'Already Sent to Document Controller', 'Already Sent to Department Head', 'None', 'None', 'Request Accepted', '2379e15867f17cc612c1b52a733f2de9.PNG', 'Dr. Alvin Jason A. Virata, MIT', '12/16/2024', '564cbfe7801b200f68bbf0f37ff5f082.png', 'Prof. Laila Ariate', '12/16/2024', '12/16/2024', 'Document Controller', 'SCMCS', 'Amend Document', 'F-LIB-109', 'Dominican Learning Resource Center (HED)', '0', 'Change form heading from \"Learning Resource Office\" to \" Dominican Learning Resource Center (HED)', 'Updating of Contents', 'requester', 'F-LIB-109', 'N/A', '1', '2024-12-16 07:03:28', '0f97c087de457f94cc150ad5da1b90b9', 221),
(2024, 014, 'Revision needed, returned to Requester', 'Already Sent to Document Controller', 'Revisions Requested', '', '', NULL, NULL, NULL, NULL, '564cbfe7801b200f68bbf0f37ff5f082.png', 'Ms. Valerie Insigne', '12/16/2024', '12/16/2024', 'Document Controller', 'SCMCS', 'Amend Document', 'F-BED-309', 'Student Disciplinary Off-Classroom Activities', '1', 'Change the position title from \"Director for Student Affairs Services\" to \"Assistant Principal for S', 'Change of designation', 'requester', 'F-BED-309', '2', '', '2024-12-16 07:29:16', 'e2ef3d4a5a879bfd8ad109042b6c4088', 223),
(2024, 015, NULL, NULL, 'Already Sent to Department Head', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12/19/2024', 'Document Controller', 'SCMCS', 'New Document', 'F-DSA-422', 'parental consent', '2', 'revision on the form ', 'revision on the form ', 'requester', 'F-DSA-422', '2', '3', '2024-12-19 07:22:40', '4eadd5c96d27dd8cf78743b58aca8ca4', 218),
(2024, 016, NULL, NULL, 'Already Sent to Department Head', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12/19/2024', 'Document Controller', 'SCMCS', 'Amend Document', 'sargdafgdfg', 'dfgdsfgdsfg', 'adfgadfg', 'fdgdfgdsfg', 'fggfg', 'requester', 'fgdfg', 'dfgdfg', 'sdfgsdfgsdfg', '2024-12-19 07:45:59', 'dfd456b964d8372b371fef01da72128a', 218),
(2024, 017, NULL, 'Already Sent to Document Controller', 'Already Sent to Department Head', '', '', NULL, NULL, NULL, NULL, '564cbfe7801b200f68bbf0f37ff5f082.png', 'Laila R. Ariate', '12/19/2024', '12/19/2024', 'Document Controller', 'SCMCS', 'Amend Document', 'F-HRO-112', 'DSDASDA', '2', 'DSDA', 'DSAFA', 'requester', 'FSAFA', 'FSAFSA', 'FASFAS', '2024-12-19 07:52:28', 'c554226a8052767e53ad376eb0496e58', 223),
(2025, 001, NULL, NULL, 'Already Sent to Department Head', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01/11/2025', 'Document Controller', 'SCMCS', 'New Document', 'this is a test', 'this is a test', '1', 'this is a test', 'this is a test', 'requester', '1', '1', '', '2025-01-11 06:40:59', '64db7e40e56b1b452bab88efde07e083', 218);

-- --------------------------------------------------------

--
-- Table structure for table `qaiedirector_dcrform_desc`
--

CREATE TABLE `qaiedirector_dcrform_desc` (
  `ID` int(100) NOT NULL,
  `School_DESC` varchar(100) NOT NULL,
  `DCR_DESC` varchar(100) NOT NULL,
  `Date_Of_Request_DESC` varchar(100) NOT NULL,
  `COLON_Date_Of_Request_DESC` varchar(100) NOT NULL,
  `DCR_No_DESC` varchar(100) NOT NULL,
  `To_Who_DESC` varchar(100) NOT NULL,
  `COLON_To_Who_DESC` varchar(100) NOT NULL,
  `From_Office_DESC` varchar(100) NOT NULL,
  `COLON_From_Office_DESC` varchar(100) NOT NULL,
  `Amend_Document_DESC` varchar(100) NOT NULL,
  `New_Document_DESC` varchar(100) NOT NULL,
  `Delete_Document_DESC` varchar(100) NOT NULL,
  `#_Details_Of_Document_DESC` varchar(100) NOT NULL,
  `Details_Of_Document_DESC` varchar(100) NOT NULL,
  `Document_Number_DESC` varchar(100) NOT NULL,
  `COLON_Document_Number_DESC` varchar(100) NOT NULL,
  `Document_Title_DESC` varchar(100) NOT NULL,
  `COLON_Document_Title_DESC` varchar(100) NOT NULL,
  `Revision_Status_DESC` varchar(100) NOT NULL,
  `COLON_Revision_Status_DESC` varchar(100) NOT NULL,
  `Note_Attach_DraftCopy_DESC` varchar(100) NOT NULL,
  `#_Changes_Requested_DESC` varchar(100) NOT NULL,
  `Changes_Requested_DESC` varchar(100) NOT NULL,
  `Reason_For_The_Change_DESC` varchar(100) NOT NULL,
  `Requested_By_DESC` varchar(100) NOT NULL,
  `#_QAIE_Director_Comments_DESC` varchar(100) NOT NULL,
  `QAIE_Director_Comments_DESC` varchar(100) NOT NULL,
  `Request_Denied_DESC` varchar(100) NOT NULL,
  `Request_Accepted_DESC` varchar(100) NOT NULL,
  `Signature/Date_DESC` varchar(100) NOT NULL,
  `#_Approving_Authority_DESC` varchar(100) NOT NULL,
  `Approving_Authority_DESC` varchar(100) NOT NULL,
  `Signature_Over_Printed_Name_DESC` varchar(100) NOT NULL,
  `Date_Of_Approval_DESC` varchar(100) NOT NULL,
  `#_Document_Status_DESC` varchar(100) NOT NULL,
  `Document_Status_DESC` varchar(100) NOT NULL,
  `New_Document_Status_DESC` varchar(100) NOT NULL,
  `New_Document_No_DESC` varchar(100) NOT NULL,
  `New_Document_Version_DESC` varchar(100) NOT NULL,
  `New_Document_Revision_DESC` varchar(100) NOT NULL,
  `Revision_Date_Version_DESC` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `qaiedirector_dcrform_desc`
--

INSERT INTO `qaiedirector_dcrform_desc` (`ID`, `School_DESC`, `DCR_DESC`, `Date_Of_Request_DESC`, `COLON_Date_Of_Request_DESC`, `DCR_No_DESC`, `To_Who_DESC`, `COLON_To_Who_DESC`, `From_Office_DESC`, `COLON_From_Office_DESC`, `Amend_Document_DESC`, `New_Document_DESC`, `Delete_Document_DESC`, `#_Details_Of_Document_DESC`, `Details_Of_Document_DESC`, `Document_Number_DESC`, `COLON_Document_Number_DESC`, `Document_Title_DESC`, `COLON_Document_Title_DESC`, `Revision_Status_DESC`, `COLON_Revision_Status_DESC`, `Note_Attach_DraftCopy_DESC`, `#_Changes_Requested_DESC`, `Changes_Requested_DESC`, `Reason_For_The_Change_DESC`, `Requested_By_DESC`, `#_QAIE_Director_Comments_DESC`, `QAIE_Director_Comments_DESC`, `Request_Denied_DESC`, `Request_Accepted_DESC`, `Signature/Date_DESC`, `#_Approving_Authority_DESC`, `Approving_Authority_DESC`, `Signature_Over_Printed_Name_DESC`, `Date_Of_Approval_DESC`, `#_Document_Status_DESC`, `Document_Status_DESC`, `New_Document_Status_DESC`, `New_Document_No_DESC`, `New_Document_Version_DESC`, `New_Document_Revision_DESC`, `Revision_Date_Version_DESC`) VALUES
(1, 'ST DOMINIC COLLEGE OF ASIA', 'DOCUMENT CHANGE REQUEST', 'DATE', ':', 'DCR No.', 'TO', ':', 'FROM', ':', 'Amend document', 'New document', 'Delete document', '1.', 'DETAILS OF DOCUMENT', 'Document Number', ':', 'Document Title', ':', 'Revision Status', ':', 'Note: Please attach draft copy of the document.', '2.', 'CHANGE(S) REQUESTED', 'REASON FOR THE CHANGE', 'Requested By', '3.', 'QAIE DIRECTOR\'s COMMENTS', 'Request Denied', 'Request Accepted', 'Signature/Date', '4.', 'APPROVING AUTHORITY', 'Signature Over Printed Name', 'Date', '5.', 'DOCUMENT STATUS', 'New Document Status', 'No.:', 'Version:', 'Revision:', 'F-QUA-001 Rev. 1 (03/01/19)');

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `id_storage` int(200) NOT NULL,
  `random_unique_code` varchar(200) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `file_type` varchar(200) NOT NULL,
  `date_uploaded` varchar(200) NOT NULL,
  `user_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`id_storage`, `random_unique_code`, `file_name`, `file_type`, `date_uploaded`, `user_id`) VALUES
(42, '2024', 'r0HAYEvbO5D7gm8.pdf', 'application/pdf', '2024-10-29 10:51:20', 218),
(43, '3899955ea91cde9c51a8a4f972bff447', '8OC0PVJgRmoWhZv.pdf', 'application/pdf', '2024-10-30 13:23:09', 218),
(44, '4e56538f4410a0c6ab160b1928ad8849', 'cNb1Gag9TMEiq8F.pdf', 'application/pdf', '2024-12-02 19:01:46', 218),
(45, '911f180aef8aa2583accee293b51b919', 'vC6uIOnZlMF2Q8c.pdf', 'application/pdf', '2024-12-02 19:08:40', 218),
(46, '54d64925e1ac766547f9e33c76d8ace2', 'So8sqtUdmAnvOkB.pdf', 'application/pdf', '2024-12-03 07:58:43', 218),
(47, '33351aba8305eb88bbf3267ae7a381a4', 'Hca7USdJsBALInh.pdf', 'application/pdf', '2024-12-03 08:59:21', 218),
(48, 'c916cadae399abd288d5eeb339be72c7', 'oNqGw5ksrjf7bIt.pdf', 'application/pdf', '2024-12-03 09:05:11', 218),
(49, '4f5e2094d848256e89c8be2975a0aada', 'qOyGfZ4NUYbPhwE.pdf', 'application/pdf', '2024-12-03 09:08:03', 218),
(50, '66c08924d0eaeaa913c5d184ef2abc47', 'Vfp3sqZw8GnYCUz.pdf', 'application/pdf', '2024-12-03 09:17:57', 218),
(51, 'b547ecae08bf1cff1b51a2fe27a84fa4', 'fJ9MXl5n7VE10jP.pdf', 'application/pdf', '2024-12-07 15:40:44', 218),
(52, '9ee3e4cfdc6335609ba2cd94e81fa176', 'TfVR6FCWaO8k3Ir.pdf', 'application/pdf', '2024-12-09 14:56:09', 218),
(53, '5c42968baf1b8d6a4ef6658719d4fdbc', 'Gho0O2uwEBAj6fz.pdf', 'application/pdf', '2024-12-12 09:13:47', 218),
(54, '0f97c087de457f94cc150ad5da1b90b9', 'mWgM0rXRlPbBhy1.pdf', 'application/pdf', '2024-12-16 07:03:28', 218),
(55, 'e2ef3d4a5a879bfd8ad109042b6c4088', 'ekRMLQDvmN9fayz.pdf', 'application/pdf', '2024-12-16 07:29:16', 218),
(56, '4eadd5c96d27dd8cf78743b58aca8ca4', '83Xv1UxcOwYPZ7L.pdf', 'application/pdf', '2024-12-19 07:22:40', 218),
(57, 'dfd456b964d8372b371fef01da72128a', 'qQCyb6IBN4ivo2R.pdf', 'application/pdf', '2024-12-19 07:45:59', 218),
(58, 'c554226a8052767e53ad376eb0496e58', 'iAn1JtFTohe9Oxc.pdf', 'application/pdf', '2024-12-19 07:52:28', 218),
(59, '64db7e40e56b1b452bab88efde07e083', 'h8aRvHyx5ZPeBFO.pdf', 'application/pdf', '2025-01-11 06:40:59', 218);

-- --------------------------------------------------------

--
-- Table structure for table `storage_asr`
--

CREATE TABLE `storage_asr` (
  `File_ID` int(200) NOT NULL,
  `Department` varchar(200) NOT NULL,
  `Office` varchar(200) NOT NULL,
  `Date_Uploaded` varchar(200) NOT NULL,
  `File_Type` varchar(200) NOT NULL,
  `File_Name` varchar(200) NOT NULL,
  `User_ID` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `storage_asr`
--

INSERT INTO `storage_asr` (`File_ID`, `Department`, `Office`, `Date_Uploaded`, `File_Type`, `File_Name`, `User_ID`) VALUES
(1, 'Academics', 'BEd', '2022-01-16, 01:00:00', 'application/pdf', '6281ee237c78b3.43397163.pdf', 196),
(2, 'Academics', 'SBCS', '2022-02-16, 02:00:00', 'application/pdf', '6281ee50bfe199.23782627.pdf', 196),
(3, 'Administrative', 'BAO', '2022-03-16, 03:00:00', 'application/pdf', '6281efad481781.64860993.pdf', 196),
(4, 'ASF', 'RDO', '2022-04-16, 04:00:00', 'application/pdf', '6281efc159f326.08414633.pdf', 196),
(5, 'DSAS', 'Alumni', '2022-05-16, 05:00:00', 'application/pdf', '6281efd3cec2d7.41633667.pdf', 196),
(11, 'Finance', 'BDO', '2024-07-13, 21:34:11', 'application/pdf', '66928253cbfb30.57324763.pdf', 221);

-- --------------------------------------------------------

--
-- Table structure for table `storage_documentations`
--

CREATE TABLE `storage_documentations` (
  `File_ID` int(100) NOT NULL,
  `File_Title` varchar(100) NOT NULL,
  `File_Name` varchar(100) NOT NULL,
  `File_Type` varchar(100) NOT NULL,
  `Date_Uploaded` varchar(100) NOT NULL,
  `User_ID` int(100) NOT NULL,
  `folder_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `storage_documentations`
--

INSERT INTO `storage_documentations` (`File_ID`, `File_Title`, `File_Name`, `File_Type`, `Date_Uploaded`, `User_ID`, `folder_id`) VALUES
(5, 'Wala lang', 'For_Printing.pdf', 'application/pdf', '2024-12-12 08:52:01', 224, 6),
(6, 'Test', 'lorem-ipsum.pdf', 'application/pdf', '2024-12-16 03:50:13', 224, 10),
(7, 'AAMB 5.2', 'AAMB_5_2_Faculty_Loading_Rev__1_(8-25-2023)1.pdf', 'application/pdf', '2024-12-16 06:39:13', 224, 11),
(8, 'AAMB 7.4', 'AAMB_7_4_Student_Clubs_and_Organizations_Rev__1_(08-25-2023).pdf', 'application/pdf', '2024-12-16 06:40:06', 224, 11),
(9, 'Area 1', 'RESUME.pdf', 'application/pdf', '2025-01-11 06:55:28', 224, 13),
(10, 'Area 2', 'Virgil_Paul_Employment_Contract.pdf', 'application/pdf', '2025-01-11 06:55:43', 224, 13),
(11, 'Area 3', 'Pangilinan_CPfinalterm.pdf', 'application/pdf', '2025-01-11 06:56:03', 224, 13);

-- --------------------------------------------------------

--
-- Table structure for table `storage_emanuals`
--

CREATE TABLE `storage_emanuals` (
  `File_ID` int(100) NOT NULL,
  `File_Title` varchar(100) NOT NULL,
  `File_Name` varchar(100) NOT NULL,
  `File_Type` varchar(100) NOT NULL,
  `Date_Uploaded` varchar(100) NOT NULL,
  `Emanual_Type` varchar(200) NOT NULL,
  `User_ID` int(100) NOT NULL,
  `folder_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `storage_emanuals`
--

INSERT INTO `storage_emanuals` (`File_ID`, `File_Title`, `File_Name`, `File_Type`, `Date_Uploaded`, `Emanual_Type`, `User_ID`, `folder_id`) VALUES
(43, 'Academic Affairs Manual (AAM)', '66928332411cd0.15430145.pdf', 'application/pdf', '2024-07-13, 21:37', 'Uncontrolled Copy Version', 221, 2),
(44, 'Administrative Affairs Manual (ADM)', '6692834f124e10.41939081.pdf', 'application/pdf', '2024-07-13, 21:38', 'Uncontrolled Copy Version', 221, 2),
(45, 'Data Privacy Manual (DPM)', '66928366493551.64480853.pdf', 'application/pdf', '2024-07-13, 21:38', 'Uncontrolled Copy Version', 221, 2),
(46, 'Financial Affairs Manual (FAM)', '6692837974e8e1.35305088.pdf', 'application/pdf', '2024-07-13, 21:39', 'Uncontrolled Copy Version', 221, 2),
(47, 'Job Description Manual (JDM)', '66928396b3b183.43952608.pdf', 'application/pdf', '2024-07-13, 21:39', 'Uncontrolled Copy Version', 221, 2),
(48, 'Quality System Manual (QSM)', '669283ae335ce6.67412635.pdf', 'application/pdf', '2024-07-13, 21:39', 'Uncontrolled Copy Version', 221, 2),
(49, 'TEst', '631754f6e79503_67223007.pdf', 'application/pdf', '2024-09-16 16:43:56', 'Master Copy Version', 227, 1);

-- --------------------------------------------------------

--
-- Table structure for table `whoweare`
--

CREATE TABLE `whoweare` (
  `user_id` int(200) NOT NULL,
  `WhoWeAre_Category` varchar(200) NOT NULL,
  `WhoWeAre_Category_Desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `whoweare`
--

INSERT INTO `whoweare` (`user_id`, `WhoWeAre_Category`, `WhoWeAre_Category_Desc`) VALUES
(1, 'Mission', 'To purposively link quality education, training, and research with community service in  			 pursuing the holistic development of individuals through innovative programs and productive  			 activities attuned to the needs of the global community.'),
(2, 'Vision', 'A community of dynamic and proactive scholars and learners within the Asia-Pacific region  			 upholding the high standards of excellence in education, research, and community service,  			 towards the attainment of a better quality of life.'),
(3, 'Goals', 'St.Dominic College of Asia aims to: 1. Prepare the students to become competent, productive and socially responsible professional. 2. Actively promote research and the utilization of new technology for the enhancement of individual competencies. 3. Assume leadership role in addressing the concerns of the academic community towards improving their quality of life.'),
(4, 'Core Values', 'St. Dominic College of Asia performs its various roles toward the achievement of its  			 Vision-Mission-Goals as it anchors itself on a four-point set of core values: S - service D - dynamism C - competence A - accountability'),
(5, 'Quality Policy', 'St. Dominic College of Asia commits to providing excellent academic and support  			 services that exceed the expectations of all stakeholders as the College continuously  			 develops and sustains the effectiveness of its quality management system.');

-- --------------------------------------------------------

--
-- Table structure for table `whoweare_new`
--

CREATE TABLE `whoweare_new` (
  `ID_WhoWeAre` int(100) NOT NULL,
  `Mission_Title` varchar(100) NOT NULL,
  `Mission_Description` varchar(1000) NOT NULL,
  `Vision_Title` varchar(100) NOT NULL,
  `Vision_Description` varchar(1000) NOT NULL,
  `Goals_Title` varchar(100) NOT NULL,
  `Goals_Description_0` varchar(1000) NOT NULL,
  `Goals_Description_1` varchar(1000) NOT NULL,
  `Goals_Description_2` varchar(1000) NOT NULL,
  `Goals_Description_3` varchar(1000) NOT NULL,
  `Core_Values_Title` varchar(100) NOT NULL,
  `Core_Values_Description_0` varchar(1000) NOT NULL,
  `Core_Values_Description_1` varchar(1000) NOT NULL,
  `Core_Values_Description_2` varchar(1000) NOT NULL,
  `Core_Values_Description_3` varchar(1000) NOT NULL,
  `Core_Values_Description_4` varchar(1000) NOT NULL,
  `Quality_Policy_Title` varchar(100) NOT NULL,
  `Quality_Policy_Description` varchar(1000) NOT NULL,
  `Quality_Objectives_Title` varchar(100) NOT NULL,
  `Quality_Objectives_Description_1` varchar(1000) NOT NULL,
  `Quality_Objectives_Description_2` varchar(1000) NOT NULL,
  `Quality_Objectives_Description_3` varchar(1000) NOT NULL,
  `Quality_Objectives_Description_4` varchar(1000) NOT NULL,
  `Quality_Objectives_Description_5` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `whoweare_new`
--

INSERT INTO `whoweare_new` (`ID_WhoWeAre`, `Mission_Title`, `Mission_Description`, `Vision_Title`, `Vision_Description`, `Goals_Title`, `Goals_Description_0`, `Goals_Description_1`, `Goals_Description_2`, `Goals_Description_3`, `Core_Values_Title`, `Core_Values_Description_0`, `Core_Values_Description_1`, `Core_Values_Description_2`, `Core_Values_Description_3`, `Core_Values_Description_4`, `Quality_Policy_Title`, `Quality_Policy_Description`, `Quality_Objectives_Title`, `Quality_Objectives_Description_1`, `Quality_Objectives_Description_2`, `Quality_Objectives_Description_3`, `Quality_Objectives_Description_4`, `Quality_Objectives_Description_5`) VALUES
(1, 'Mission', 'To purposively link quality education, training, and research with community service in pursuing the holistic development of individuals through innovative programs and productive activities attuned to the needs of the global community.', 'Vision', 'A community of dynamic and proactive scholars and learners within the Asia-Pacific region upholding the high standards of excellence in education, research, and community service, towards the attainment of a better quality of life.', 'Goals', 'St.Dominic College of Asia aims to:', '1. Prepare the students to become competent, productive and socially responsible professional.', '2. Actively promote research and the utilization of new technology for the enhancement of individual competencies.', '3. Assume leadership role in addressing the concerns of the academic community towards improving their quality of life.', 'Core Values', 'St. Dominic College of Asia performs its various roles toward the achievement of its Vision-Mission-Goals as it anchors itself on a four-point set of core values:', 'S - service', 'D - dynamism', 'C - competence', 'A - accountability', 'Quality Policy', 'St. Dominic College of Asia commits to providing excellent academic and support services that exceed the expectations of all stakeholders as the College continuously develops and sustains the effectiveness of its quality management system.', 'Quality Objectives', '1. To achieve excellence in academic programs and projects guided by the College Vision - Mission, and in compliance with CHED, DepEd, and TESDA requirements as well as those standards observed by duly accredited educational institutions.', '2. To establish, implement and maintain effective and efficient quality management system.', '3. To assume leadership role in improving the quality of life of the people by engaging SDCA stakeholders in meaningful community services.', '4. To focus on its task of revolutionizing education by instilling creativity and innovation among the faculty members, students, and administrative staff working collaboratively in enhancing the culture of research in the College.', '5. To identify, nurture and enhance human, physical and financial resources for productivity and sustainability.');

-- --------------------------------------------------------

--
-- Table structure for table `x_auditors`
--

CREATE TABLE `x_auditors` (
  `ID_Auditor` int(200) NOT NULL,
  `Name_Of_Auditor` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `x_auditors`
--

INSERT INTO `x_auditors` (`ID_Auditor`, `Name_Of_Auditor`) VALUES
(1, 'Alvin Jason A. Virata'),
(2, 'Jonathan A. Kupahu'),
(3, 'Liezl E. Abad'),
(4, 'Winterson C. Ambion');

-- --------------------------------------------------------

--
-- Table structure for table `y1_user_logs`
--

CREATE TABLE `y1_user_logs` (
  `ID` int(200) NOT NULL,
  `Date_and_Time_of_Action` varchar(200) NOT NULL,
  `Action_Made` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `User_Type` varchar(200) NOT NULL,
  `UR_Code` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `y1_user_logs`
--

INSERT INTO `y1_user_logs` (`ID`, `Date_and_Time_of_Action`, `Action_Made`, `Username`, `User_Type`, `UR_Code`) VALUES
(762, '2024-05-31, 07:30:05', 'Logged In', 'superadmin', 'Super Admin', '10c08bbe09d3f7badbd3cbd0d24ffe4d'),
(763, '2024-05-31, 07:30:38', 'Logged In', 'admin2', 'Administrator', '016b7c0943f05f82234609f41cb09bf9'),
(764, '2024-05-31, 07:31:06', 'Logged In', 'requester', 'Requester', '204b9ab1f0a1f76cd9573c9451ba2196'),
(765, '2024-05-31, 07:32:08', 'Logged In', 'departmenthead', 'Department Head', 'cf5674c385cd78d4ead31baeeda3ea37'),
(766, '2024-05-31, 07:33:12', 'Logged In', 'directorforqaie', 'Director for QAIE', '270f56568170b203fb19cef3fcffb927'),
(767, '2024-05-31, 07:34:10', 'Logged In', 'qaiemgmtofficer', 'QAIE Management Officer', 'bfa429db16c7a059a8fe8a671de44da8'),
(768, '2024-05-31, 07:35:13', 'Logged In', 'documentcontroller', 'Document Controller', '8f794181789c000523773f8f9744bedc'),
(769, '2024-05-31, 07:36:07', 'Logged In', 'president', 'President', '887bef2ff92dfcee98f2099e5227a1a6'),
(775, '2024-07-13, 21:19:57', 'Logged In', 'requester', 'Requester', '117853766d60202c897b23984134d0aa'),
(776, '2024-07-13, 21:20:12', 'Logged In', 'departmenthead', 'Department Head', 'de3fc490d5288c77b879124f43de3e82'),
(777, '2024-07-13, 21:20:21', 'Logged In', 'directorforqaie', 'Director for QAIE', '61bd5aae2c32d285222454a5d2fdaa6e'),
(778, '2024-07-13, 21:20:29', 'Logged In', 'qaiemgmtofficer', 'QAIE Management Officer', 'f080f6cdd1b0f3fcfa39c4cf33fb402d'),
(779, '2024-07-13, 21:20:37', 'Logged In', 'documentcontroller', 'Document Controller', '9f7acdca605b59b0e16a1b90947cd8fc'),
(780, '2024-07-13, 21:20:43', 'Logged In', 'president', 'President', '097041cded905a0b5e8b0cd36dfa3778'),
(781, '2024-07-13, 21:20:51', 'Logged In', 'superadmin', 'Super Admin', '1951e2208a9215c343b68416a4f714c9'),
(782, '2024-07-13, 21:20:59', 'Logged In', 'admin2', 'Administrator', 'b3c0a9e495f069eb5f1d4492fc5939ad'),
(783, '2024-07-13, 21:24:36', 'Logged In', 'directorforqaie', 'Director for QAIE', 'e1c8c806df85b4401e2e790cbe8ded64'),
(784, '2024-07-13, 22:05:47', 'Logged In', 'requester', 'Requester', 'c8283fec262bcde58aa7c2690991acff'),
(785, '2024-07-13, 22:06:58', 'Logged In', 'departmenthead', 'Department Head', 'e94a86c7c743a453c69349a9920e60bf'),
(786, '2024-07-13, 22:07:30', 'Logged In', 'directorforqaie', 'Director for QAIE', '43891e9c0d612cc830947182167227d4'),
(787, '2024-07-13, 22:23:16', 'Logged In', 'directorforqaie', 'Director for QAIE', '1b2cdcc729d9b530159b784c194b7c31'),
(788, '2024-07-13, 23:37:23', 'Logged In', 'requester', 'Requester', '2cdb3d2ae512ae8fa5367b7d62e13817'),
(789, '2024-07-13, 23:38:32', 'Logged In', 'directorforqaie', 'Director for QAIE', 'c254b217a06e8cc5d087f4ceba50399c'),
(790, '2024-07-13, 23:54:37', 'Logged In', 'admin2', 'Administrator', '9bdfb0f2ed56a417371fb6a611ab1ddf');

-- --------------------------------------------------------

--
-- Table structure for table `y2_auditcalendarevents_logs`
--

CREATE TABLE `y2_auditcalendarevents_logs` (
  `ID` int(200) NOT NULL,
  `Date_and_Time_of_Action` varchar(200) NOT NULL,
  `Action_Made` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `User_Type` varchar(200) NOT NULL,
  `title_I` varchar(200) NOT NULL,
  `color_I` varchar(200) NOT NULL,
  `start_I` varchar(200) NOT NULL,
  `end_I` varchar(200) NOT NULL,
  `UR_Code` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `y2_auditcalendarevents_logs`
--

INSERT INTO `y2_auditcalendarevents_logs` (`ID`, `Date_and_Time_of_Action`, `Action_Made`, `Username`, `User_Type`, `title_I`, `color_I`, `start_I`, `end_I`, `UR_Code`) VALUES
(3, '2024-03-07, 21:23:29', 'Added Audit Calendar Event', 'directorforqaie', 'Director for QAIE', 'Title Sample', '#004bfa', '2024-03-07 00:00:00', '2024-03-08 00:00:00', 'ddb1c9d24b0688128829fe4f20aaf0fc'),
(4, '2024-03-08, 00:08:45', 'Deleted Audit Calendar Event', 'directorforqaie', 'Director for QAIE', 'Title Sample', '#004bfa', 'Thu Mar 07 2024 00:00:00 GMT+0000', 'Fri Mar 08 2024 00:00:00 GMT+0000', 'a8cc2df0945dc9935a92475ab776af4f'),
(5, '2024-04-26, 21:48:17', 'Added Audit Calendar Event', 'directorforqaie', 'Director for QAIE', 'Accreditation Event', '#004bfa', '2024-04-26 00:00:00', '2024-04-27 00:00:00', '8aac2481a081d1d16a06ad1c3750aa01'),
(6, '2024-04-26, 21:48:51', 'Added Audit Calendar Event', 'directorforqaie', 'Director for QAIE', 'Audit Event', '#ffdd00', '2024-04-27 00:00:00', '2024-04-28 00:00:00', '85a933ff963193ee2ed5161facf5b43e'),
(7, '2024-04-26, 21:49:20', 'Added Audit Calendar Event', 'directorforqaie', 'Director for QAIE', 'Holiday', '#ff0d00', '2024-04-28 00:00:00', '2024-04-29 00:00:00', '3e6b2bb545c9d62e52195baff82349f5'),
(8, '2024-04-26, 21:49:29', 'Added Audit Calendar Event', 'directorforqaie', 'Director for QAIE', 'Seminar Event', '#01fe0a', '2024-04-29 00:00:00', '2024-04-30 00:00:00', 'b557971f660dac763ded98c2001469ef'),
(9, '2024-04-28, 22:25:51', 'Deleted Audit Calendar Event', 'directorforqaie', 'Director for QAIE', 'Accreditation Event', '#004bfa', 'Fri Apr 26 2024 07:00:00 GMT+0000', 'Fri Apr 26 2024 10:00:00 GMT+0000', '1c054e4ffab692a044a1ee3082f4d1f6'),
(10, '2024-04-28, 22:25:55', 'Deleted Audit Calendar Event', 'directorforqaie', 'Director for QAIE', 'Audit Event', '#ffdd00', 'Sat Apr 27 2024 08:00:00 GMT+0000', 'Sat Apr 27 2024 11:00:00 GMT+0000', 'd003274670f9c81f135105cbaea7b048'),
(11, '2024-04-28, 22:25:59', 'Deleted Audit Calendar Event', 'directorforqaie', 'Director for QAIE', 'Seminar Event', '#01fe0a', 'Mon Apr 29 2024 09:00:00 GMT+0000', 'Mon Apr 29 2024 12:00:00 GMT+0000', 'b5e20717ac9abd7b304f8d47b5d92f38'),
(12, '2024-04-28, 22:26:03', 'Deleted Audit Calendar Event', 'directorforqaie', 'Director for QAIE', 'Holiday', '#ff0d00', 'Sun Apr 28 2024 00:00:00 GMT+0000', 'Mon Apr 29 2024 00:00:00 GMT+0000', '01f04cfecb42117bfab56087c437e64b');

-- --------------------------------------------------------

--
-- Table structure for table `y2_auditcalendarevents_logs_new`
--

CREATE TABLE `y2_auditcalendarevents_logs_new` (
  `ID` int(200) NOT NULL,
  `Date_and_Time_of_Action` varchar(200) NOT NULL,
  `Action_Made` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `User_Type` varchar(200) NOT NULL,
  `title_II` varchar(200) NOT NULL,
  `color_II` varchar(200) NOT NULL,
  `start_II` varchar(200) NOT NULL,
  `end_II` varchar(200) NOT NULL,
  `UR_Code` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `y3_auditcalendareventtypes_logs`
--

CREATE TABLE `y3_auditcalendareventtypes_logs` (
  `ID` int(200) NOT NULL,
  `Date_and_Time_of_Action` varchar(200) NOT NULL,
  `Action_Made` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `User_Type` varchar(200) NOT NULL,
  `Color_of_Event_Type_I` varchar(200) NOT NULL,
  `Name_of_Event_Type_I` varchar(200) NOT NULL,
  `UR_Code` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `y3_auditcalendareventtypes_logs`
--

INSERT INTO `y3_auditcalendareventtypes_logs` (`ID`, `Date_and_Time_of_Action`, `Action_Made`, `Username`, `User_Type`, `Color_of_Event_Type_I`, `Name_of_Event_Type_I`, `UR_Code`) VALUES
(3, '2024-03-07, 21:24:27', 'Added Audit Calendar Event Type', 'directorforqaie', 'Director for QAIE', '#000000', 'Name of Event Type Sample', 'e2beb10a74ba1baac8733197c395a90c'),
(4, '2024-03-08, 00:08:52', 'Deleted Audit Calendar Event Type', 'directorforqaie', 'Director for QAIE', '#000000', 'Name of Event Type Sample', '1ba0aad6b7004ae2bbbc7322c1504d66');

-- --------------------------------------------------------

--
-- Table structure for table `y3_auditcalendareventtypes_logs_new`
--

CREATE TABLE `y3_auditcalendareventtypes_logs_new` (
  `ID` int(200) NOT NULL,
  `Date_and_Time_of_Action` varchar(200) NOT NULL,
  `Action_Made` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `User_Type` varchar(200) NOT NULL,
  `Color_of_Event_Type_II` varchar(200) NOT NULL,
  `Name_of_Event_Type_II` varchar(200) NOT NULL,
  `UR_Code` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `y4_nea_logs`
--

CREATE TABLE `y4_nea_logs` (
  `ID` int(200) NOT NULL,
  `Date_and_Time_of_Action` varchar(200) NOT NULL,
  `Action_Made` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `User_Type` varchar(200) NOT NULL,
  `Image_I` varchar(200) NOT NULL,
  `Category_I` varchar(200) NOT NULL,
  `Title_I` varchar(200) NOT NULL,
  `Description_I` varchar(5000) NOT NULL,
  `Date_Uploaded_I` varchar(200) NOT NULL,
  `UR_Code` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `y4_nea_logs`
--

INSERT INTO `y4_nea_logs` (`ID`, `Date_and_Time_of_Action`, `Action_Made`, `Username`, `User_Type`, `Image_I`, `Category_I`, `Title_I`, `Description_I`, `Date_Uploaded_I`, `UR_Code`) VALUES
(156, '2024-05-12, 22:05:33', 'Added News/Event/Announcement', 'directorforqaie', 'Director for QAIE', 'f58612308c7fc0e254d4c4cbaf060d94.png', 'News', 'News', 'News', '05/12/2024', '9c38bf6fee1127c65cdd64fcb88db6a5'),
(157, '2024-05-12, 22:05:55', 'Added News/Event/Announcement', 'directorforqaie', 'Director for QAIE', '3807c979cbc5ca3818ffe9e8fe01a588.jpg', 'Event', 'Event', 'Event', '05/12/2024', '4755e55ee6fcf8516ce3fb80d7cb4690'),
(158, '2024-05-12, 22:06:22', 'Added News/Event/Announcement', 'directorforqaie', 'Director for QAIE', '4355d6736d2c14d96cee4e1db7f652f8.jpg', 'Announcement', 'Announcement', 'Announcement', '05/12/2024', '7dcf2e9d9682131d84b5b611a7f525b5');

-- --------------------------------------------------------

--
-- Table structure for table `y4_nea_logs_new`
--

CREATE TABLE `y4_nea_logs_new` (
  `ID` int(200) NOT NULL,
  `Date_and_Time_of_Action` varchar(200) NOT NULL,
  `Action_Made` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `User_Type` varchar(200) NOT NULL,
  `Image_II` varchar(200) NOT NULL,
  `Category_II` varchar(200) NOT NULL,
  `Title_II` varchar(200) NOT NULL,
  `Description_II` varchar(5000) NOT NULL,
  `Date_Uploaded_II` varchar(200) NOT NULL,
  `UR_Code` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `y5_afsforms_logs`
--

CREATE TABLE `y5_afsforms_logs` (
  `ID` int(200) NOT NULL,
  `Date_and_Time_of_Action` varchar(200) NOT NULL,
  `Action_Made` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `User_Type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `y6_dcrforms_logs`
--

CREATE TABLE `y6_dcrforms_logs` (
  `ID` int(200) NOT NULL,
  `Date_and_Time_of_Action` varchar(200) NOT NULL,
  `Action_Made` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `User_Type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `y6_dcrforms_logs`
--

INSERT INTO `y6_dcrforms_logs` (`ID`, `Date_and_Time_of_Action`, `Action_Made`, `Username`, `User_Type`) VALUES
(1, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(5, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(6, '', 'Submitted Document Change Request Form', 'departmenthead', 'Department Head'),
(7, '', 'Submitted Document Change Request Form', 'documentcontroller', 'Document Controller'),
(8, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(9, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(10, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(11, '', 'Submitted Document Change Request Form', 'departmenthead', 'Department Head'),
(12, '', 'Submitted Document Change Request Form', 'documentcontroller', 'Document Controller'),
(13, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(14, '', 'Deleted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(15, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(16, '', 'Submitted Document Change Request Form', 'departmenthead', 'Department Head'),
(17, '', 'Submitted Document Change Request Form', 'documentcontroller', 'Document Controller'),
(18, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(19, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(20, '', 'Submitted Document Change Request Form', 'departmenthead', 'Department Head'),
(21, '', 'Submitted Document Change Request Form', 'documentcontroller', 'Document Controller'),
(22, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(23, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(24, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(25, '', 'Submitted Document Change Request Form', 'departmenthead', 'Department Head'),
(26, '', 'Submitted Document Change Request Form', 'documentcontroller', 'Document Controller'),
(27, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(28, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(29, '', 'Submitted Document Change Request Form', 'departmenthead', 'Department Head'),
(30, '', 'Submitted Document Change Request Form', 'documentcontroller', 'Document Controller'),
(31, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(32, '', 'Deleted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(33, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(34, '', 'Submitted Document Change Request Form', 'departmenthead', 'Department Head'),
(35, '', 'Submitted Document Change Request Form', 'documentcontroller', 'Document Controller'),
(36, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(37, '', 'Deleted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(38, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(39, '', 'Submitted Document Change Request Form', 'departmenthead', 'Department Head'),
(40, '', 'Submitted Document Change Request Form', 'documentcontroller', 'Document Controller'),
(41, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(42, '', 'Deleted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(43, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(44, '', 'Submitted Document Change Request Form', 'departmenthead', 'Department Head'),
(45, '', 'Submitted Document Change Request Form', 'documentcontroller', 'Document Controller'),
(46, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(47, '', 'Deleted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(48, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(49, '', 'Submitted Document Change Request Form', 'departmenthead', 'Department Head'),
(50, '', 'Submitted Document Change Request Form', 'documentcontroller', 'Document Controller'),
(51, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(52, '', 'Deleted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(53, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(54, '', 'Submitted Document Change Request Form', 'departmenthead', 'Department Head'),
(55, '', 'Submitted Document Change Request Form', 'documentcontroller', 'Document Controller'),
(56, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(57, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(58, '', 'Deleted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(59, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(60, '', 'Submitted Document Change Request Form', 'departmenthead', 'Department Head'),
(61, '', 'Submitted Document Change Request Form', 'documentcontroller', 'Document Controller'),
(62, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(63, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(64, '', 'Submitted Document Change Request Form', 'departmenthead', 'Department Head'),
(65, '', 'Submitted Document Change Request Form', 'documentcontroller', 'Document Controller'),
(66, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(67, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(68, '', 'Submitted Document Change Request Form', 'departmenthead', 'Department Head'),
(69, '', 'Submitted Document Change Request Form', 'documentcontroller', 'Document Controller'),
(70, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(71, '', 'Deleted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(72, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(73, '', 'Submitted Document Change Request Form', 'departmenthead', 'Department Head'),
(74, '', 'Submitted Document Change Request Form', 'documentcontroller', 'Document Controller'),
(75, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(76, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(77, '', 'Submitted Document Change Request Form', 'departmenthead', 'Department Head'),
(78, '', 'Submitted Document Change Request Form', 'documentcontroller', 'Document Controller'),
(79, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(80, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(81, '', 'Submitted Document Change Request Form', 'departmenthead', 'Department Head'),
(82, '', 'Submitted Document Change Request Form', 'documentcontroller', 'Document Controller'),
(83, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(84, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(85, '', 'Submitted Document Change Request Form', 'departmenthead', 'Department Head'),
(86, '', 'Submitted Document Change Request Form', 'documentcontroller', 'Document Controller'),
(87, '', 'Submitted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(88, '', 'Deleted Document Change Request Form', 'directorforqaie', 'Director for QAIE'),
(89, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(90, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(91, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(92, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(93, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(94, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(95, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(96, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(97, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(98, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(99, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(100, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(101, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(102, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(103, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(104, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(105, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(106, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(107, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(108, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(109, '', 'Submitted Document Change Request Form', 'requester', 'Requester'),
(110, '', 'Submitted Document Change Request Form', 'requester', 'Requester');

-- --------------------------------------------------------

--
-- Table structure for table `y7_asr_logs`
--

CREATE TABLE `y7_asr_logs` (
  `ID` int(200) NOT NULL,
  `Date_and_Time_of_Action` varchar(200) NOT NULL,
  `Action_Made` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `User_Type` varchar(200) NOT NULL,
  `Department_I` varchar(200) NOT NULL,
  `Office_I` varchar(200) NOT NULL,
  `Date_Uploaded_I` varchar(200) NOT NULL,
  `UR_Code` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `y7_asr_logs`
--

INSERT INTO `y7_asr_logs` (`ID`, `Date_and_Time_of_Action`, `Action_Made`, `Username`, `User_Type`, `Department_I`, `Office_I`, `Date_Uploaded_I`, `UR_Code`) VALUES
(4, '2024-03-07, 21:26:21', 'Added Audit Summary Report', 'directorforqaie', 'Director for QAIE', 'Academics', 'SBCS', '2024-03-07, 21:26:21', 'c6b8bc870607fc12ebc413d6a4887f1f'),
(5, '2024-03-08, 00:09:09', 'Deleted Audit Summary Report', 'directorforqaie', 'Director for QAIE', 'Academics', 'SBCS', '2024-03-07, 21:26:21', '632d7ea3a517676f9a3b17598ec3d09c'),
(6, '2024-04-26, 20:38:58', 'Deleted Audit Summary Report', 'directorforqaie', 'Director for QAIE', 'Finance', 'BDO', '2022-06-16, 06:00:00', 'ca4abf3235015c5acd35cede63f45bb0'),
(7, '2024-04-26, 20:39:31', 'Added Audit Summary Report', 'directorforqaie', 'Director for QAIE', 'Academics', 'SBCS', '2024-04-26, 20:39:31', '9a7786001176f211814bffa8183a1e68'),
(8, '2024-07-13, 21:32:46', 'Deleted Audit Summary Report', 'directorforqaie', 'Director for QAIE', 'Academics', 'SBCS', '2024-04-26, 20:39:31', '59ba4e07d577ede0877077ca94d8e4d2'),
(9, '2024-07-13, 21:34:11', 'Added Audit Summary Report', 'directorforqaie', 'Director for QAIE', 'Finance', 'BDO', '2024-07-13, 21:34:11', '4ba3bd38f0df01ceb76816a9a3e0ff58');

-- --------------------------------------------------------

--
-- Table structure for table `y8_emanuals_logs`
--

CREATE TABLE `y8_emanuals_logs` (
  `ID` int(200) NOT NULL,
  `Date_and_Time_of_Action` varchar(200) NOT NULL,
  `Action_Made` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `User_Type` varchar(200) NOT NULL,
  `File_Title_I` varchar(200) NOT NULL,
  `Date_Uploaded_I` varchar(200) NOT NULL,
  `Emanual_Type_I` varchar(200) NOT NULL,
  `UR_Code` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `y8_emanuals_logs`
--

INSERT INTO `y8_emanuals_logs` (`ID`, `Date_and_Time_of_Action`, `Action_Made`, `Username`, `User_Type`, `File_Title_I`, `Date_Uploaded_I`, `Emanual_Type_I`, `UR_Code`) VALUES
(5, '2024-04-05, 18:56:38', 'Added E-Manual', 'directorforqaie', 'Director for QAIE', 'Data Privacy Manual (DPM)', '2024-04-05, 18:56', 'Master Copy Version', '55cc70f68fde43c9ad82b6dede56d3ea'),
(6, '2024-04-05, 21:35:56', 'Added E-Manual', 'directorforqaie', 'Director for QAIE', 'Test', '2024-04-05, 21:35', 'Ryan Version', '9a7d89ffb63d85eea31ccdfa7981ab66'),
(7, '2024-04-05, 23:43:25', 'Deleted E-Manual', 'directorforqaie', 'Director for QAIE', 'Test', '2024-04-05, 21:35', '', '0cd7376efcfe8c17279bb1218d5e705c'),
(8, '2024-04-08, 14:38:13', 'Added E-Manual', 'directorforqaie', 'Director for QAIE', 'Sample', '2024-04-08, 14:38', 'QD', '521654099040a779ea630077b687bfbd'),
(9, '2024-04-08, 14:39:58', 'Deleted E-Manual', 'directorforqaie', 'Director for QAIE', 'Sample', '2024-04-08, 14:38', '', '90352e40035eebedae114e72f0fe7549'),
(10, '2024-04-08, 14:45:54', 'Added E-Manual', 'qaiemgmtofficer', 'QAIE Management Officer', 'Sample', '2024-04-08, 14:45', '', 'c1d41c55cb3a3e45f2771db5531face2'),
(11, '2024-04-08, 14:46:18', 'Deleted E-Manual', 'qaiemgmtofficer', 'QAIE Management Officer', 'Sample', '2024-04-08, 14:45', '', '28bcdd14db0613998df2a26a60b74025'),
(12, '2024-04-08, 14:46:28', 'Added E-Manual', 'qaiemgmtofficer', 'QAIE Management Officer', 'Sample', '2024-04-08, 14:46', '', 'd088d046fa0f1324f3d5d78c9a37898f'),
(13, '2024-04-08, 14:51:42', 'Deleted E-Manual', 'qaiemgmtofficer', 'QAIE Management Officer', 'Sample', '2024-04-08, 14:46', '', 'e83da46508d4610912447c45b038f0ca'),
(14, '2024-04-08, 14:55:00', 'Deleted E-Manual', 'qaiemgmtofficer', 'QAIE Management Officer', 'Sample', '2024-04-08, 14:52', '', 'b4ee2c2c2ac43aedf0163cc26782a9db'),
(15, '2024-04-08, 15:03:11', 'Added E-Manual', 'documentcontroller', 'Document Controller', 'Sample', '2024-04-08, 15:03', 'DC', '866fa5944d9843551ba36853ec95dba8'),
(16, '2024-04-08, 15:05:35', 'Deleted E-Manual', 'documentcontroller', 'Document Controller', 'Sample', '2024-04-08, 15:03', '', 'e17e7d0016a03d44498a6c87665d3e32'),
(17, '2024-04-08, 19:20:45', 'Added E-Manual', 'directorforqaie', 'Director for QAIE', 'A QAIE Director E Manual 1', '2024-04-08, 19:20', 'QD', 'df6817aa718a0605956db76090964a88'),
(18, '2024-04-08, 19:21:41', 'Added E-Manual', 'directorforqaie', 'Director for QAIE', 'A QAIE Director E Manual 2', '2024-04-08, 19:21', 'QD', 'c49b51fe21a7a39c47d4cdf712111f84'),
(19, '2024-04-08, 19:23:18', 'Added E-Manual', 'directorforqaie', 'Director for QAIE', 'A QAIE Director E Manual 3', '2024-04-08, 19:23', 'QD', 'b2f199f22896c344733af103c4c80006'),
(20, '2024-04-08, 19:23:56', 'Added E-Manual', 'directorforqaie', 'Director for QAIE', 'QAIE Director E Manual 1', '2024-04-08, 19:23', 'QD', 'a32c5025cc669754f95ce9cb1c9cf3f2'),
(21, '2024-04-08, 19:24:54', 'Added E-Manual', 'directorforqaie', 'Director for QAIE', 'QAIE Director E Manual 2', '2024-04-08, 19:24', 'QD', 'eccde9fd3b7aef581354618291b081c7'),
(22, '2024-04-08, 19:25:40', 'Added E-Manual', 'directorforqaie', 'Director for QAIE', 'QAIE Director E Manual 3', '2024-04-08, 19:25', 'QD', '77ac360cb9a3c75a117a0e97935ad674'),
(23, '2024-04-08, 19:26:21', 'Added E-Manual', 'directorforqaie', 'Director for QAIE', 'Z QAIE Director E Manual 1', '2024-04-08, 19:26', 'QD', 'c850de992828fbf7054cb60fcf35f785'),
(24, '2024-04-08, 19:27:04', 'Added E-Manual', 'directorforqaie', 'Director for QAIE', 'Z QAIE Director E Manual 2', '2024-04-08, 19:27', 'QD', '371e40d7b3f3fa2e9bd9a8277708ef01'),
(25, '2024-04-08, 19:27:54', 'Added E-Manual', 'directorforqaie', 'Director for QAIE', 'Z QAIE Director E Manual 3', '2024-04-08, 19:27', 'QD', 'b1f7bb4608f4d35c71b95667aa01d1cd'),
(26, '2024-04-08, 20:41:51', 'Added E-Manual', 'documentcontroller', 'Document Controller', 'A Document Controller E Manual 1', '2024-04-08, 20:41', 'DC', '8b0ec9d2cfccc7b2a72a38d55d914e24'),
(27, '2024-04-08, 20:42:29', 'Added E-Manual', 'documentcontroller', 'Document Controller', 'A Document Controller E Manual 2', '2024-04-08, 20:42', 'DC', 'ae1e7c1a805e0f01312ebc779aaff68a'),
(28, '2024-04-08, 20:43:51', 'Added E-Manual', 'documentcontroller', 'Document Controller', 'A Document Controller E Manual 3', '2024-04-08, 20:43', 'DC', 'f50b407e436dd44907c978920070db45'),
(29, '2024-04-08, 20:44:27', 'Added E-Manual', 'documentcontroller', 'Document Controller', 'Document Controller E Manual 1', '2024-04-08, 20:44', 'DC', '2414af53fe41ef095ecd39f59c8a30e9'),
(30, '2024-04-08, 20:45:03', 'Added E-Manual', 'documentcontroller', 'Document Controller', 'Document Controller E Manual 2', '2024-04-08, 20:45', 'DC', 'f459dfd7e9b4e55b60c05c04d52e0a38'),
(31, '2024-04-08, 20:45:45', 'Added E-Manual', 'documentcontroller', 'Document Controller', 'Document Controller E Manual 3', '2024-04-08, 20:45', 'DC', '0b87bcdd8cda5949a81ba0b452b186a2'),
(32, '2024-04-08, 20:46:36', 'Added E-Manual', 'documentcontroller', 'Document Controller', 'Z Document Controller E Manual 1', '2024-04-08, 20:46', 'DC', 'fc78bd6c2ce42c25a49f6e6da36edda8'),
(33, '2024-04-08, 20:47:54', 'Added E-Manual', 'documentcontroller', 'Document Controller', 'Z Document Controller E Manual 2', '2024-04-08, 20:47', 'DC', 'eba13591cc7112f35b8db259bf9147db'),
(34, '2024-04-08, 20:48:36', 'Added E-Manual', 'documentcontroller', 'Document Controller', 'Z Document Controller E Manual 3', '2024-04-08, 20:48', 'DC', 'e82dc9a59e1866fc92071251370a1560'),
(35, '2024-07-13, 21:37:09', 'Deleted E-Manual', 'directorforqaie', 'Director for QAIE', 'Academic Affairs Manual (AAM)', '2022-09-06, 22:10', '', '49f48efd5e247018f06c9f621e6d9b33'),
(36, '2024-07-13, 21:37:12', 'Deleted E-Manual', 'directorforqaie', 'Director for QAIE', 'Data Privacy Manual (DPM)', '2024-04-05, 18:56', '', '0a9180f690888592e0b15104759e1ed9'),
(37, '2024-07-13, 21:37:54', 'Added E-Manual', 'directorforqaie', 'Director for QAIE', 'Academic Affairs Manual (AAM)', '2024-07-13, 21:37', 'Uncontrolled Copy Version', '58d47e89843fbb7e2b9d38f442ecc023'),
(38, '2024-07-13, 21:38:23', 'Added E-Manual', 'directorforqaie', 'Director for QAIE', 'Administrative Affairs Manual (ADM)', '2024-07-13, 21:38', 'Uncontrolled Copy Version', 'bc10a85126f0eadec542c1f75943dcdf'),
(39, '2024-07-13, 21:38:46', 'Added E-Manual', 'directorforqaie', 'Director for QAIE', 'Data Privacy Manual (DPM)', '2024-07-13, 21:38', 'Uncontrolled Copy Version', '7d25501ce7288da85f2b563b9390959c'),
(40, '2024-07-13, 21:39:05', 'Added E-Manual', 'directorforqaie', 'Director for QAIE', 'Financial Affairs Manual (FAM)', '2024-07-13, 21:39', 'Uncontrolled Copy Version', '79666cce1a01a3060b6a5dce6d43a3be'),
(41, '2024-07-13, 21:39:34', 'Added E-Manual', 'directorforqaie', 'Director for QAIE', 'Job Description Manual (JDM)', '2024-07-13, 21:39', 'Uncontrolled Copy Version', '91ac44aa3aaf2f8971a29aa2a6d71ef4'),
(42, '2024-07-13, 21:39:58', 'Added E-Manual', 'directorforqaie', 'Director for QAIE', 'Quality System Manual (QSM)', '2024-07-13, 21:39', 'Uncontrolled Copy Version', 'a17e6695464e41a6221613526c66d340');

-- --------------------------------------------------------

--
-- Table structure for table `z_department`
--

CREATE TABLE `z_department` (
  `ID_Department` int(200) NOT NULL,
  `Department_Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `z_department`
--

INSERT INTO `z_department` (`ID_Department`, `Department_Name`) VALUES
(1, 'ICT'),
(3, 'Academics'),
(4, 'Administrative'),
(5, 'Med'),
(6, 'HRM'),
(7, 'PACUCOA');

-- --------------------------------------------------------

--
-- Table structure for table `z_office`
--

CREATE TABLE `z_office` (
  `ID_Office` int(200) NOT NULL,
  `Office_Name` varchar(200) NOT NULL,
  `Department_Category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `z_office`
--

INSERT INTO `z_office` (`ID_Office`, `Office_Name`, `Department_Category`) VALUES
(3, 'BEd', 'Academics'),
(4, 'SASE', 'Academics'),
(5, 'SCMCS', 'Academics'),
(6, 'SHS', 'Academics'),
(8, 'SIHTM', 'Academics'),
(10, 'CorpComm', 'Administrative'),
(23, 'ISPAO', 'DSAS'),
(29, 'PMO', 'Finance'),
(30, 'Purchasing', 'Finance'),
(32, 'All', 'All'),
(33, 'Nursing', 'Med'),
(34, 'VA', 'HRM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_users`
--
ALTER TABLE `all_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `auditee_afsform`
--
ALTER TABLE `auditee_afsform`
  ADD PRIMARY KEY (`AFSForm_ID`);

--
-- Indexes for table `auditee_afsform_2_desc`
--
ALTER TABLE `auditee_afsform_2_desc`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `auditee_afsform_desc`
--
ALTER TABLE `auditee_afsform_desc`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `emanual_types`
--
ALTER TABLE `emanual_types`
  ADD PRIMARY KEY (`ID_Emanual_Type`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`ID_Event_Type`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folder_access`
--
ALTER TABLE `folder_access`
  ADD PRIMARY KEY (`folder_id`,`ID_Office`),
  ADD KEY `ID_Office` (`ID_Office`);

--
-- Indexes for table `folder_offices`
--
ALTER TABLE `folder_offices`
  ADD PRIMARY KEY (`folder_id`,`ID_Office`),
  ADD KEY `ID_Office` (`ID_Office`);

--
-- Indexes for table `home_nea_datatable`
--
ALTER TABLE `home_nea_datatable`
  ADD PRIMARY KEY (`ID_NEA`);

--
-- Indexes for table `qaiedirector_dcrform`
--
ALTER TABLE `qaiedirector_dcrform`
  ADD PRIMARY KEY (`Year_Generated`,`DCRForm_ID`);

--
-- Indexes for table `qaiedirector_dcrform_desc`
--
ALTER TABLE `qaiedirector_dcrform_desc`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id_storage`);

--
-- Indexes for table `storage_asr`
--
ALTER TABLE `storage_asr`
  ADD PRIMARY KEY (`File_ID`);

--
-- Indexes for table `storage_documentations`
--
ALTER TABLE `storage_documentations`
  ADD PRIMARY KEY (`File_ID`);

--
-- Indexes for table `storage_emanuals`
--
ALTER TABLE `storage_emanuals`
  ADD PRIMARY KEY (`File_ID`),
  ADD KEY `folder_id` (`folder_id`);

--
-- Indexes for table `whoweare`
--
ALTER TABLE `whoweare`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `whoweare_new`
--
ALTER TABLE `whoweare_new`
  ADD PRIMARY KEY (`ID_WhoWeAre`);

--
-- Indexes for table `x_auditors`
--
ALTER TABLE `x_auditors`
  ADD PRIMARY KEY (`ID_Auditor`);

--
-- Indexes for table `y1_user_logs`
--
ALTER TABLE `y1_user_logs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `y2_auditcalendarevents_logs`
--
ALTER TABLE `y2_auditcalendarevents_logs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `y2_auditcalendarevents_logs_new`
--
ALTER TABLE `y2_auditcalendarevents_logs_new`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `y3_auditcalendareventtypes_logs`
--
ALTER TABLE `y3_auditcalendareventtypes_logs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `y3_auditcalendareventtypes_logs_new`
--
ALTER TABLE `y3_auditcalendareventtypes_logs_new`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `y4_nea_logs`
--
ALTER TABLE `y4_nea_logs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `y4_nea_logs_new`
--
ALTER TABLE `y4_nea_logs_new`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `y5_afsforms_logs`
--
ALTER TABLE `y5_afsforms_logs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `y6_dcrforms_logs`
--
ALTER TABLE `y6_dcrforms_logs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `y7_asr_logs`
--
ALTER TABLE `y7_asr_logs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `y8_emanuals_logs`
--
ALTER TABLE `y8_emanuals_logs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `z_department`
--
ALTER TABLE `z_department`
  ADD PRIMARY KEY (`ID_Department`);

--
-- Indexes for table `z_office`
--
ALTER TABLE `z_office`
  ADD PRIMARY KEY (`ID_Office`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_users`
--
ALTER TABLE `all_users`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `auditee_afsform`
--
ALTER TABLE `auditee_afsform`
  MODIFY `AFSForm_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `ID_Event_Type` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `home_nea_datatable`
--
ALTER TABLE `home_nea_datatable`
  MODIFY `ID_NEA` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `qaiedirector_dcrform`
--
ALTER TABLE `qaiedirector_dcrform`
  MODIFY `DCRForm_ID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `id_storage` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `storage_documentations`
--
ALTER TABLE `storage_documentations`
  MODIFY `File_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `y6_dcrforms_logs`
--
ALTER TABLE `y6_dcrforms_logs`
  MODIFY `ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `z_department`
--
ALTER TABLE `z_department`
  MODIFY `ID_Department` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `z_office`
--
ALTER TABLE `z_office`
  MODIFY `ID_Office` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;


CREATE TABLE
  `user_folder_access` (
    `user_id` int(11) DEFAULT NULL,
    `folder_id` int(11) DEFAULT NULL
  );

ALTER TABLE `folders`
	ADD COLUMN base_folder_id int(200);

ALTER TABLE `folders`
	ADD COLUMN is_archived boolean default false;

COMMIT;




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
