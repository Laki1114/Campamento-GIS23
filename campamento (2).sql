-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 05:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campamento`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminId` int(11) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Gender` text NOT NULL,
  `PhoneNo` varchar(15) NOT NULL,
  `NICNo` varchar(15) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminId`, `FirstName`, `LastName`, `Gender`, `PhoneNo`, `NICNo`, `Email`, `Password`, `Status`) VALUES
(1, 'Ashen', 'Lakshan', 'Male', '0776695842', '522614366343', 'bcd@gmail.com', 'Bcd@1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `images` text DEFAULT NULL,
  `status` enum('pending','accepted','rejected') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `description`, `images`, `status`, `created_at`) VALUES
(10, 'Site offer ', 'we wr ar rewa ', 'uploads/📺Farzi📺.png', 'rejected', '2024-04-22 10:28:41'),
(19, 'sdfhgjmikhk', 'poiyrin hdjfh kdfks', 'uploads/2.png', 'pending', '2024-04-25 15:06:03'),
(20, 'wertyuu', 'mkl gjkd jhr mbf ', 'uploads/DSC_0403.jpg', 'rejected', '2024-04-25 15:07:02'),
(21, 'wertyuu', 'mkl gjkd jhr mbf ', 'uploads/DSC_0403.jpg', 'rejected', '2024-04-25 15:07:26'),
(22, 'kolm', 'kolam blannepa ane', 'uploads/0701633359 .png,uploads/White Modern Online Yoga Class Sale Instagram Post (2).png,uploads/White Modern Online Yoga Class Sale Instagram Post (1).png', 'pending', '2024-04-25 15:10:02'),
(23, 'kolm', 'kolam blannepa ane', 'uploads/0701633359 .png,uploads/White Modern Online Yoga Class Sale Instagram Post (2).png,uploads/White Modern Online Yoga Class Sale Instagram Post (1).png', 'pending', '2024-04-25 15:10:16'),
(24, 'fr', 'fethy', 'uploads/2.png,uploads/Untitled.jpeg,uploads/White Green Illustrated Eat Bumper Sticker.png,uploads/5 STA HOTEL.png', 'rejected', '2024-04-25 15:14:25'),
(25, 'kolm', '50 % discounts', 'uploads/0701633359 .png,uploads/White Modern Online Yoga Class Sale Instagram Post (2).png,uploads/White Modern Online Yoga Class Sale Instagram Post (1).png', 'accepted', '2024-04-25 15:14:31'),
(26, 'wertyuu', 'mkl gjkd jhr mbf ', 'uploads/DSC_0403.jpg', 'rejected', '2024-04-25 15:14:40'),
(28, 'hi', 'helo', 'uploads/📺Farzi📺.png', 'accepted', '2024-04-25 15:17:38'),
(29, 'sadkha supplier 1', 'sdasfsaf', 'uploads/📺Farzi📺.png', 'rejected', '2024-04-25 15:18:37'),
(30, 'Club Site Offers', 'Save on your holidays with The Camping and Caravanning Club. Discover new places, plan the break you really need and spend quality time together on our network of Club Sites.\r\n\r\nWhether you\'re wanting to stay on a grass pitch in the summer months or escape for a mid-week break, you\'re guaranteed to find a Club Site offer that suits all of your needs.', 'uploads/images (2).jpeg', 'pending', '2024-04-26 02:47:09'),
(31, 'Midweek Offer', 'Take advantage of our great mid-week deal, where members and non-members can enjoy a 25% discount on 48 Club Sites throughout 2024.', 'uploads/images.jpeg', 'accepted', '2024-04-26 02:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blogID` int(11) NOT NULL,
  `shortTitle` varchar(20) NOT NULL,
  `postDate` date NOT NULL,
  `subjectShort` text NOT NULL,
  `LongDescription1` text NOT NULL,
  `Image1` varchar(255) DEFAULT NULL,
  `Image2` varchar(255) DEFAULT NULL,
  `Image3` varchar(255) DEFAULT NULL,
  `Image4` varchar(255) DEFAULT NULL,
  `Image5` varchar(255) DEFAULT NULL,
  `Image6` varchar(255) DEFAULT NULL,
  `LongDescription2` text DEFAULT NULL,
  `LongDescription3` text DEFAULT NULL,
  `LongDescription4` text DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blogID`, `shortTitle`, `postDate`, `subjectShort`, `LongDescription1`, `Image1`, `Image2`, `Image3`, `Image4`, `Image5`, `Image6`, `LongDescription2`, `LongDescription3`, `LongDescription4`, `cat_id`, `userid`) VALUES
(18, 'Ella ', '2023-10-25', 'Ella Fitzgerald, acclaimed as the \\\"First Lady of Song,\\\" revolutionized jazz with her incomparable voice, pioneering scat singing, and enduring influence on music.', 'Ella Fitzgerald, often referred to as the \\\"First Lady of Song\\\" or the \\\"Queen of Jazz,\\\" was a groundbreaking American jazz vocalist whose influence reshaped the landscape of music in the 20th century. Born in Newport News, Virginia, in 1917, Ella faced a challenging childhood marked by poverty and instability. However, her natural talent and passion for singing would soon propel her onto the world stage.', '662a2c7bdbcb2_1.jpg', '662a2c7bdbf34_2.jpg', '662a2c7bdc081_3.jpg', '662a2c7bdc1ae_4.jpg', NULL, NULL, 'Ella\\\'s career began to soar in the 1930s when she won an amateur night contest at the Apollo Theater in Harlem. This victory marked the beginning of her journey to stardom, as she caught the attention of bandleader Chick Webb, who became her mentor and collaborator. Together, they recorded a series of hit songs, including \\\"A-Tisket, A-Tasket,\\\" which catapulted Ella to fame and established her as one of the era\\\'s most promising vocalists.', 'Throughout her career, Ella\\\'s distinctive voice, characterized by its pure tone, impeccable phrasing, and impressive vocal range, captivated audiences worldwide. Her mastery of scat singing, a vocal improvisation technique, further solidified her reputation as one of jazz\\\'s preeminent artists. With her velvety smooth vocals, Ella effortlessly traversed genres, from swing and bebop to ballads and blues, leaving an indelible mark on each style she touched.', 'Beyond her musical achievements, Ella Fitzgerald\\\'s legacy endures as a trailblazer and cultural icon. She shattered racial barriers in the music industry, becoming the first African American woman to win a Grammy Award. Throughout her six-decade career, she recorded over 200 albums, collaborated with countless legendary musicians, and left an enduring imprint on the world of music, earning her a place among the greatest vocalists of all time. Ella\\\'s timeless recordings and unparalleled artistry continue to inspire generations of singers and musicians, ensuring that her legacy will live on for years to come.', 1, 0),
(20, 'NilaVeli Beach', '2024-04-10', 'Nila Veli Beach\\\'s glamping sites provide a harmonious blend of luxury and nature, offering guests an unforgettable seaside retreat along Sri Lanka\\\'s picturesque coastline.', 'Nila Veli Beach offers a unique glamping experience along its stunning coastline, where travelers can immerse themselves in the beauty of nature while enjoying the comforts of luxury accommodations. These glamping sites blend seamlessly into the surrounding environment, providing an intimate and exclusive retreat for guests seeking a memorable beachside getaway.', '662ac92e88e5d_nila1.jpeg', '662ac92e890e6_nila2.jpeg', NULL, NULL, NULL, NULL, 'Each glamping tent is thoughtfully designed to offer a harmonious blend of rustic charm and modern amenities. From plush bedding to private outdoor lounging areas, every detail is curated to ensure a comfortable and immersive experience. As guests step outside their tents, they are greeted by panoramic views of the Indian Ocean, with the sound of gentle waves serving as a soothing backdrop to their stay.', 'The allure of Nila Veli Beach\\\'s glamping sites extends beyond their luxurious accommodations, offering a host of activities to cater to every interest. Adventurous travelers can partake in water sports such as snorkeling, kayaking, and paddleboarding, exploring the vibrant underwater world just steps from their tent. Those seeking relaxation can unwind on pristine stretches of sand, basking in the warm tropical sun or indulging in rejuvenating spa treatments offered onsite.', 'As the day comes to a close, guests gather around bonfires under the starlit sky, sharing stories and forging connections amidst the beauty of the natural surroundings. With personalized service and unparalleled attention to detail, Nila Veli Beach\\\'s glamping sites offer an unforgettable escape where luxury meets adventure on the shores of Sri Lanka\\\'s eastern coast.\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n', 2, 0),
(23, 'Sigiriya', '2023-12-18', 'Sigiriya, an awe-inspiring ancient rock fortress nestled amidst the lush landscapes of Sri Lanka, enchants visitors with its remarkable frescoes and unparalleled panoramic vistas.', 'Sigiriya, also known as Lion Rock, is an iconic UNESCO World Heritage Site nestled in the heart of Sri Lanka\\\'s Cultural Triangle. Rising dramatically from the surrounding plains, this ancient rock fortress boasts a rich history dating back over 1,500 years, making it a must-visit destination for history buffs and adventurers alike.', '662acdbf53db3_sigi1.jpeg', '662acdbf53ff3_sigi2.jpeg', '662acdbf5424a_sigi3.jpeg', '662acdbf54372_sigi4.jpeg', '662acdbf544b3_sigi5.jpeg', '662acdbf5456c_sigi6.jpeg', 'At the summit of Sigiriya, visitors are greeted by the remnants of an ancient palace complex, once the royal residence of King Kasyapa. The site\\\'s most distinctive feature is the colossal lion\\\'s paw-shaped rock formation that guards the entrance to the palace, giving rise to its nickname, Lion Rock. The ascent to the top involves traversing steep staircases and narrow pathways, but the breathtaking panoramic views of the surrounding landscape make the journey well worth it.', 'As visitors ascend the rock fortress, they encounter a series of remarkable frescoes adorning the sheer rock face. These ancient paintings, known as the Sigiriya Frescoes, depict celestial maidens in vibrant colors and intricate detail, offering a glimpse into the artistic mastery of the ancient Sri Lankan civilization. The frescoes, along with the site\\\'s impressive water gardens and architectural marvels, highlight Sigiriya\\\'s significance as a center of art and culture in ancient times.', 'Beyond its historical and cultural significance, Sigiriya is also renowned for its natural beauty and biodiversity. Surrounding the rock fortress is a lush landscape dotted with verdant forests, serene lakes, and diverse wildlife. Visitors can explore the tranquil surroundings on guided nature walks or enjoy birdwatching amidst the canopy of trees, immersing themselves in the natural splendor of this UNESCO-listed site. Whether marveling at ancient frescoes, soaking in panoramic views, or discovering the wonders of nature, a visit to Sigiriya promises an unforgettable journey through Sri Lanka\\\'s storied past and breathtaking landscapes.\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n', 3, 0),
(24, 'BigGame Wilpattu', '2023-11-15', 'Wilpattu National Park in Sri Lanka offers thrilling safari experiences, allowing visitors to observe big game species such as leopards, sloth bears, and elephants in their natural habitat.', 'Wilpattu National Park, known as the \\\"Land of Lakes,\\\" is the largest national park in Sri Lanka and a haven for wildlife enthusiasts seeking an authentic safari experience. Situated in the northwest coast of the island, this sprawling wilderness is famed for its diverse ecosystem and abundant population of big game species.', '662ace5e44be1_wilpattu1.jpeg', '662ace5e44d00_wilpattu2.jpeg', '662ace5e44def_wilpattu3.jpeg', NULL, NULL, NULL, 'The park\\\'s expansive terrain encompasses dense forests, scrublands, and shimmering lakes, providing a varied habitat for a wide array of wildlife. Among the park\\\'s most sought-after residents are the majestic Sri Lankan leopard, elusive sloth bear, and the iconic Asian elephant. Wilpattu\\\'s remote location and vast expanse offer visitors a chance to spot these magnificent creatures in their natural habitat, making it a prime destination for wildlife photography and observation.', 'Exploring Wilpattu National Park is a thrilling adventure, with safari drives offering visitors the opportunity to traverse rugged trails and encounter wildlife up close. Guided by experienced naturalists, visitors can embark on early morning or evening safaris, when animals are most active, to maximize their chances of sightings. Along the way, visitors may also catch glimpses of crocodiles basking in the sun, vibrant bird species flitting through the trees, and majestic deer grazing on the grasslands.', 'In addition to its impressive wildlife, Wilpattu is steeped in history and cultural significance, with ancient ruins scattered throughout the park. The park\\\'s name, which translates to \\\"Land of Lakes\\\" in Sinhala, is a nod to the numerous natural water bodies that dot its landscape. These serene lakes not only provide vital water sources for wildlife but also serve as picturesque settings for scenic sunset safaris, offering visitors a chance to witness the park\\\'s beauty in the golden light of dusk.', 1, 0),
(25, 'Adams Peak', '2024-04-01', 'Adam\\\'s Peak, revered for its spiritual significance and stunning sunrise vistas, beckons pilgrims and adventurers alike to undertake its legendary ascent in the heart of Sri Lanka\\\'s central highlands.', 'Adam\\\'s Peak, known locally as Sri Pada, is an iconic mountain located in the central highlands of Sri Lanka, revered by multiple religions for its spiritual significance and breathtaking natural beauty. Rising to a height of 2,243 meters (7,359 feet), this majestic peak is renowned for its distinctive conical shape and the \\\"Sri Pada\\\" or \\\"Sacred Footprint\\\" believed by Buddhists to be the imprint of Lord Buddha, by Hindus to be that of Lord Shiva, and by Muslims and Christians to be that of Adam.', '662acfee6c70e_adam3.jpeg', '662acfee6c95a_adam1.jpeg', '662acfee6cb2a_adam2.jpeg', '662acfee6ccfc_adam4.jpeg', NULL, NULL, 'Each year, thousands of pilgrims and tourists undertake the arduous climb to the summit of Adam\\\'s Peak, a journey steeped in tradition and religious fervor. The pilgrimage season typically begins in December and continues until the Vesak festival in May, with devotees ascending the mountain in the early hours of the morning to witness the spectacular sunrise from the summit. Along the pilgrimage route, visitors encounter a series of stone steps, shrines, and rest stops, reflecting the cultural and religious diversity of Sri Lanka.', 'As pilgrims ascend Adam\\\'s Peak, they are not only embarking on a physical journey but also a spiritual one, seeking blessings, enlightenment, and a sense of inner peace. The atmosphere on the mountain is imbued with a sense of reverence and camaraderie, as people from all walks of life come together to undertake this sacred pilgrimage. At the summit, pilgrims are rewarded with panoramic views of the surrounding landscape, as well as the opportunity to pay homage to the sacred footprint and offer prayers at the mountain\\\'s temple.', 'Beyond its religious significance, Adam\\\'s Peak also holds allure for nature enthusiasts and adventure seekers, offering opportunities for hiking, birdwatching, and exploring the pristine wilderness of the surrounding Peak Wilderness Sanctuary. Whether undertaken as a pilgrimage or a recreational adventure, a journey to the summit of Adam\\\'s Peak is an unforgettable experience that leaves a lasting impression on all who make the ascent.', 3, 0),
(21, 'Uva glamping sites', '2024-04-16', 'Uva Province\\\'s glamping sites in Sri Lanka offer a luxurious and eco-conscious retreat amidst the stunning tea plantations and rolling hills, promising an unforgettable fusion of comfort and natural beauty.', 'Uva Province in Sri Lanka is home to some of the most breathtaking landscapes in the country, and its glamping sites offer a unique opportunity to immerse oneself in this natural splendor. Nestled amidst lush tea plantations and rolling hills, Uva\\\'s glamping sites provide a luxurious yet eco-friendly retreat for travelers seeking a memorable escape.', '662aca16bc9b5_uva1.jpeg', '662aca16bca9e_uva2.jpeg', '662aca16bcdd5_uva3.jpeg', '662aca16bcfa0_uva4.jpeg', '662aca16bd0c7_uva5.jpeg', '662aca16bd26e_uva6.jpeg', 'Each glamping tent in Uva is carefully crafted to harmonize with its surroundings, allowing guests to experience the beauty of nature without sacrificing comfort. From spacious interiors adorned with local textiles to private outdoor decks offering panoramic views of the verdant countryside, every aspect is designed to enhance the guest experience.', 'Beyond their lavish accommodations, Uva\\\'s glamping sites offer a plethora of activities to suit every taste. Guests can embark on guided hikes through tea estates, discovering the intricacies of tea production while taking in breathtaking vistas of the surrounding landscape. For adventure enthusiasts, opportunities for mountain biking, birdwatching, and even waterfall rappelling abound, providing an adrenaline-filled escape amidst nature\\\'s wonders.', 'As the sun sets over the horizon, guests gather around crackling campfires to share stories and savor gourmet cuisine prepared with locally sourced ingredients. With personalized service and a commitment to sustainability, Uva\\\'s glamping sites offer an unforgettable retreat where luxury and nature converge in perfect harmony, making it an ideal destination for those seeking an unparalleled experience in the heart of Sri Lanka\\\'s hill country.', 2, 0),
(22, 'Hikkaduwa corals', '2024-04-23', 'Hikkaduwa\\\'s vibrant coral reefs showcase a kaleidoscope of marine life, making it a captivating destination for snorkeling and diving enthusiasts.', 'Hikkaduwa Coral Sanctuary stands as a vibrant underwater paradise along the southwestern coast of Sri Lanka, renowned for its breathtaking coral reefs and diverse marine life. Stretching over a vast area just off the shores of Hikkaduwa Beach, this sanctuary offers a mesmerizing glimpse into the underwater world, making it a haven for snorkelers and scuba divers alike.', '662acd1b7e559_hikka1.jpeg', '662acd1b7e859_hikka2.jpeg', '662acd1b7ea4e_hikka3.jpeg', '662acd1b7ec9f_hikka4.jpeg', '662acd1b7ef04_hika5.jpeg', '662acd1b7f061_hikka6.jpeg', 'The coral reefs of Hikkaduwa are teeming with an array of colorful coral formations, ranging from intricate brain corals to delicate sea fans. These reefs provide essential habitats for a multitude of marine species, including tropical fish, sea turtles, and even reef sharks. Visitors can witness the kaleidoscope of marine life as they explore the crystal-clear waters, making for an unforgettable underwater adventure.', 'Guided snorkeling and diving excursions are readily available for those eager to explore the wonders of Hikkaduwa Coral Sanctuary. Knowledgeable guides lead visitors through the reefs, pointing out various species and sharing insights into the fragile ecosystem. With its shallow depths and calm currents, the sanctuary is accessible to snorkelers of all skill levels, making it an ideal destination for families and enthusiasts alike.', 'Beyond its natural beauty, Hikkaduwa Coral Sanctuary plays a crucial role in conservation efforts aimed at protecting Sri Lanka\\\'s marine biodiversity. Responsible tourism practices, such as reef-friendly sunscreen use and non-intrusive snorkeling techniques, are encouraged to minimize human impact on the delicate ecosystem. By fostering a deeper appreciation for the ocean\\\'s wonders, Hikkaduwa Coral Sanctuary serves as a testament to the importance of preserving our marine environments for future generations to enjoy.\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n', 3, 0),
(15, 'Temple of Tooth Reli', '2024-04-21', 'The Temple of the Tooth Relic in Kandy, Sri Lanka, holds a sacred tooth relic of Lord Buddha, drawing visitors from around the world to experience its spiritual significance and architectural beauty.', 'The Temple of the Tooth Relic, located in Kandy, Sri Lanka, stands as one of the most revered religious sites in the country. It holds a significant place in Buddhism, as it is said to house a tooth relic of Lord Buddha. This relic is believed to be a sacred relic of the Buddha\\\'s left canine tooth, which was rescued from his funeral pyre in 483 BC. The temple complex, known locally as Sri Dalada Maligawa, not only serves as a religious center but also as a symbol of Sri Lankan heritage and culture.', '6628f2d9a191c_temple.jpeg', '6628f2d9a1ba6_temple1.jpeg', '6628f2d9a1d49_temple2.jpeg', NULL, NULL, NULL, 'Visitors to the Temple of the Tooth Relic are immediately struck by its architectural beauty and serene atmosphere. Built in the traditional Kandyan style of architecture, the temple boasts intricate wood carvings, colorful paintings, and elaborate roof tiles that depict scenes from Buddhist mythology. The temple\\\'s golden roof glimmers in the sunlight, adding to its majestic appearance. Surrounding the temple are lush gardens, adding to the tranquility of the surroundings and providing a peaceful space for reflection and meditation.', 'The highlight of a visit to the Temple of the Tooth Relic is the opportunity to view the sacred tooth relic itself. Housed within a golden casket, the relic is enshrined in a chamber known as the \\\"Dalada Maligawa.\\\" Devotees from all over the world flock to the temple to pay their respects to the relic and offer prayers and offerings. The atmosphere within the temple is filled with the sound of chanting and the fragrance of burning incense, creating a deeply spiritual experience for visitors.', 'Throughout its long history, the Temple of the Tooth Relic has faced numerous challenges, including invasions, wars, and even terrorist attacks. However, it has always stood as a symbol of resilience and faith for the Sri Lankan people. Today, it continues to be a vital center for Buddhist worship and a must-visit destination for travelers seeking to experience the rich cultural heritage of Sri Lanka.', 3, 0),
(17, 'Wild Glamping Knuckl', '2024-04-25', 'Wild Glamping Knuckles offers luxurious tented accommodations and thrilling outdoor adventures amidst the stunning wilderness of the Knuckles Mountain Range in Sri Lanka.', 'Nestled amidst the untamed beauty of the Knuckles Mountain Range in Sri Lanka lies an enchanting escape known as Wild Glamping Knuckles. Here, adventurers seeking a blend of luxury and wilderness find themselves immersed in nature\\\'s embrace, surrounded by lush greenery, cascading waterfalls, and breathtaking vistas. Set within a pristine forest reserve, this unique glamping experience offers travelers a chance to disconnect from the hustle and bustle of modern life and reconnect with the serenity of the great outdoors.', '6629300b60ba6_knuclkes1.jpeg', '6629300b6108a_knuckles2.jpeg', '6629300b61134_knuckles3.jpeg', NULL, NULL, NULL, 'At Wild Glamping Knuckles, guests are treated to an array of luxurious tented accommodations, each thoughtfully designed to provide comfort and relaxation without compromising the immersive nature experience. Tents are strategically positioned to offer panoramic views of the surrounding landscape, allowing guests to wake up to the sight of mist-covered mountains and the sounds of chirping birds. Whether lounging on the private veranda, savoring a gourmet meal under the stars, or indulging in a rejuvenating spa treatment, every moment at Wild Glamping Knuckles is infused with tranquility and adventure.', 'For those eager to explore the wilderness, the Knuckles Mountain Range offers a myriad of outdoor activities and adventures. Guided trekking excursions lead guests through verdant forests, across rushing streams, and to hidden waterfalls, offering glimpses of rare wildlife and exotic flora along the way. Thrill-seekers can embark on adrenaline-pumping adventures such as rock climbing, mountain biking, and white-water rafting, while nature lovers can simply unwind amidst the natural beauty that surrounds them.', 'As the sun sets over the Knuckles, the magic of Wild Glamping comes alive. Guests gather around crackling campfires, swapping stories under the star-studded sky and savoring delicious local cuisine prepared with fresh, organic ingredients. With its unparalleled natural beauty, luxurious accommodations, and endless adventure opportunities, Wild Glamping Knuckles invites travelers to embark on a journey of discovery, where every moment is an opportunity to reconnect with nature and create memories that will last a lifetime.', 2, 0),
(19, 'Yala Safari Camping', '2023-12-20', 'Yala Safari Camping offers a thrilling wilderness experience amidst the diverse ecosystems of Yala National Park, promising unforgettable wildlife encounters and nights under the stars.', 'Yala Safari Camping offers a unique and thrilling experience amidst the untamed wilderness of Yala National Park in Sri Lanka. Nestled in the heart of nature, this camping adventure allows guests to immerse themselves in the sights and sounds of one of the country\\\'s most renowned wildlife sanctuaries.', '662ac79ac439c_yala1.jpeg', '662ac79ac461b_yala2.jpeg', '662ac79ac4788_yala3.jpeg', NULL, NULL, NULL, 'The safari camping experience begins with guests arriving at the designated campsite, often situated in a secluded area within the park. Here, they are greeted by knowledgeable guides who provide insights into the park\\\'s diverse ecosystem and the wildlife it harbors. Accommodations typically range from comfortable tents equipped with essential amenities to more luxurious options for those seeking added comfort.', 'As the sun sets over the horizon, guests gather around a campfire to swap stories and relish in the tranquility of the surroundings. Nights in the wilderness are filled with the symphony of nocturnal creatures, creating an atmosphere unlike any other. For those with a penchant for adventure, nighttime safaris offer the opportunity to witness elusive species such as leopards and sloth bears in their natural habitat.', 'Each day brings new opportunities for wildlife encounters as guests embark on thrilling safari excursions led by experienced guides. From the majestic elephants to the elusive leopards and a myriad of bird species, Yala National Park boasts a rich biodiversity that never fails to captivate visitors. Whether it\\\'s an adrenaline-fueled game drive or a leisurely stroll through the wilderness, Yala Safari Camping promises an unforgettable journey into the heart of Sri Lanka\\\'s wild side.', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blogcategory`
--

CREATE TABLE `blogcategory` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogcategory`
--

INSERT INTO `blogcategory` (`cat_id`, `cat_name`) VALUES
(1, 'Camping sites'),
(2, 'Glamping sites'),
(3, 'Travel sites');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `reference_number` varchar(20) DEFAULT NULL,
  `UserId` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `pickup_location` varchar(255) NOT NULL,
  `dropoff_location` varchar(255) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `booking_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0 = Pending,\r\n1 = Confirmed,\r\n2 = completed,\r\n3 = cancelled',
  `adults` int(3) NOT NULL,
  `children` int(3) NOT NULL,
  `info` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `name`, `contact`, `email`, `reference_number`, `UserId`, `d_id`, `pickup_location`, `dropoff_location`, `booking_date`, `booking_time`, `booking_status`, `adults`, `children`, `info`, `created_at`, `updated_at`) VALUES
