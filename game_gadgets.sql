-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2023 at 08:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_gadgets`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `qty` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `uid`, `pid`, `image`, `name`, `price`, `qty`) VALUES
(71, 1, 1, 'ps5.webp', 'PlayStation PS5', 49999, 1),
(72, 1, 8, 'dualsense-edge.webp', 'DualSense Edge', 4999, 1),
(73, 1, 23, 'rdr2-disc.jpg', 'Red Dead Redemption 2', 2299, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL,
  `category_nm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_nm`) VALUES
(1, 'Console'),
(2, 'Handheld'),
(3, 'Controller'),
(4, 'Monitor'),
(5, 'Disc'),
(6, 'Bundle'),
(7, 'Specialized');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`) VALUES
(1, 'Vishwas', 'bhattvishwas7@gmail.com', 'This is an testing message'),
(3, 'Chirag', 'chirag@gmail.com', 'It is an overall good website'),
(4, 'Nikhil', 'nik@gmail.com', 'This is the best website for shopping online gaming accessories.'),
(5, 'Sahil', 'sahil@gmail.com', 'Average Website'),
(6, 'Dharmik', 'dharmik@gmail.com', 'Interface and Navigation is user-friendly.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phno` bigint(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` bigint(6) NOT NULL,
  `pay_mode` varchar(50) NOT NULL,
  `total_price` float NOT NULL,
  `promo_code` varchar(50) NOT NULL,
  `rate` float NOT NULL,
  `discount` float NOT NULL,
  `discounted_price` float NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `full_name`, `email`, `phno`, `address`, `city`, `country`, `state`, `zip`, `pay_mode`, `total_price`, `promo_code`, `rate`, `discount`, `discounted_price`, `date`, `status`) VALUES