(1, 'faheema', 1233456678, 'fa@gmail.com', 'REF1712988805214', 3, 1, 'gampola', 'kandy', '2024-04-25', '11:44:00', 0, 2, 1, NULL, '2024-04-13 00:43:25', '2024-04-13 00:43:25'),
(2, 'faheema', 1233456678, 'fa@gmail.com', 'REF1712990560924', 3, 1, 'gampola', 'kandy', '2024-04-25', '11:44:00', 0, 2, 1, NULL, '2024-04-13 01:12:40', '2024-04-13 01:12:40'),
(3, 'faheema', 1233456678, 'fa@gmail.com', 'REF1712990641698', 3, 1, 'gampola', 'kandy', '2024-04-25', '11:44:00', 0, 2, 1, NULL, '2024-04-13 01:14:01', '2024-04-13 01:14:01'),
(4, 'faheema', 1233456678, 'fa@gmail.com', 'REF1712991636182', 3, 1, 'gampola', 'kandy', '2024-04-25', '11:44:00', 0, 2, 1, NULL, '2024-04-13 01:30:36', '2024-04-13 01:30:36'),
(5, 'faheema', 1233456678, 'frauzfaheema@gmail.c', 'REF1713007220453', 3, 1, 'gampola', 'kandy', '2024-04-15', '19:50:00', 0, 2, 1, NULL, '2024-04-13 05:50:20', '2024-04-13 05:50:20'),
(6, 'shasa', 1233467811, 'dj@mail.com', 'REF1713078100878', 3, 10, 'colombo', 'kandy', '2024-04-15', '12:34:00', 2, 4, 5, NULL, '2024-04-14 01:31:40', '2024-04-14 10:43:58'),
(7, 'Roshana', 740122529, 'eroshananlf1@gmail.c', 'DR171404341626', 11, 10, 'gampola', 'kandy', '2024-04-27', '00:00:00', 0, 2, 1, 'No', '2024-04-25 05:57:36', '2024-04-25 05:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `booking_guide`
--

CREATE TABLE `booking_guide` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reference_number` varchar(20) DEFAULT NULL,
  `UserId` int(11) NOT NULL,
  `guide_id` int(11) NOT NULL,
  `bookingType` varchar(20) NOT NULL,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  `checkIn` date DEFAULT NULL,
  `checkOut` date DEFAULT NULL,
  `date` date DEFAULT NULL,
  `booking_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0 = Pending,\r\n1 = Confirmed,\r\n2 = completed,\r\n3 = cancelled',
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `langPref` varchar(100) DEFAULT NULL,
  `specInt` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `amount` decimal(10,2) DEFAULT NULL,
  `advancePayment` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_guide`
--

INSERT INTO `booking_guide` (`id`, `name`, `contact`, `email`, `reference_number`, `UserId`, `guide_id`, `bookingType`, `startTime`, `endTime`, `checkIn`, `checkOut`, `date`, `booking_status`, `adults`, `children`, `langPref`, `specInt`, `created_at`, `updated_at`, `amount`, `advancePayment`) VALUES
(1, 'Roshana', '0740122529', 'eroshananlf1@gmail.com', 'GR171399219566', 11, 16, 'half_day_morning', '00:00:00', '00:00:00', '2024-04-25', '0000-00-00', NULL, 0, 2, 1, 'english', '', '2024-04-24 18:21:41', '2024-04-24 18:21:41', 1800.00, 540.00),
(2, 'Roshana', '0740122529', 'eroshananlf1@gmail.com', 'GR171400326136', 11, 16, 'half_day_morning', '00:00:00', '00:00:00', '2024-04-25', '0000-00-00', NULL, 0, 2, 1, 'english', 'no', '2024-04-24 18:31:10', '2024-04-24 18:31:10', 1800.00, 540.00);

-- --------------------------------------------------------

--
-- Table structure for table `camping_sites`
--

CREATE TABLE `camping_sites` (
  `id` int(11) NOT NULL,
  `camp_site_name` varchar(255) NOT NULL,
  `camp_site_description` text NOT NULL,
  `camp_site_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `camping_sites`
--

INSERT INTO `camping_sites` (`id`, `camp_site_name`, `camp_site_description`, `camp_site_image`) VALUES
(1, 'Bible-Rock Camping Site', 'Bible Rock resembles the Bible or an open book. This is a huge rock approximately 798 m in height and spans across a breadth of 710 m. Rising 2,618 feet above sea level, this rock is a delightful landmark among the surrounding mountain ranges.', 'camp.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(4, 'T-shirt'),
(5, 'Shorts'),
(6, 'Bags'),
(10, 'Tents'),
(11, 'water bottles'),
(12, 'Floor mats'),
(13, 'Torch');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `comment`, `created_at`, `page`) VALUES
(20, '202', 'asdfsafasgvdfgdg', '2024-03-02 11:11:03', ''),
(21, '202', 'asdfsafasgvdfgdg', '2024-03-02 11:11:30', ''),
(22, 'lakshani', 'nice anesthesia', '2024-03-02 11:11:44', ''),
(23, 'lakshani', 'nice anesthesia', '2024-03-02 11:12:40', ''),
(24, 'lakshani', 'nice site', '2024-03-02 11:14:29', ''),
(25, 'lakshani', 'nice site', '2024-03-02 11:14:55', ''),
(26, 'hii', 'ghii', '2024-03-02 11:15:08', ''),
(27, 'laki', 'de', '2024-03-02 11:36:37', ''),
(28, 'lakshaninimesha@gmail.com', 'z', '2024-04-24 15:50:25', ''),
(29, 'laki', 'hiii', '2024-04-24 16:16:17', '/campamento/Campamento-GIS23/comment/comment.php'),
(30, 'sd', 'sdasrs', '2024-04-24 16:18:31', '/campamento/Campamento-GIS23/comment/comment.php'),
(31, 'lakshani', 'sfsf', '2024-04-24 16:22:39', '/campamento/Campamento-GIS23/home/'),
(32, 'lakshani', 'sfsf', '2024-04-24 16:23:04', '/campamento/Campamento-GIS23/home/'),
(33, 'laki', 'sdsfes', '2024-04-24 16:30:29', '/campamento/Campamento-GIS23/home/'),
(34, 'laki', 'hello how are you doing', '2024-04-24 16:44:24', '/campamento/Campamento-GIS23/home/'),
(35, 'laki', 'hello how are you doing', '2024-04-24 16:44:46', '/campamento/Campamento-GIS23/home/'),
(36, 'hello', 'hell', '2024-04-24 16:45:01', '/campamento/Campamento-GIS23/home/'),
(37, 'lakshani', 'lkjhgfdsaqwertyuiop', '2024-04-24 16:46:56', '/campamento/Campamento-GIS23/home/');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Nimesha Lakshani', 'lakshaninimesha@gmail.com', 'hii', '2024-02-28 07:36:10'),
(2, 'Nimesha Lakshani', 'lakshaninimesha@gmail.com', 'hiii', '2024-02-29 05:12:42'),
(3, 'Nimesha Lakshani', 'lakshaninimesha@gmail.com', 'hiii', '2024-02-29 06:04:15'),
(4, 'Nimesha Lakshani', 'lakshaninimesha@gmail.com', 'hiii', '2024-02-29 06:04:25'),
(5, 'Nimesha Lakshani', 'lakshaninimesha@gmail.com', 'hiii', '2024-02-29 06:07:01'),
(6, 'Nimesha Lakshani', 'lakshaninimesha@gmail.com', 'hiii', '2024-02-29 06:07:09'),
(7, 'Nimesha Lakshani', 'lakshaninimesha@gmail.com', 'hiii', '2024-02-29 08:22:52'),
(8, 'Nimesha Lakshani', 'lakshaninimesha@gmail.com', 'hiii', '2024-02-29 09:01:46'),
(9, 'Nimesha Lakshani', 'lakshaninimesha@gmail.com', 'hii', '2024-02-29 09:02:03'),
(10, 'Nimesha Lakshani', 'lakshaninimesha@gmail.com', 'hii', '2024-02-29 09:12:57'),
(11, 'Nimesha Lakshani', 'lakshaninimesha@gmail.com', 'shan', '2024-02-29 09:13:13'),
(12, 'Nimesha Lakshani', 'lakshaninimesha@gmail.com', 'shan', '2024-02-29 09:17:16'),
(13, 'Nimesha Lakshani', 'lakshaninimesha@gmail.com', 'hiii', '2024-03-05 03:38:49'),
(14, 'Nimesha Lakshani', 'lakshaninimesha@gmail.com', 'sdad', '2024-03-06 07:47:14'),
(15, 'Nimesha Lakshani', 'lakshaninimesha@gmail.com', 'asd fdgfh', '2024-03-06 08:42:12'),
(16, 'Nimesha Lakshani', 'lakshaninimesha@gmail.com', 'asd fdgfh', '2024-03-06 08:44:34'),
(17, 'Nimesha Lakshani', 'lakshaninimesha@gmail.com', 'hello', '2024-03-06 08:59:44'),
(18, 'Nimesha Lakshani', 'lakshaninimesha@gmail.com', 'hello', '2024-03-06 09:05:59'),
(19, 'Nimesha Lakshani', 'lakshaninimesha119@gmail.com', 'sfsfsfsfff', '2024-03-06 09:07:52'),
(20, 'Nimesha Lakshani', 'lakshaninimesha119@gmail.com', 'sfsfsfsfff', '2024-03-06 09:08:35'),
(21, 'Nimesha Lakshani', 'lakshaninimesha119@gmail.com', 'sfsfsfsfff', '2024-03-06 09:09:22'),
(22, 'Nimesha Lakshani', 'lakshaninimesha119@gmail.com', 'test123', '2024-03-06 09:09:37'),
(23, 'Nimesha Lakshani', 'lakshaninimesha119@gmail.com', 'test123', '2024-03-06 09:10:09'),
(24, 'shani', 'nimeshalakshani1114@gmail.com', 'i have a problem', '2024-03-06 15:14:28'),
(25, 'Nimesha Lakshani', 'lakshaninimesha119@gmail.com', 'hello ', '2024-04-16 16:42:09'),
(26, 'Nimesha Lakshani', 'lakshaninimesha119@gmail.com', 'how are u\r\n', '2024-04-16 16:44:24'),
(27, 'Nimesha Lakshani', 'lakshaninimesha@gmail.com', 'heloo', '2024-04-19 15:43:33'),
(28, 'Nimesha Lakshani', 'nimeshalakshani1114@gmail.com', 'ksjhfksfhlsdf', '2024-04-21 19:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `customer_bookings`
--

CREATE TABLE `customer_bookings` (
  `cus_id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `NIC` varchar(20) DEFAULT NULL,
  `tent_type` varchar(50) DEFAULT NULL,
  `num_of_rooms` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_bookings`
--

INSERT INTO `customer_bookings` (`cus_id`, `customer_name`, `email`, `phone`, `NIC`, `tent_type`, `num_of_rooms`, `price`) VALUES
(1, 'Amaya Udari Herath', 'udariherath2001@gmail.com', '0714675795', '200152100821', NULL, 1, NULL),
(3, 'saman kumara', 'fsd@gmail.com', '0702901710', '125786438197', NULL, 1, NULL),
(5, 'Sadamali Gunawardhane', '130@gmail.com', '0702901710', '456728963147', NULL, 1, NULL),
(6, 'A.C.Perera', 'ght@gmail.vom', '0759376355', '200474381645', NULL, 1, NULL),
(7, 'M.V.Ferando', 'gyu12@gmail.com', '0702901710', '200474381678', NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `veh_des` varchar(500) NOT NULL,
  `vehicle` varchar(200) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `experience` varchar(1000) NOT NULL,
  `expimage` varchar(200) NOT NULL,
  `nic` int(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `location` varchar(30) NOT NULL,
  `license` varchar(200) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `d_id` int(12) NOT NULL,
  `Vehicle_type` varchar(255) DEFAULT NULL,
  `Model` varchar(255) DEFAULT NULL,
  `AC` varchar(20) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`firstname`, `lastname`, `gender`, `phone`, `address`, `veh_des`, `vehicle`, `picture`, `experience`, `expimage`, `nic`, `email`, `password`, `location`, `license`, `qualification`, `d_id`, `Vehicle_type`, `Model`, `AC`, `district`, `Status`) VALUES
('Nimal ', 'Saanth', 'Male', 761234567, '789, Kandy Road, Kandy', 'Honda car. ', '', 'pic/Dkurtz-Phelan_small_0.png', '5 years of experience. Familiar in places', '', 2147483647, 'nimall@mail.com', 'Nimal@123', 'kandy', 'license/0_K7AX-9LifDGEKEoZ.jpg', '', 11, 'Car/ Mini SUV(3-4)', 'Honda CAR', 'A/C', 'Kandy', 1),
('Suresh', 'Raja', 'Male', 772803473, '159, Hill Road, Nuwara Eliya', 'Honda. Big space', '', 'pic/images (1).jpg', 'Experienced for around 4 years. ', '', 2147483647, 'suresh@mail.com', 'Suresh@11', 'Kandy', 'license/0_K7AX-9LifDGEKEoZ.jpg', '', 12, 'Car/ Mini SUV(3-4)', 'Honda CAR', 'A/C', 'Kandy', 1),
('Mohamed', 'Anas', 'Male', 771234567, '20, Main Road, Batticaloa', 'Toyota Car.', '', 'pic/istockphoto-1327592506-612x612.jpg', '7 Years.', '', 2147483647, 'mohamed@mail.com', 'Mohamed@11', 'Batticalo', 'license/0_K7AX-9LifDGEKEoZ.jpg', '', 13, 'Car/ Mini SUV(3-4)', 'Toyota sentra', 'A/C', 'Batticaloa', 1),
('Kavitha ', ' Ranasinghe', 'Male', 712345679, '753, Beach Road, Matara', 'Toyota Mini SUV', '', 'pic/images (1).jpg', 'Experienced for around 5 years. ', '', 2147483647, 'kavitha@mailcom', 'Kavitha@123', 'Matara', 'license/0_K7AX-9LifDGEKEoZ.jpg', '', 14, 'Car/ Mini SUV(3-4)', 'Toyota hybrid', 'A/C', 'Matara', 1),
('Priya', 'silvan', 'Male', 712345671, ' 147, Park Street, Gampaha', 'Hyundai Car', '', 'pic/Dkurtz-Phelan_small_0.png', '3 Years', '', 2147483647, 'priya@mail.com', 'Priya@123', 'Gampaha', 'license/0_K7AX-9LifDGEKEoZ.jpg', '', 15, 'Car/ Mini SUV(3-4)', 'Hyundai Sonata', 'A/C', 'Gampaha', 1),
('Lakshan', 'sineth', 'Male', 763452123, '20, Queen rd, Colombo', 'Suzuki', '', 'pic/Dkurtz-Phelan_small_0.png', '6 Years', '', 2147483647, 'sineth@mail.com', 'Sineth@123', 'Colombo', 'license/0_K7AX-9LifDGEKEoZ.jpg', '', 16, 'Car/ Mini SUV(3-4)', 'Suzuki Alto', 'A/C', 'Colombo', 1),
('Jagath', 'Perera', 'Male', 771234567, '12, Hill st, Gampola', 'Toyota Car.', '', 'pic/Dkurtz-Phelan_small_0.png', '3 Years', '', 189912346, 'jagath1@mail.com', 'Jagath@123', 'Gampola', 'license/0_K7AX-9LifDGEKEoZ.jpg', '', 17, 'Car/ Mini SUV(3-4)', 'Toyota', 'A/C', 'Kandy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `driver_availability`
--

CREATE TABLE `driver_availability` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` enum('available','unavailable') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver_availability`
--

INSERT INTO `driver_availability` (`id`, `driver_id`, `date`, `status`) VALUES
(15, 12, '2024-04-30', 'unavailable'),
(16, 11, '2024-05-01', 'unavailable'),
(17, 11, '2024-04-30', 'unavailable'),
(18, 13, '2024-05-02', 'unavailable'),
(19, 13, '2024-04-29', 'unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `exp_images`
--

CREATE TABLE `exp_images` (
  `id` int(11) NOT NULL,
  `guide_id` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exp_images`
--

INSERT INTO `exp_images` (`id`, `guide_id`, `path`, `file_name`, `uploaded_on`) VALUES
(13, 16, 'experience/OG-for-Kumana-National-Park.jpg', 'OG-for-Kumana-National-Park.jpg', '2024-04-22 06:50:53'),
(14, 16, 'experience/Gal_Oya_National_Park_(Senanayake_Samudhraya).jpg', 'Gal_Oya_National_Park_(Senanayake_Samudhraya).jpg', '2024-04-22 06:50:53'),
(15, 16, 'experience/download.jpg', 'download.jpg', '2024-04-22 06:50:53'),
(16, 16, 'experience/Photographing-mountains-in-spring-1200x800.jpg', 'Photographing-mountains-in-spring-1200x800.jpg', '2024-04-22 06:50:53'),
(17, 16, 'experience/images.jpg', 'images.jpg', '2024-04-22 06:50:53'),
(18, 17, 'experience/Gal_Oya_National_Park_(Senanayake_Samudhraya).jpg', 'Gal_Oya_National_Park_(Senanayake_Samudhraya).jpg', '2024-04-22 07:09:09'),
(19, 17, 'experience/Photographing-mountains-in-spring-1200x800.jpg', 'Photographing-mountains-in-spring-1200x800.jpg', '2024-04-22 07:09:09'),
(20, 17, 'experience/images.jpg', 'images.jpg', '2024-04-22 07:09:09'),
(21, 16, 'experience/car-with-dirt-road-rally-nature-background.jpg', 'car-with-dirt-road-rally-nature-background.jpg', '2024-04-22 10:39:37'),
(22, 16, 'experience/woman-holding-map-car-full-shot.jpg', 'woman-holding-map-car-full-shot.jpg', '2024-04-22 10:39:37'),
(23, 18, 'experience/two-men-looking-into-distance.jpg', 'two-men-looking-into-distance.jpg', '2024-04-25 12:09:59'),
(24, 18, 'experience/beautiful-shot-orange-tent-rocky-mountain-surrounded-by-trees-during-sunset (3).jpg', 'beautiful-shot-orange-tent-rocky-mountain-surrounded-by-trees-during-sunset (3).jpg', '2024-04-25 12:09:59'),
(25, 18, 'experience/2.jpg', '2.jpg', '2024-04-25 12:09:59'),
(26, 18, 'experience/wallpaperbetter.jpg', 'wallpaperbetter.jpg', '2024-04-25 12:09:59'),
(27, 19, 'experience/download (5).jpg', 'download (5).jpg', '2024-04-25 12:45:22'),
(28, 19, 'experience/vu0evjh4nwyb1.jpg', 'vu0evjh4nwyb1.jpg', '2024-04-25 12:45:22'),
(29, 19, 'experience/download (3).jpg', 'download (3).jpg', '2024-04-25 12:45:22'),
(30, 19, 'experience/images (4).jpg', 'images (4).jpg', '2024-04-25 12:45:22'),
(31, 20, 'experience/Best-time-to-go-to-Sri-Lanka-pearl-of-the-Indian-ocean.jpg', 'Best-time-to-go-to-Sri-Lanka-pearl-of-the-Indian-ocean.jpg', '2024-04-25 12:52:32'),
(32, 20, 'experience/Bambarakanda_Waterfall_20190704000235.jpg', 'Bambarakanda_Waterfall_20190704000235.jpg', '2024-04-25 12:52:32'),
(33, 20, 'experience/kouchibouguac-national-park-tent-camping-canada_11zon-e1686893641892.jpg', 'kouchibouguac-national-park-tent-camping-canada_11zon-e1686893641892.jpg', '2024-04-25 12:52:32'),
(34, 20, 'experience/camping-kampcilik-nedir.jpg', 'camping-kampcilik-nedir.jpg', '2024-04-25 12:52:32'),
(35, 21, 'experience/download (4).jpg', 'download (4).jpg', '2024-04-25 13:05:04'),
(36, 21, 'experience/images (5).jpg', 'images (5).jpg', '2024-04-25 13:05:04'),
(37, 21, 'experience/images (4).jpg', 'images (4).jpg', '2024-04-25 13:05:04'),
(38, 21, 'experience/download (2).jpg', 'download (2).jpg', '2024-04-25 13:05:04'),
(39, 21, 'experience/sri-lanka-best-places-to-visit-pollonnaruwa.jpg', 'sri-lanka-best-places-to-visit-pollonnaruwa.jpg', '2024-04-25 13:05:04'),
(40, 22, 'experience/download (3).jpg', 'download (3).jpg', '2024-04-25 13:11:15'),
(41, 22, 'experience/images (5).jpg', 'images (5).jpg', '2024-04-25 13:11:15'),
(42, 22, 'experience/download.jpg', 'download.jpg', '2024-04-25 13:11:15'),
(43, 22, 'experience/Photographing-mountains-in-spring-1200x800.jpg', 'Photographing-mountains-in-spring-1200x800.jpg', '2024-04-25 13:11:15'),
(44, 22, 'experience/images.jpg', 'images.jpg', '2024-04-25 13:11:15'),
(45, 23, 'experience/vu0evjh4nwyb1.jpg', 'vu0evjh4nwyb1.jpg', '2024-04-25 13:15:22'),
(46, 23, 'experience/images (4).jpg', 'images (4).jpg', '2024-04-25 13:15:22'),
(47, 23, 'experience/download (2).jpg', 'download (2).jpg', '2024-04-25 13:15:22'),
(48, 23, 'experience/sri-lanka-best-places-to-visit-pollonnaruwa.jpg', 'sri-lanka-best-places-to-visit-pollonnaruwa.jpg', '2024-04-25 13:15:22'),
(49, 23, 'experience/download (1).jpg', 'download (1).jpg', '2024-04-25 13:15:22'),
(50, 24, 'experience/images (6).jpg', 'images (6).jpg', '2024-04-25 13:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `glamping_manager_registration`
--

CREATE TABLE `glamping_manager_registration` (
  `glm_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `business_registration_no` varchar(50) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `repeat_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `glamping_manager_registration`
--

INSERT INTO `glamping_manager_registration` (`glm_id`, `first_name`, `last_name`, `NIC`, `email`, `business_name`, `business_registration_no`, `gender`, `phone_number`, `password`, `repeat_password`) VALUES
(1, 'manushi', 'herath', '123464676585', '132@gmail.com', 'Nature Resorts pvt(Ltd)', 'GL/CP/35', 'Female', '0701693977', '$2y$10$3.AY5bNMJf9bXvXAGFQDheNcknmS3AnUYgFgIERhP.rNHfN03S4Je', 'Bottle@123'),
(2, 'Amaya', 'Herath', '200181900953', '2021is037@stu.ucsc.cmb.ac.lk', 'Ahasya Resorts pvt(Ltd)', 'GL/CP/25', 'Female', '0701693977', '$2y$10$m58dRjXYNf0hoIOkbkhaTOljjQ6BnnSOk7FK72t0PNQOONcz4gbaC', 'Pissa@123'),
(6, 'Poornima ', 'Herath', '197286402068', 'cp2005@gmail.com', 'Perera group of company', 'GL/CP/15', 'Female', '0701693977', '$2y$10$THcsfNUmp4H2tghJR9.83uXMK4mQOa8OCRUPXTxKJbnu26bSIGA86', 'Hayashi#456'),
(7, 'Himashi', 'Dissanayake', '200048697513', 'Hima20@gmail.com', 'Dissanayake pvt(ltd)', 'GL/WP/16', 'Female', '0701693977', '$2y$10$W3ImT9/heh27ZkNBr83SE.CSRoySBBAllt8jniSNjmHOFj7z0hngC', 'Kagisu#789'),
(22, 'Nimesha', 'Lakshani', '200132654987', 'bdg@gmail.com', 'Amaya resorts', 'WE/123456', 'Female', '0214567897', '$2y$10$IT0CQjtWAbmD6EdUs2KKbOun/eyRdF3zgPMQWpTr8fHQZjq2ph31G', 'Laki@1234');

-- --------------------------------------------------------

--
-- Table structure for table `glmp_sites`
--

CREATE TABLE `glmp_sites` (
  `site_id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_description` text NOT NULL,
  `site_category` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `site_image` varchar(255) NOT NULL,
  `room1_type` varchar(50) DEFAULT NULL,
  `room1_price` decimal(10,2) DEFAULT NULL,
  `room2_type` varchar(50) DEFAULT NULL,
  `room2_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `glmp_sites`
--

INSERT INTO `glmp_sites` (`site_id`, `site_name`, `site_description`, `site_category`, `price`, `site_image`, `room1_type`, `room1_price`, `room2_type`, `room2_price`) VALUES
(5, 'Jungle Beach Camp', 'Jungle Beach Ahungalla can be found on the shores of a quaint costal town in the South of Sri Lanka, far removed from the clamor of everyday life and surrounded by wild, lush greenery. Here is a place where you can escape at all for a while.', 'Beachglamping', 0.00, 'jungle beach.jpg', 'FamilyTent', 13000.00, 'FamilyTent', 12000.00),
(6, 'Ark Tree house Sinharaja', 'The Ark is a fascinating eco retreat bordering the Sinharaja rainforest reserve, a treehouse with an imaginative character, and an exciting design mixed with uplifting views to create unforgettable memories.  ', 'Treehouse', 0.00, 'ark.jpg', 'LuxuryTent', 25000.00, 'LuxuryTent', 35000.00),
(7, 'galoya glamping site', 'Located near the prestigious Gal Oya National Park, which has been unblemished for centuries, Wild Glamping Gal Oya is stationed in \"Rathugala,\" a majestic mountain-locked village inhabited by the Veddas — the aboriginal inhabitants of Sri Lanka.', 'Wildglamping', 0.00, 'galoya.jpg', 'FamilyTent', 15000.00, 'FamilyTent', 20000.00),
(8, 'Flameback Eco Lodge', 'Located by the tranquil Weerawila lake in a bird sanctuary, our luxury tented lodges provide a legacy of rejuvenation. Experience the delight of delectable organic cuisine sourced from local communities while participating in  eco-friendly glamping', 'Luxurysite', 0.00, 'flame.jpg', 'LuxuryTent', 35000.00, 'FamilyTent', 20000.00);

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `experience` varchar(1000) NOT NULL,
  `expimage` varchar(200) NOT NULL,
  `nic` int(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `location` varchar(30) NOT NULL,
  `license` varchar(200) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `id` int(12) NOT NULL,
  `language` varchar(150) NOT NULL,
  `payment_preference` text DEFAULT NULL,
  `half_day` decimal(10,2) DEFAULT NULL,
  `full_day` decimal(10,2) DEFAULT NULL,
  `hourly` decimal(10,2) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `expertise` varchar(700) DEFAULT NULL,
  `tour_types` varchar(300) DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`firstname`, `lastname`, `gender`, `phone`, `address`, `picture`, `experience`, `expimage`, `nic`, `email`, `password`, `location`, `license`, `qualification`, `id`, `language`, `payment_preference`, `half_day`, `full_day`, `hourly`, `district`, `expertise`, `tour_types`, `Status`) VALUES
('john', 'doe', 'Male', 2147483647, '11, main road', 'pic/istockphoto-1327592506-612x612.jpg', ' 5.5 years of experience in tourism industry with expertise in adventure tours and wildlife exploration. Visited camping sites include Knuckles Mountain Range, Horton Plains National Park, Gal Oya National Park, Wilpattu National Park, and Kumana National Park.', '', 2001678099, 'fa@gmail.com', '1234', 'Gampaha, colombo, negombo', 'license/20240329_142505.jpg', 'Bachelor\'s Degree in Tourism M', 16, 'a:3:{i:0;s:7:\"English\";i:1;s:7:\"Sinhala\";i:2;s:5:\"Tamil\";}', 'half_day,full_day,hourly', 1500.00, 2500.00, 200.00, 'Gampaha', 'Hiking and Backpacking,Campsite Setup and Gear,Wildlife Identification,Photography and Nature Observation,Outdoor Fitness and Wellness,Bushcraft and Survival Skills', 'Cultural Tours,Adventure Tours,Adventure Tours,Specialty Tours', 1),
('Shone', 'jack', 'Male', 7712345, '222, main rd', 'pic/istockphoto-1327592506-612x612.jpg', '5 years of exp', '', 200187, 'faa@mail.com', '1234', 'kandy', 'license/20240329_142500.jpg', 'certified guide. License avail', 17, 'a:2:{i:0;s:7:\"English\";i:1;s:7:\"Sinhala\";}', 'half_day,full_day', 1000.00, 2000.00, 0.00, 'Ampara', 'Campsite Setup and Gear,Wildlife Identification,Cultural and Historical Interpretation', 'Historical Tours,Cultural Tours,Adventure Tours', 1),
('David', 'Johnson', 'Male', 775678901, '20, Main Rd, Nugegoda', 'pic/images (1).jpg', '2 Years of experience being a Guide. I have explored many places in Sri Lanka. It has always been splendid being a guide and exploring with others.', '', 199712345, 'johnson@gmail.com', '@David1122', 'Colombo', 'license/tour-guide-in-vietnam-2.jpg', 'Certified guide. License avail', 18, 'a:4:{i:0;s:7:\"English\";i:1;s:7:\"Sinhala\";i:2;s:5:\"Tamil\";i:3;s:6:\"French\";}', 'half_day,full_day,hourly', 1500.00, 2500.00, 200.00, 'Colombo', 'Hiking and Backpacking,Campsite Setup and Gear,Water Sports and Boating,Photography and Nature Observation,Family-Friendly Adventures', 'Cultural Tours,Adventure Tours,Nature Tours,Art Tours,Photography Tours', 1),
('John', 'Doe', 'Male', 763456123, '456, Elm St, Kandy', 'pic/images (2).jpg', ' Worked as a professional tour guide for 6 years. Specialized in leading historical, cultural, and nature tours across Sri Lanka. Expert in providing insightful information about Sri Lankan history, culture, and wildlife.', '', 199212349, 'johndoe@mail.com', 'Johndoe@11', 'All the places', 'license/tour-guide-in-vietnam-2.jpg', 'Bachelor\'s Degree in Tourism M', 19, 'a:2:{i:0;s:7:\"English\";i:1;s:7:\"Sinhala\";}', 'half_day,full_day', 1600.00, 3000.00, 0.00, 'Kandy', 'Hiking and Backpacking,Campsite Setup and Gear,Wildlife Identification,Water Sports and Boating,Cultural and Historical Interpretation', 'Historical Tours,Cultural Tours,Adventure Tours', 1),
('Chaminda', 'Silva', 'Male', 712345678, '25A, Colombo Road,Kurunegala', 'pic/images (3).jpg', '8 years Worked as a professional tour guide for 8 years. Specialized in leading historical, cultural, and nature tours across Sri Lanka. Expert in providing insightful information about Sri Lankan history, culture, and wildlife.', '', 189912346, 'chaminda.silva@mail.', 'Chaminda@11', 'All the places', 'license/tour-guide-in-vietnam-2.jpg', 'Certified Guide. Diploma in To', 20, 'a:4:{i:0;s:7:\"English\";i:1;s:7:\"Sinhala\";i:2;s:5:\"Tamil\";i:3;s:8:\"Japanese\";}', 'half_day,full_day,hourly', 1700.00, 3000.00, 300.00, 'Kurunegala', 'Hiking and Backpacking,Wildlife Identification,Navigation and Map Reading,Environmental Education and Conservation,Rock Climbing and Mountaineering,Water Sports and Boating,Cultural and Historical Interpretation', 'Historical Tours,Cultural Tours,Adventure Tours,Nature Tours,Food Tours,Architecture Tours', 1),
('Thilini', 'Perera', 'Female', 723456123, '10, Main Street, Galle', 'pic/99305390.jpg', '4 years Worked as a tour guide for 9 years, specializing in historical and cultural tours. Well-versed in Sri Lankan history, culture, and architecture.', '', 861234567, 'thilini@mail.com', 'Thilini@11', 'Galle, Colombo, Kandy', 'license/tour-guide-in-vietnam-2.jpg', ' Bachelor\'s Degree in Archaeol', 21, 'a:3:{i:0;s:7:\"English\";i:1;s:7:\"Sinhala\";i:2;s:7:\"Spanish\";}', 'half_day,full_day,hourly', 1500.00, 3000.00, 250.00, 'Galle', 'Wildlife Identification,Outdoor Cooking and Food Safety,Environmental Education and Conservation,Cultural and Historical Interpretation,Family-Friendly Adventures', 'Historical Tours,Cultural Tours,Nature Tours,Architecture Tours', 1),
('Nimal', 'Fernando', 'Male', 762345678, ' 5, Beach Road, Negombo', 'pic/Dkurtz-Phelan_small_0.png', '2 years Specialized in organizing and leading adventure and nature tours across Sri Lanka. Proficient in outdoor activities such as hiking, camping, and wildlife observation.', '', 2147483647, 'nimal@mail.com', 'Nimal@123', 'Western, Central, Soutern Prov', 'license/tour-guide-in-vietnam-2.jpg', 'Diploma in Adventure Tourism f', 22, 'a:3:{i:0;s:7:\"English\";i:1;s:7:\"Sinhala\";i:2;s:5:\"Tamil\";}', 'half_day,full_day', 1000.00, 2500.00, 0.00, 'Colombo', 'Hiking and Backpacking,Campsite Setup and Gear,Wildlife Identification,Family-Friendly Adventures', 'Adventure Tours,Nature Tours,Architecture Tours,Art Tours,Photography Tours', 1),
(' Dilini', 'Wijewardena', 'Female', 722345678, '30, Temple Road, Anuradhapura', 'pic/Charles-Nicole-2019-2-400x400.webp', '5 years Extensive experience in leading cultural, historical, and archaeological tours in Anuradhapura. Proficient in providing detailed information about ancient Sri Lankan civilizations and archaeological sites.', '', 2147483647, 'dilini@mail.com', 'Dilini@11', 'All the places', 'license/tour-guide-in-vietnam-2.jpg', ' Certified Guide. Bachelor\'s D', 23, 'a:2:{i:0;s:7:\"English\";i:1;s:7:\"Sinhala\";}', 'half_day,full_day,hourly', 1000.00, 2500.00, 250.00, 'Anuradhapura', 'Navigation and Map Reading,Environmental Education and Conservation,Cultural and Historical Interpretation', 'Historical Tours,Cultural Tours,Adventure Tours,Nature Tours,Architecture Tours', 1),
('Priyantha', 'Senanayake', 'Male', 782345678, ' 50, Lake Road, Nuwara Eliya', 'pic/istockphoto-1327592506-612x612.jpg', '10 years Vast experience in leading cultural, historical, and nature tours across Sri Lanka. Knowledgeable about Sri Lankan history, culture, and biodiversity.', '', 541234567, 'priyantha@mail.com', 'Priyantha@11', 'All the places', 'license/tour-guide-in-vietnam-2.jpg', 'Certified Guide. Master\'s Degr', 24, 'a:3:{i:0;s:7:\"English\";i:1;s:7:\"Sinhala\";i:2;s:5:\"Tamil\";}', 'half_day,full_day', 2000.00, 3500.00, 0.00, 'Nuwara Eliya', 'Hiking and Backpacking,Campsite Setup and Gear,Wildlife Identification,Photography and Nature Observation,Cultural and Historical Interpretation,Family-Friendly Adventures', 'Historical Tours,Cultural Tours,Adventure Tours,Nature Tours,Architecture Tours,Art Tours', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guide_availability`
--

CREATE TABLE `guide_availability` (
  `id` int(11) NOT NULL,
  `guide_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` enum('available','unavailable') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guide_availability`
--

INSERT INTO `guide_availability` (`id`, `guide_id`, `date`, `status`) VALUES
(1, 16, '2024-04-30', 'unavailable'),
(2, 16, '2024-04-29', 'unavailable'),
(3, 16, '2024-05-01', 'unavailable'),
(4, 18, '2024-04-30', 'unavailable'),
(5, 18, '2024-04-29', 'unavailable'),
(6, 19, '2024-05-01', 'unavailable'),
(7, 19, '2024-04-28', 'unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MessageId` int(11) NOT NULL,
  `SenderId` int(11) NOT NULL,
  `ReceiverId` int(11) NOT NULL,
  `Message` text NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`MessageId`, `SenderId`, `ReceiverId`, `Message`, `Timestamp`) VALUES
(1, 1, 0, 'kjkhk', '2024-04-25 19:16:48'),
(2, 1, 0, 'hi\r\n', '2024-04-25 19:17:57'),
(3, 1, 0, 'hi\r\n', '2024-04-25 19:34:29'),
(4, 1, 0, 'hi', '2024-04-25 19:34:34'),
(5, 1, 0, 'hi\r\n', '2024-04-25 19:34:45'),
(6, 0, 1, 'hi', '2024-04-25 19:36:31'),
(7, 1, 0, 'hi hi\r\n', '2024-04-25 19:36:40'),
(8, 1, 0, 'hih i', '2024-04-25 19:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `totalprice` varchar(255) NOT NULL,
  `orderstatus` varchar(255) NOT NULL,
  `paymentmode` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `totalprice`, `orderstatus`, `paymentmode`, `timestamp`) VALUES
(19, 16, '3200', 'Order Placed', 'COD', '2024-04-23 22:13:24'),
(21, 16, '2000', 'Cancelled', 'COD', '2024-04-23 22:17:15'),
(22, 16, '3600', 'Delivered', 'COD', '2024-04-23 23:57:05'),
(23, 17, '1600', 'Order Placed', 'COD', '2024-04-25 16:57:20'),
(24, 17, '1600', 'Order Placed', 'COD', '2024-04-25 16:57:25'),
(26, 17, '2300', 'Order Placed', 'Card', '2024-04-25 20:19:13'),
(27, 17, '2300', 'Order Placed', 'Card', '2024-04-25 20:19:20'),
(28, 17, '1200', 'Order Placed', 'Card', '2024-04-25 20:21:22'),
(29, 17, '1900', 'Order Placed', 'Card', '2024-04-25 20:22:20'),
(30, 17, '2400', 'Order Placed', 'Card', '2024-04-25 20:33:46'),
(31, 17, '2400', 'Order Placed', 'Card', '2024-04-25 20:33:48'),
(32, 16, '3900', 'Order Placed', 'Card', '2024-04-26 02:20:59'),
(33, 16, '3900', 'Order Placed', 'Card', '2024-04-26 02:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `ordertracking`
--

CREATE TABLE `ordertracking` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ordertracking`
--

INSERT INTO `ordertracking` (`id`, `orderid`, `status`, `message`, `timestamp`) VALUES
(9, 21, 'cancelled', 'I bought from somewhere', '2024-04-23 23:09:39'),
(10, 22, 'Delivered', 'By uber', '2024-04-24 00:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `Status` int(11) NOT NULL,
  `SupplierID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `cat_id`, `price`, `thumb`, `product_description`, `Status`, `SupplierID`) VALUES
(22, 'Camping T-shirt', 4, '1200', 'uploads/T1.jpeg', 'water proof\r\nTop quality material\r\nmachine cut\r\n', 1, 1),
(23, 'J brand  Tshirt', 4, '1900', 'uploads/j brand.jpg', '\r\n Solid Mandarin Collar\r\n Casual camping Shirt\r\n', 1, 18),
(24, 'NAVY Brand Tshirt', 4, '2000', 'uploads/navy shirt.jpeg', 'Printed Men Round Neck \r\nkn cut T-Shirt\r\n', 1, 1),
(29, 'abc tent', 10, '400', 'uploads/abc 1.jpeg', 'large\r\n2 space', 1, 1),
(30, 'bcd tent', 10, '500', 'uploads/66111cdc947c9.jpeg', 'good to go ', 1, 18),
(31, 'GN waterbottle', 11, '1200', 'uploads/662156f05616f.jpg', 'Good Quality \r\n100% Plastic', 1, 18),
(32, 'PanasonicTorch', 13, '1000', 'uploads/66231cdd607a9.jpeg', 'High Quality, Long battery life', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `review` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `pid`, `uid`, `review`, `timestamp`) VALUES
(3, 24, 17, 'Good. Very comfortable', '2024-04-26 00:00:35'),
(19, 22, 16, 'Nice fabric', '2024-04-26 00:54:15'),
(23, 23, 16, 'Good quality', '2024-04-26 01:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `site_id` int(11) NOT NULL,
  `room1_type` varchar(100) DEFAULT NULL,
  `room1_price` decimal(10,2) DEFAULT NULL,
  `room2_type` varchar(100) DEFAULT NULL,
  `room2_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `name`, `site_id`, `room1_type`, `room1_price`, `room2_type`, `room2_price`) VALUES
(0, '', 9, 'FamilyTent', 36000.00, 'LuxuryTent', 48000.00);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SupplierId` int(11) NOT NULL,
  `FirstName` varchar(10) NOT NULL,
  `LastName` varchar(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `PhoneNo` varchar(15) NOT NULL,
  `NICNo` varchar(15) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SupplierId`, `FirstName`, `LastName`, `Gender`, `PhoneNo`, `NICNo`, `Email`, `Password`, `thumb`, `Status`) VALUES
(18, 'Lakshani', 'Fernando', 'Female', '0740122529', '300182931000', 'Lakshani@gmail.com', 'Lakshani123@', '', 1),
(1, 'Nihal', 'Perera', 'Male', '0776695842', '200182931888', 'nihal@gmail.com', 'Nihal123@', 'uploads/nihal.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `FirstName` varchar(10) NOT NULL,
  `LastName` varchar(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `PhoneNo` varchar(15) NOT NULL,
  `NICNo` varchar(15) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `FirstName`, `LastName`, `Gender`, `PhoneNo`, `NICNo`, `Email`, `Password`, `thumb`, `Status`) VALUES
(16, 'Roshana', 'Fernando', 'Female', '0740122529', '200167301000', 'eroshananlf1@gmail.com', 'Roshana123@', 'uploads/profile.jpg', 1),
(17, 'Rohan', 'Fernando', 'Male', '0776692508', '22299988383', 'roshanauni@gmail.com', 'Rohan123@', 'uploads/rohan.jpeg', 1),
(18, 'Minaya', 'Lakshani', 'Female', '0415787334', '200145789875', 'minaya@gmail.com', 'Minaya123@', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `userid`, `firstname`, `lastname`, `company`, `address1`, `address2`, `city`, `state`, `country`, `zip`, `mobile`) VALUES
(7, 16, 'Roshana', 'Fernand', 'UCSC', 'Colombo', '', '', '', '', '3214', '0740122529'),
(8, 17, 'Rohan', 'Fernando', '', '', '', '', '', '', '1234', '0312237202');

-- --------------------------------------------------------

--
-- Table structure for table `v_images`
--

CREATE TABLE `v_images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `d_id` int(11) DEFAULT NULL,
  `uploaded_on` datetime NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `v_images`
--

INSERT INTO `v_images` (`id`, `file_name`, `d_id`, `uploaded_on`, `path`) VALUES
(4, 'download (7).jpg', 11, '2024-04-26 01:06:40', 'vehicle/download (7).jpg'),
(5, 'download (6).jpg', 11, '2024-04-26 01:06:40', 'vehicle/download (6).jpg'),
(6, 'download (10).jpg', 12, '2024-04-26 01:12:39', 'vehicle/download (10).jpg'),
(7, 'download (9).jpg', 12, '2024-04-26 01:12:39', 'vehicle/download (9).jpg'),
(8, 'download (12).jpg', 13, '2024-04-26 01:16:54', 'vehicle/download (12).jpg'),
(9, 'white-color-toyota-auris-car-on-spain-nature-landscape-the-toyota-FJ4XHT.jpg', 13, '2024-04-26 01:16:54', 'vehicle/white-color-toyota-auris-car-on-spain-nature-landscape-the-toyota-FJ4XHT.jpg'),
(10, 'download (11).jpg', 13, '2024-04-26 01:16:54', 'vehicle/download (11).jpg'),
(11, '3bb776e15f87952918f4fd0fbae31060.jpg', 14, '2024-04-26 01:20:25', 'vehicle/3bb776e15f87952918f4fd0fbae31060.jpg'),
(12, '17-1.jpg', 14, '2024-04-26 01:20:25', 'vehicle/17-1.jpg'),
(13, 'download (13).jpg', 15, '2024-04-26 01:23:47', 'vehicle/download (13).jpg'),
(14, 'image_3e3888f817 (1).jpg', 16, '2024-04-26 01:26:49', 'vehicle/image_3e3888f817 (1).jpg'),
(15, 'image_3e3888f817.jpg', 16, '2024-04-26 01:26:49', 'vehicle/image_3e3888f817.jpg'),
(16, 'download (15).jpg', 17, '2024-04-26 01:30:08', 'vehicle/download (15).jpg'),
(17, 'download (14).jpg', 17, '2024-04-26 01:30:08', 'vehicle/download (14).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `pid`, `uid`, `timestamp`) VALUES
(6, 23, 17, '2024-04-25 22:35:08'),
(9, 30, 16, '2024-04-25 22:53:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogID`);

--
-- Indexes for table `blogcategory`
--
ALTER TABLE `blogcategory`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `1` (`cat_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD UNIQUE KEY `reference_number` (`reference_number`);

--
-- Indexes for table `booking_guide`
--
ALTER TABLE `booking_guide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camping_sites`
--
ALTER TABLE `camping_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_bookings`
--
ALTER TABLE `customer_bookings`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `driver_availability`
--
ALTER TABLE `driver_availability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `exp_images`
--
ALTER TABLE `exp_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guide_id` (`guide_id`);

--
-- Indexes for table `glamping_manager_registration`
--
ALTER TABLE `glamping_manager_registration`
  ADD PRIMARY KEY (`glm_id`);

--
-- Indexes for table `glmp_sites`
--
ALTER TABLE `glmp_sites`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide_availability`
--
ALTER TABLE `guide_availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertracking`
--
ALTER TABLE `ordertracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SupplierId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_images`
--
ALTER TABLE `v_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `blogcategory`
--
ALTER TABLE `blogcategory`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `booking_guide`
--
ALTER TABLE `booking_guide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `camping_sites`
--
ALTER TABLE `camping_sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customer_bookings`
--
ALTER TABLE `customer_bookings`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `d_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `driver_availability`
--
ALTER TABLE `driver_availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `exp_images`
--
ALTER TABLE `exp_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `glamping_manager_registration`
--
ALTER TABLE `glamping_manager_registration`
  MODIFY `glm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `glmp_sites`
--
ALTER TABLE `glmp_sites`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `guide`
--
ALTER TABLE `guide`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `guide_availability`
--
ALTER TABLE `guide_availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `ordertracking`
--
ALTER TABLE `ordertracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SupplierId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `v_images`
--
ALTER TABLE `v_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `driver_availability`
--
ALTER TABLE `driver_availability`
  ADD CONSTRAINT `driver_availability_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`d_id`);

--
-- Constraints for table `exp_images`
--
ALTER TABLE `exp_images`
  ADD CONSTRAINT `exp_images_ibfk_1` FOREIGN KEY (`guide_id`) REFERENCES `guide` (`id`);

--
-- Constraints for table `v_images`
--
ALTER TABLE `v_images`
  ADD CONSTRAINT `v_images_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `driver` (`d_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