(1, 1, 'Vishwas Bhatt', 'bhattvishwas7@gmail.com', 9106533108, 'Pl 143, St. No. 3, Royal Pushpa Park, Khodiyar Colony', 'Jamnagar', 'India', 'Gujarat', 361006, 'Cash On Delivery', 54998, '', 0, 0, 0, '2023-09-03', 1),
(2, 3, 'Harmisha Bhatt', 'harmishabhatt@gmail.com', 63546141101, 'Pl 143, St. No. 3, Royal Pushpa Park, Khodiyar Colony', 'Jamnagar', 'India', 'Gujarat', 361006, 'Cash On Delivery', 60998, 'SVET10', 10, 6099.8, 54898.2, '2023-09-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `qty` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `uid`, `pid`, `image`, `name`, `price`, `qty`) VALUES
(1, 1, 1, 1, 'ps5.webp', 'PlayStation PS5', 49999, 1),
(2, 1, 1, 8, 'dualsense-edge.webp', 'DualSense Edge', 4999, 1),
(3, 2, 3, 9, 'xbox-series-x.webp', 'Xbox Series X', 54999, 1),
(4, 2, 3, 10, 'xbox-controller.jpg', 'Xbox One', 5999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `category_id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mrp` float NOT NULL,
  `selling_price` float NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `mrp`, `selling_price`, `image`, `description`) VALUES
(1, 1, 'PlayStation PS5', 54999, 49999, 'ps5.webp', 'Immerse yourself in worlds with a new level of realism as rays of light are individually simulated, creating true-to-life shadows and reflections in supported PS5 games.<br>\r\nPlay your favorite PS5 games on your stunning 4K TV.<br>\r\nEnjoy smooth and fluid high frame rate gameplay at up to 120fps for compatible games, with support for 120Hz output on 4K displays.<br>'),
(8, 3, 'DualSense Edge', 5999, 4999, 'dualsense-edge.webp', 'Enjoy a comfortable, evolved design with an iconic layout and enhanced sticks, intuitively interact with select games using the integrated motion sensor.<br>\r\nBring gaming worlds to life - a) feel your in-game actions and Environment simulated through haptic feedback2, b)experience varying force and tension at your fingertips with adaptive triggers2.'),
(9, 1, 'Xbox Series X', 59999, 54999, 'xbox-series-x.webp', 'Introducing Xbox series X, the fastest, most powerful Xbox ever. Play thousands of titles from four generations of consolesâ€”all games look and play best on Xbox series X.<br>\r\nExperience next-gen speed and performance with the Xbox velocity architecture, powered by a custom SSD and integrated software.<br>\r\nPlay thousands of games from four generations of Xbox with backward compatibility, including optimized titles at launch.'),
(10, 3, 'Xbox One', 6999, 5999, 'xbox-controller.jpg', 'Feel the action with impulse triggers, vibration motors in the triggers provide precise fingertip feedback bringing weapons, crashes and jolts to life for a whole new level of gaming realism.<br>Now features a 3.5 millimeter stereo headset jack that lets you plug your favorite gaming headset right into the controller.'),
(11, 1, 'Xbox Series S', 39999, 36999, 'xbox-series-s.jpg', 'Introducing the Xbox series S, the smallest, sleekest Xbox console ever. Experience the speed and performance of a next-gen all-digital console at an accessible price point.<br>\r\nExperience next-gen speed and performance with the Xbox velocity architecture, powered by a custom SSD and integrated software.<br>\r\nPlay thousands of digital games from four generations of Xbox with backward compatibility, including optimized titles at launch.'),
(12, 1, 'PlayStation 4', 39999, 34999, 'ps4.webp', 'Enables the greatest game developers in the world to unlock their creativity and push the boundaries of play through a platform that is tuned specifically to their needs.<br>\r\nGamers can share their epic triumphs by hitting the \"Share button\" on the controller, scan through the last few minutes of gameplay, tag it and return to the game.<br>'),
(13, 3, 'DualShock ', 4999, 4299, 'dualshock.webp', 'Rock and roll as a highly sensitive built-in accelerometer and gyroscope detect the motion, tilt and rotation of your DualShock 4 wireless controller.<br>\r\nBring your games to life and hear every detail with sound effects coming directly from your DualShock 4 wireless controller.<br>'),
(14, 2, 'Nintendo Switch OLED', 39999, 32999, 'nintendo-oled.webp', '7-inch OLED screen - Enjoy vivid colors and crisp contrast with a screen that makes colors pop.<br>\r\nWired LAN port - Use the dockâ€™s LAN port when playing in TV mode for a wired internet connection.<br>\r\n64 GB internal storage - Save games to your system with 64 GB of internal storage.<br>'),
(16, 2, 'Nintendo Switch Lite', 19999, 17999, 'nintendo-switch-lite.webp', 'Features a sleek, unibody design with fully integrated controls and a built-in +Control Pad Compatible with all physical and digital Nintendo Switch games that support Handheld mode.<br>\r\nGames and systems sold separately. Nintendo Switch Lite plays all games that support handheld mode.<br>'),
(17, 3, 'PowerA Joy-Con', 1499, 1199, 'powera-con.jpg', 'Officially licensed for Nintendo Switch.<br>\r\nErgonomic shape and lightweight design for comfortable gameplay anywhere.<br>\r\nDouble-injected rubber grips for added comfort.<br>\r\nEasy slide-in design secures each Joy-Con; Visible player indicator lights.'),
(18, 3, 'Nintendo Joy-Con (L/R) - Neon Pink/Neon Green', 9999, 6849, 'nintendo-switch-cons.webp', 'Two Joy-Con can be used independently in each hand, or together as One game Controller when attached to the Joy-Con grip.<br>\r\nThey can also attach to the main Console for use in handheld mode, or be shared with friends to Enjoy two-player action in supported games.<br>\r\n'),
(19, 3, 'DualSense Edge Dark', 9999, 8999, 'dualsense-dark.jpg', 'Ignite your gaming nights on your PS5 console with the DualSense Midnight Black wireless controller. <br>Part of a new line-up of galaxy-themed colors, this sleek design takes inspiration from how we view the wonders of space through the night sky, with subtle shades of black and light gray detailing.<br>Discover a deeper, highly immersive gaming experience that brings the action to life in the palms of your hands. '),
(20, 2, 'Steam Deck', 54999, 49999, 'steamdeck.jpg', 'The Steam Deck was built for extended play sessionsâ€”whether youâ€™re using thumbsticks or trackpadsâ€”with full-size controls positioned perfectly within your reach. The rear of the device is sculpted to comfortably fit a wide range of hand sizes.<br>\r\n Steam deck cover is high quality, washable, steam desk case is reusable, lightweight and durable, steam desk case is easy to carry and use when going out.<br>'),
(23, 5, 'Red Dead Redemption 2', 2999, 2299, 'rdr2-disc.jpg', 'Kindly make sure your PC/Laptop meets the Recommended System Requirements needed to Play .'),
(24, 5, 'Miles Morales', 3999, 2999, 'miles-morales.jpg', 'Miles Morales is a 2020 action-adventure game developed by Insomniac Games and published by Sony Interactive Entertainment.<br>\r\nBased on the Marvel Comics character Miles Morales, it is inspired by both the characters decade-long comic book mythology and appearances in other media, principally taking inspiration from the 2018 animated film Spider-Man: Into the Spider-Verse, which helped popularize him.'),
(25, 2, 'ROG Ally', 79999, 74999, 'rog-ally.webp', 'Get yourself the Asus ROG Ally Handheld Gaming PC, and let its outstanding performance appeal to your inner gamer. <br>\r\nThe ROG Ally is an incredibly powerful portable gaming system powered by RDNA 3 graphics and outfitted with AMDs innovative, customisable Ryzen Z1 Extreme CPUs, allowing you to game for an extended period of time without experiencing any issues.<br>\r\nFurthermore, a Full HD 120 Hz high-refresh-rate display with FreeSync Premium gives you a clear view of the action even in fast-'),
(27, 3, 'DualShock V2', 4999, 4399, 'dualshock-camoulfouge.webp', 'See even more of your games with the integrated light bar that glows with various colours depending on in-game action - now visible on the touch pad.<br>\r\nRock and roll as a highly sensitive built-in accelerometer and gyroscope detect the motion, tilt and rotation of your DualShock 4 wireless controller.'),
(28, 5, 'FIFA 23', 3999, 3249, 'fifa.jpg', 'Powered by dedicated HyperMotion2 animation.<br>\r\nHyperMotion2 Technology - Advances to HyperMotion gameplay technology with twice as much match data capture unlock new features and brings over 6000 authentic animations taken from millions of frames of advanced match capture to FIFA 23.'),
(29, 6, 'PlayStation 5 + COD Morden Warfare 2', 59999, 54999, 'ps5-cod.webp', 'Brace yourself for a whole new world of possibilities as the PS5 unleashes unparalleled power and innovation.<br>\r\nGet ready to elevate your gaming experience to new heights with the Sony PlayStation 5 Console.<br>\r\nUnleash the power of play, immerse yourself in stunning visuals, and explore a world of endless possibilities. With the PS5, gaming will never be the same again.<br>'),
(30, 5, 'God Of War Ragnarok', 4999, 3299, 'god-of-war.webp', 'God of War Ragnarök is an action-adventure game developed by Santa Monica Studio and published by Sony Interactive Entertainment.<br>\r\n It was released worldwide on November 9, 2022, for both the PlayStation 4 and PlayStation 5, marking the first cross-gen release in the God of War series<br>'),
(31, 6, 'Xbox Series X + Diablo IV', 64999, 59999, 'xbox-diablo.webp', 'Join the endless battle between the High Heavens and Burning Hells with the Xbox Series X – Diablo® IV Bundle. Includes Diablo IV® & bonus in-game items'),
(32, 6, 'Nintendo Switch OLED Console The Legend Of Zelda T', 39999, 34999, 'nintendo-oled-zelda.webp', '\r\nThe new system features a vibrant 7-inch OLED screen, a wide adjustable stand, a dock with a wired LAN port, 64 GB of internal storage, and enhanced audio.<br>\r\n 7-inch OLED screen - Feast your eyes on vivid colors and crisp contrast when you play on-the-go.<br>\r\nBuilt-in wired LAN port | Enhanced audio Enjoy enhanced audio from the system’s onboard speakers in Tabletop and Handheld modes. Three modes in one - TV Mode, Tabletop Mode, Handheld Mode'),
(33, 7, 'PlayStation VR2', 59999, 54999, 'ps-vr-2.webp', 'Escape into worlds that feel, look and sound truly real as virtual reality gaming takes a huge generational leap forward with PlayStation®VR2. <br>\r\nCUTTING-EDGE PERFORMANCE Enjoy stunningly vibrant 4K HDR visuals4 in compatible games, a vast 110º field of view and state-of-the-art graphical rendering, all made possible by the power of PS5™.<br>\r\nHEIGHTENED SENSORY AND EMOTIONAL EXPERIENCES Experience revolutionary PlayStation VR2 Sense™ technology with eye tracking, headset feedback and 3D Audi'),
(34, 6, 'Playstation PSVR2 Horizon Call of Mountain', 64999, 59999, 'ps-vr-2-horizon.webp', 'A new level of realism is delivered by Ray Tracing, which recreates individual light rays, producing realistic shadows and reflections in compatible PS5TM games.<br>\r\nWith 4K-TV gaming, you can play your favorite PS5TM games on your stunning 4K display. <br>'),
(35, 5, 'Assassins Creed Valhalla', 3999, 2490, 'creed-vallhala.webp', 'Assassins Creed Valhalla is a 2020 action role-playing video game developed by Ubisoft Montreal and published by Ubisoft. <br>\r\nIt is the twelfth major installment in the Assassins Creed series, and the successor to 2018s Assassins Creed Odyssey.<br>'),
(36, 5, 'Uncharted : Legacy Of Thieves collection', 1999, 1349, 'unchartered.webp', 'This is PS5 - Uncharted : Legacy Of Thieves collection Physical games.<br>\r\nA globe-trotting adventure with the largest and most detailed environments in the UNCHARTED franchise.<br>\r\nAn all-new setting for adventure in the southwestern coast of the Indian peninsula, featuring an exotic mix of urban, jungle, and ancient ruins environments.<br>\r\nA more personal story for Nathan Drake, raising the stakes for the award-winning storytelling of Naughty Dog.<br>'),
(37, 3, 'Xbox S/X Wireless Controller Elite Series 2', 12499, 10999, 'xbox-elite-controller.webp', 'Experience the Xbox Elite Wireless Controller Series 2 featuring adjustable-tension thumbsticks, wrap-around rubberized grip, and shorter hair trigger locks.<br>\r\nEnjoy limitless customization with interchangeable components and exclusive button mapping options in the Xbox Accessories app.<br>\r\n* Save up to 3 custom profiles on the controller and switch between them on the fly.<br>\r\nSwap thumbstick toppers, D-pads, and paddles to tailor your controller to your preferred gaming style. '),
(38, 7, 'Oculus Quest 2 Advanced All in One VR Headset', 44999, 39999, 'oculus-vr.webp', 'Oculus Quest 2 All-In-One VR Headset Quest 2 is non-stop fun.<br>\r\nAnd our library keeps growing every day.<br>\r\nOculus Quest 2 is our most advanced all-in-one VR system yet.<br>'),
(39, 7, 'THRUSTMASTER T-248 Motion Controller', 44999, 39999, 'thurstmaster.webp', 'Premium design with leather wrapping on the outer-facing portion of the wheel<br>\r\nVersatile wheel shape, well-suited to all racing game styles<br>\r\nUp to 25 action buttons including 2 dual-position encoders<br>\r\nInteractive race dashboard with a selection of more than 20 different displays on the wheels screen<br>\r\nDynamic Force Feedback: on-the-fly Force Feedback level adjustment (3 preset modes included) via the screen, compatible with all games<br>\r\nMagnetic paddle shifters (patented H.E.A.R'),
(40, 7, 'Logitech G923 Racing Wheel and Pedals,Dual Clutch, for Motion Controller', 49999, 44999, 'logitech-steering-wheel.webp', 'You can enjoy your favourite racing games with the help of the Logitech G923 Racing Wheel Motion Controller.<br>\r\nThe PS4 and PS5 controls are placed on the steering wheel so that you can easily control this controller while racing. <br>\r\nThanks to its elegant body, polished pedals, high-quality brushed material, and automotive-style leather stitching, this gaming wheel sports a sophisticated look.<br>'),
(41, 4, 'SAMSUNG Odyssey G9 34 inch Curved UWQHD VA Panel', 149999, 129999, 'samsung-monitor.webp', 'See it all on one screen<br>\r\nFor worlds of gaming and more.<br>\r\nThe 49-inch super ultra-wide curved panels 32:9 aspect ratio keeps games alive—even when you need to pause the game.<br>\r\nOpen various windows at once and jump between everyday computing tasks and worlds\r\nless ordinary.'),
(42, 4, 'ASUS ROG 27 Inch WQHD LED Backlit IPS Panel Gaming Monitor', 89999, 84999, 'asus-monitor.webp', '27-inch, WQHD 2560 x 1440 resolution display feature IPS technology for wide 178-degree viewing angles and lifelike gaming visuals<br>\r\nWorld-first 165Hz refresh rate and NVIDIAG-SYNC technology for seamless visuals and smooth gameplay<br>\r\nASUS-exclusive Ultra-Low Blue Light, Flicker-Free, GamePlus, and GameVisual technologies provide a comfortable gaming experience<br>'),
(43, 4, 'Acer Predator 42.5 inch 4K Ultra HD LED Backlit IPS Panel Gaming Monitor', 99999, 84999, 'acer-predator.webp', 'When it comes to 4K, bigger is always better - about 43 inches of better, to be exact.<br>\r\nBut the CG437K P offers much, much more! Get hyper with a 144Hz refresh rate and 1ms Visual Response Boost (VRB) on a VESA Certified DISPLAYHDR 1000 large format gaming display.<br>Let the games begin.'),
(44, 4, 'GIGABYTE 47.53 inch 4K Ultra HD Display Gaming Monitor', 149999, 109999, 'gigabyte-monitor.webp', 'Playing your favourite games is easy, thanks to the Gigabyte 120.726 cm (47.53) AORUS FO48U Gaming Monitor. Boasting an OLED display, this gaming monitor displays true colours.<br>\r\nWith its high resolution and rapid refresh rate, this gaming monitor provides a detailed display quality and an exceptional gaming experience.<br>\r\nIn addition, owing to its exclusive sound reinforcement techniques, this gaming monitor delivers pure and pristine sound quality and offers additional modes to personalis'),
(45, 4, 'Acer 31.5 inch Curved Full HD LED Backlit VA Panel Gaming Monitor', 19999, 14999, 'acer-monitor.webp', 'You can see the vibrant colours come to life on this Acer monitor which has a Full HD resolution of 1920 x 1080 p.<br>\r\nWith AMD FreeSync technology, you can enjoy lag-free gaming as it eliminates screen tearing.<br>\r\nIts 1500R curvature of about 80.1 cm (31.5) large FHD display offers an immersive viewing experience.<br>\r\nWith a 165 Hz of refresh rate, you can enjoy smooth gaming on this monitor.<br>'),
(46, 4, 'ZEBRONICS 32 inch Curved Full HD VA Panel 80 cm, Slim Gaming Monitor', 19999, 16999, 'zebronics-monitor.webp', 'Zebronics ZEB-AC32FHD Curved Slim Gaming LED monitor with 80cm (32) wide screen, Full HD 1920x1080, 165Hz refresh rate, Display port, HDMI, 300cd/m² bright, USB, Built in speaker and wall mountable'),
(47, 4, 'LG UltraGear 27 Inch Quad HD IPS Panel Gaming Monitor', 24999, 22999, 'lg-monitor.webp', 'You can enjoy a visually immersive experience while watching movies or playing games on the LG 27GN800 Monitor.<br>\r\nIt provides immersive Full HD visuals for gaming, movies, shows, and videos, thanks to its up to 68.58 cm (27) QHD IPS display with a resolution of up to 2560x1440p.<br> Additionally, this monitor excels in colour performance with its IPS display, ensuring a captivating viewing experience from almost any angle.<br>'),
(48, 4, 'SAMSUNG 24 inch Full HD LED Backlit VA Panel Gaming Monitor', 19999, 12999, 'samsung-monitor-lite.webp', 'Equip yourself with the Samsung Monitor and elevate your gameplay to new heights.<br>\r\nConquer enemies, explore vast virtual worlds, and emerge victorious in every battle.<br>\r\nUnleash the full potential of your gaming prowess with a monitor designed to cater to your every need.<br>\r\nStep into the future of gaming and let the Samsung Monitor be your ultimate ally in the quest for gaming domination.<br>'),
(49, 5, 'Hogwarts Legacy', 4999, 3999, 'hogwarts-legacy.webp', 'Hogwarts Legacy is a 2023 action role-playing game developed by Avalanche Software and published by Warner Bros.<br>\r\nGames under its Portkey Games label.<br>\r\nThe game, part of the Wizarding World franchise, takes place in the late 1800s, a century prior to the events chronicled in the Harry Potter novels.<br>'),
(51, 6, 'NINTENDO Switch Animal Crossing: New Horizons Edition', 29999, 27999, 'nintendo-animal-crossing.webp', 'BREAKTHROUGH READ WRITE SPEEDS: Sequential read and write performance levels of up to 3,500MB/s and 3,300MB/s, respectively; Random Read (4KB, QD32): Up to 600,000 IOPS Random Read The console is also decorated with images of recognizable characters: Tom Nook and Nooklings Timmy and Tommy Includes a Switch console, Switch dock, Joy-Con (L) and Joy-Con (R), and two Joy-Con strap accessories'),
(52, 6, 'NINTENDO Switch OLED Console with White Joy Con 64 GB with Pokemon Legends Arceus', 39999, 35999, 'nintendo-pokemon.webp', 'Nintendo Oled White Bundled With Pokémon Legends: Arceus<br>\r\nTake your gaming experience up a whole new level<br>\r\nThe new system features a vibrant 7-inch OLED screen, a wide adjustable stand, a dock with a wired LAN port, 64 GB of internal storage, and enhanced audio.<br>\r\nStudy Pokémon behaviors, sneak up on them, and toss a well-aimed Poké Ball to catch them<br>\r\nUnleash moves in the speedy agile style or the powerful strong style in battles<br>\r\nTravel to the Hisui region—the Sinnoh of old'),
(53, 6, 'Xbox Series X Console with Forza Horizon 4', 64999, 59999, 'xbox-forza-horizon.webp', 'Bundle includes: Xbox One X 1TB console, wireless controller, full-game downloads of Forza Horizon 4 and Forza motorsport 7, 1-month Xbox Live Gold subscription and 1-month Xbox game Pass trial<br>\r\nExperience dynamic seasons in a shared open-world and explore beautiful scenery in Forza Horizon 4, collect over 450 cars and become a Horizon superstar in historic Britain<br>\r\nGames play better on Xbox One X 40 percent more power than any other console, 4K Blu-ray and 4K video streaming<br>'),
(54, 6, 'Xbox Series S Console with Fortnite, Rocket League, Fall Guys ', 39999, 36999, 'xbox-fortnite.webp', 'Battle to be the last one standing in the worldwide Fortnite phenomenon; Fight in 100 player Battle Royale PVP mode on a giant map, building and destroying the environment as you go<br>\r\nEnjoy instant access to over 100 games out of the box with the included 1 Month trial of Xbox Game Pass<br>\r\nXbox One family settings let you choose privacy, screen time, and content limits for each member of your family<br>\r\nWatch 4K Blu ray movies; Stream 4K video on Netflix, Amazon, and YouTube, among others;'),
(55, 5, 'GTA V', 2499, 1799, 'gtav.webp', 'Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games.<br>\r\nIt is the seventh main entry in the Grand Theft Auto series, following 2008s Grand Theft Auto IV, and the fifteenth instalment overall.');

-- --------------------------------------------------------

--
-- Table structure for table `promo_code`
--

CREATE TABLE `promo_code` (
  `id` int(5) NOT NULL,
  `code` varchar(50) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo_code`
--

INSERT INTO `promo_code` (`id`, `code`, `rate`) VALUES
(1, 'SVET10', 10),
(5, 'VB20', 20),
(6, 'HH20', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phno` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `phno`) VALUES
(1, 'Vishwas Bhatt', 'Visu', 'Visu@1307', 'bhattvishwas7@gmail.com', 9106533108),
(3, 'harmisha bhatt', 'harmisha', '898089', 'harmishabhatt@gmail.com', 63546141101);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_USER_ID` (`uid`),
  ADD KEY `FK_PRODUCT_ID` (`pid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ORDERS_UID` (`uid`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ODETAILS_UID` (`uid`),
  ADD KEY `FK_ODETAILS_PID` (`pid`),
  ADD KEY `FK_ORDERS_ID` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CATEGORY_ID` (`category_id`);

--
-- Indexes for table `promo_code`
--
ALTER TABLE `promo_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `promo_code`
--
ALTER TABLE `promo_code`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_PRODUCT_ID` FOREIGN KEY (`pid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USER_ID` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_ORDERS_UID` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FK_ODETAILS_PID` FOREIGN KEY (`pid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ODETAILS_UID` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ORDERS_ID` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_CATEGORY_ID` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
