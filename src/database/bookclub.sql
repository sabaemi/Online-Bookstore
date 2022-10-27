-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 03:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `num` int(11) NOT NULL,
  `buyerUsername` varchar(30) NOT NULL,
  `ostan` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `buyername` varchar(200) NOT NULL,
  `addres` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`num`, `buyerUsername`, `ostan`, `city`, `buyername`, `addres`) VALUES
(3, 'saba', 'خراسان', 'مشهد', 'صبا امامی', 'سجاد6');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookCode` varchar(30) NOT NULL,
  `bookName` varchar(100) NOT NULL,
  `sellerUsername` varchar(30) NOT NULL,
  `storeName` varchar(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `translator` varchar(100) DEFAULT NULL,
  `cat` varchar(50) NOT NULL,
  `cost` varchar(50) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `publishYear` varchar(4) NOT NULL,
  `noPages` varchar(50) NOT NULL,
  `shabak` varchar(50) NOT NULL,
  `stock` varchar(50) NOT NULL,
  `about` varchar(550) NOT NULL,
  `img` varchar(100) NOT NULL,
  `pubSerial` varchar(50) NOT NULL,
  `report` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookCode`, `bookName`, `sellerUsername`, `storeName`, `author`, `translator`, `cat`, `cost`, `publisher`, `publishYear`, `noPages`, `shabak`, `stock`, `about`, `img`, `pubSerial`, `report`) VALUES
('1017', 'اثر مرکب', 'ali', 'رضوان', 'دارن هاردی', 'میلاد حیدری', 'روانشناسی', '45000', 'نگاه نوین', '1400', '237', '9786009777815', '23', 'کتاب اثر مرکب دستورالعمل‌ لازم برای موفقیت و دستیابی به اهداف و آرزو‌ها را ارائه می‌کند. نویسنده در این اثر بر این باور است موفقیت نیازمند داروی سحرآمیز یا خارق‌العاده‌ای نیست، بلکه می‌توان با اصلاح عادات و رفتار و انجام یک سری قواعد و اصول ساده به موفقیتی پایدار و همیشگی رسید. اصول مطرح شده در این کتاب بهترین ابزارهای کسب موفقیت هستند و با وجود آن‌ها رسیدن به موفقیت دیگر یک آرزو نیست.', 'https://cdn.fidibo.com/images/books/96207_10859_normal.jpg', '59', 'Fine'),
('11', 'پاکسازی ذهن', 'reza', 'مهتاب', 'استیو اسکات', 'صدف حکیمی', 'روانشناسی', '38000', 'آموخته', '1399', '170', '9786226650410', '13', 'کتاب «پاکسازی ذهن برای موفق شدن در زندگی» کتابی در حوزه روانشناسی است که با لحنی ساده و قابل ‌فهم، راهکارهایی برای خودسازی، خود راهبری و ایجاد عادت‌هایی برای مدیریت ترس، اضطراب و افکار منفی را ارائه می‌کند. خواندن این کتاب کمک می‌کند تا خواننده از آشفتگی‌های ذهنی که در زندگی آزارش می‌دهد رها شود و بتواند افکاری را که در ذهنش وجود دارد، ساماندهی کند.', 'https://cdn.fidibo.com/images/books/103824_29973_normal.jpg', '11', 'Fine'),
('12', 'چهار میثاق', 'reza', 'مهتاب', 'دون ميگوئل', 'دلارا قهرمان', 'روانشناسی', '28000', 'ذهن آویز', '1400', '116', '9789647390958', '40', 'همه‌ی انسان‌ها در زندگی خود به دنبال یافتن راهی برای بهتر زندگی کردن هستند. این روزها با افزایش زندگی ماشینی انسان‌ها زمان کمتری را برای شناخت خود برتر می‌گذارند و نقش معنویات در زندگی‌ها کمتر شده است. کتابی که پیش رودارید، یکی از نفیس‌ترین کتاب‌هایی است که در طول تاریخ سینه‌به‌سینه بین سرخپوستان تولتک دست‌به‌دست شده است و با خرد سرخپوستان هم خوانی دارد و نهایتا به دست دون میگوئل روئیز، یکی از آخرین نوادگان این قوم رسیده است و با او با انتشار کتابی این خرد راهگشا را در اختیار همگان قرار داده است. ‌', 'https://cdn.fidibo.com/images/books/67217_91322_normal.jpg', '44', 'report'),
('1201', 'عادت های اتمی', 'reza', 'مهتاب', 'جیمز کلیر', 'هادی بهمنی', 'روانشناسی', '49000', 'نشر نوین توسعه', '1400', '273', '9786008738701', '10', '۱۰ چیزی که در کتاب عادتهای اتمی یاد می گیریم: سیستمی طراحی کنیم که هر روز ۱ درصد بهتر شویم. عادت های بد را بشکنیم و به عادت های خوب بچسبیم! از اشتباهاتی اجتناب کنیم که اغلب افراد، موقع تغییر عادات شان مرتکب می شوند. بر نبودِ انگیزه و اراده غلبه کنیم. هویت قوی تری را توسعه دهیم و به خودمان اعتقاد داشته باشیم. برای عادت های جدید وقت بگذاریم (حتی وقتی زندگی با ما سر ناسازگاری دارد). محیط مان را طوری طراحی کنیم که در آن موفقیت آسان تر باشد. تغییرات کوچک و ساده ای ایجاد کنیم که نتایج بزرگی به همراه دارند.', 'https://cdn.fidibo.com/images/books/99791_82810_normal.jpg', '1400', 'Fine'),
('1265', 'شازده کوچولو', 'ali', 'رضوان', 'انتوان اگزوپری', 'احمد شاملو', 'رمان', '30000', 'نگاه', '1400', '103', '9789643510131', '18', 'شازده کوچولو داستان تقریبا کوتاهی است که اتفاقات شگفت‌انگیز آن گاه رنگ و بوی فلسفی به خود می‌گیرد. فلسفه‌ای از جنس سادگی یک کودک که به زبان ساده و خیال‌انگیز توصیف می‌شود. در سال ۲۰۰۷ شازده کوچولو به عنوان کتاب سال فرانسه برگزیده شد و از زمان انتشار تا امروز به بیش‌از 300 زبان ترجمه شده است. از داستان شازده کوچولو چند اقتباس در سینما وجود دارد که جدیدترین آن در سال 2015 منتشر شد.', 'https://cdn.fidibo.com/images/books/88128_62041_normal.jpg', '60', 'Fine'),
('158', 'عقاید یک دلقک', 'ali', 'رضوان', 'هاینریش بل', 'محمد اسماعیل زاده', 'رمان', '60000', 'چشمه', '1400', '300', '9789645571762', '21', '«هاینریش بل» بابیان لحظات تلخ و ناامیدکننده‌ی زندگی یک جوان در روزگار پس از جنگ جامعه کاتولیک را نقد می‌کند و تعارضات بین کاتولیک‌ها و پروتستان‌ها را نشان می‌دهد. او در این اثر اوضاع‌واحوال اجتماعی جامعه‌ی آلمان را نقد می‌کند و روایتگر زندگی غمگین فردی است که از جامعه طرد می‌شود. «هانس شنیر» به‌صورت کاملاً بیگانه با جامعه‌ی خود درمی‌آید و اوضاع سیاسی، اجتماعی و دینی را نقد می‌کند و علیه آن‌ها اعتراض می‌کند. او از یک زندگی پرمعنا و راستین و فارغ از هرگونه تأثیر خرافات و سنت دفاع می‌کند.', 'https://cdn.fidibo.com/images/books/86104_42858_normal.jpg', '61', 'Fine'),
('19', 'والدین سمی', 'ali', 'رضوان', 'سوزان فوروارد', 'مینا فتحی', 'روانشناسی', '54000', 'لیوسا', '1400', '271', '9786003400955', '20', 'سامانه‌ی تربیتی والدین مجموعه‌ای از باورها و رفتارهای آن‌هاست. بر اساس این باورهاست که میزان آزادی کودکان و نحوه‌ی کنترل ان‌ها ذر خانواده تعیین می‌شود. این سامانه‌ی تربیتی با تاثیر از بافت فرهنگی خانواده از خانواده‌ای به خانواده‌ی دیگر تغییر می‌کند. سبک زندگی به بیان ساده، شیوه‌ی زندگی و بر اساس الگوهای رفتاری شامل جهان‌بینی، ارزش‌ها و عادات است. خانواده اولین محیطی است که می‌توان سبک زندگی را در میان اعضای آن مشاهده کرد و تعارض میان آن‌ها را تشخیص داد.', 'https://cdn.fidibo.com/images/books/81977_90826_normal.jpg', '20', 'Fine'),
('2', 'مزرعه حیوانات', 'mahsa', 'افق', 'جورج ارول', 'احمد کسایی', 'رمان', '17000', 'ماهی', '1400', '152', '9789642091935', '9', 'داستان کتاب مزرعه‌ی حیوانات درباره‌ی گروهی از حیوانات اهلی مزرعه‌ای است که به امید برقرار کردن آزادی و برابری در مقابل صاحب مزرعه شورش می‌کنند و هدایت آنجا را خود به دست می‌گیرند. بعد از پیروزی این انقلاب، خوک‌ها که ظاهرا از باقی حیوانات باهوش‌تر هستند، رهبر مزرعه را به عهده می‌گیرند و قوانینی را وضع می‌کنند. این قوانین اما در طول داستان دچار تغییراتی می‌شوند و سیر داستان را رقم می‌زنند. ‌', 'https://cdn.fidibo.com/images/books/82098_82639_normal.jpg', '27', 'Fine'),
('21', 'نیروی حال', 'reza', 'مهتاب', 'اکهارت توله', 'مسیحا برزگر', 'روانشناسی', '58000', 'ذهن آویز', '1399', '352', '9786005219463', '16', 'بسیاری از ما بیشتر عمرمان را در زندان افکار محدود‌کننده خود می‌گذرانیم. ما هرگز قدم از محدوده تنگ و تاریکی که توسط ذهن خود ساخته‌ایم بیرون نمی‌گذاریم و اسیر شخصیتی خود‌ساخته که از گذشته‌ها تأثیر می‌گیرد هستیم. شخصیتی که آن را به اشتباه «من» می‌نامیم. در تو هم مانند تمام افراد بشر، بُـعدی از آگاهی وجود دارد که بسیار ژرف‌تر از افکارت است. بُـعدی که خودِ واقعی تو است و می‌توان آن را حضور، آگاهی یا شعور مطلق نامید. بعضی از تعالیم باستانی آن را مسیحِ درون یا ذاتِ بودایی تو نامیده‌اند.', 'https://cdn.fidibo.com/images/books/67250_11787_normal.jpg', '21', 'Fine'),
('30', 'هنر خوب زندگی کردن', 'reza', 'مهتاب', 'رولف دوبلی', 'عادل فردوسی پور', 'روانشناسی', '44000', 'چشمه', '1399', '249', '9786220100317', '12', 'درست و خوب زندگی کردن نیاز به مهارت و توانایی‌های زیادی دارد و مستلزم پیروی از یک سری اصول است.  «رولف دوبلی» در طی سال‌های اخیر درزمینه‌ی انتشار آثار روانشناسی و خودشناسی مشغول به فعالیت بوده است، او بر این باور است خوب زندگی کردن به‌وسیله‌ی ابزارهای ذهنی امکان‌پذیر است. او آموزه‌هایش در ارتباط با بهتر زندگی کردن را طی پنجاه‌ودو فصل کوتاه توضیح داده است و درباره‌ی آن‌ها گفته است: «این پنجاه‌ودو ابزار ذهنی شاید رسیدن به زندگی خوب را تضمین نکند، اما این فرصت را به شما می‌دهد تا برای رسیدن به آن مبارزه کنید.»', 'https://cdn.fidibo.com/images/books/112762_96968_normal.jpg', '12', 'Fine'),
('32', 'جزء از کل', 'mahsa', 'افق', 'استیو تولتز', 'پیمان خاکسار', 'رمان', '160000', 'چشمه', '1400', '656', '9786002295002', '15', '«مارتین دین» و «تری دین» دو برادر اهل استرالیا هستند. «تری» در کودکی به یکی از محبوب‌ترین شخصیت‌های ورزشی استرالیا تبدیل می‌شود و همگان را تحت تأثیر خود قرار می‌دهد و نفر اول رسانه‌ها می‌شود. این پسر کنجکاو و پرشور برادری به نام «مارتین دین» دارد که در بستر بیماری است و زندگی نباتی دارد. زندگی «تری» با وجود افتخارات بسیار ناگهان دستخوش تغییرات زیادی می‌شود و تبهکار خطرناکی را ملاقات می‌کند. ملاقات آن‌ها و بازگشت «مارتین دین» به زندگی پس از چهار سال از کما داستان کتاب صوتی جز از کل را شکل می‌دهد.', 'https://cdn.fidibo.com/images/books/103275_22276_normal.jpg', '68', 'Fine'),
('325', 'پدر پولدار پدر فقیر', 'reza', 'مهتاب', 'رابرت کیوساکی', 'هنگامه خدابنده', 'روانشناسی', '38000', 'ترانه', '1400', '252', '9789645638847', '32', 'کتاب «پدر پولدار پدر فقیر» اثر «رابرت کیوساکی» شامل نه فصل است و نویسنده مطالب آن را با زبانی ساده و قابل‌فهم بیان می‌کند. فصل‌های این کتاب عبارت‌اند از «پول دار برای پول کار نمی‌کنه»، «چرا داشتن سواد مالی ضروریه»، «روی شغلتون تمرکز کنین»، «تاریخ مالیات‌ها و قدرت شرکت‌ها»، «پول دارها، سرمایه‌گذاری می‌کنن»، «برای آموختن کار کنین، نه برای پول»، «غلبه کردن بر موانع»، «استارت زدن» و «باز هم بیشتر می‌خواین؟».', 'https://cdn.fidibo.com/images/books/93755_66547_normal.jpg', '13', 'Fine'),
('33654', 'مغازه خودکشی', 'mahsa', 'افق', 'ژان تولی', 'احسان کرم ویسی', 'رمان', '38000', 'چشمه', '1399', '114', '9786002298812', '14', 'در شهری نامعلوم در دوره‌ای آخرالزمانی، خانواده‌ی تواچ نسل در نسل با افتخار مشغول تجارتی پرمتقاضی هستند؛ آن‌ها با راهنمایی مشتریان‌نشان در انتخاب ابزارآلات خودکشی، شعار خانوادگی‌شان را عملی می‌کنند: «آیا در زندگی شکست خورده‌اید؟ لااقل در مرگتان موفق باشید». همه‌چیز در این خانواده با مرگ گره خورده است. هرچه‌قدر فرزندان خانواده بیشتر به استقبال مرگ می‌روند، بیشتر از طرف والدینشان تشویق می‌شوند. انحطاط، روان‌پریشی، غم و گمگشتگی  مردم شهر به رونق روزافزون کسب‌وکار این خانواده دامن می‌زند، تا این‌که تولد فرزند سوم خانواده همه چیز را برهم‌ می‌زند.', 'https://cdn.fidibo.com/images/books/92139_92067_normal.jpg', '38', 'Fine'),
('35', 'قمارباز', 'mahsa', 'افق', 'فیودور داستایوسکی', 'سروش حبیبی', 'رمان', '45000', 'چشمه', '1400', '215', '9786002291820', '16', '«قمارباز» بیانی از سبک زندگی و مقایسه‌ی بین دوطبقه‌ی بورژوا و اشراف با طبقه‌ی دهقان و مردم پایین‌دست است که به قلم یکی از شاهکارترین نویسندگان تاریخ ادبیات روسیه «فیودور داستایوسکی» به نگارش درآمده است. اشرافی که زمان و سرمایه خودشان را به بطالت و هرزگی می‌گذرانند و به ادب و رفتار اشرافی و بالا مقام تظاهر می‌کنند و این در حالی است که حتی اگر ورشکست هم شوند این رویه را ادامه می‌دهند.', 'https://cdn.fidibo.com/images/books/82077_34092_normal.jpg', '26', 'Fine'),
('40', 'دانش تمرکز قدرتمند', 'mahsa', 'افق', 'پیتر هالینز', 'فرشید نادری', 'روانشناسی', '40000', 'نگاه نوین', '1400', '102', '9786005026440', '12', 'زمانی که به کلمه انضباط فکر می‌کنید، چه چیزی به ذهن‌تان می‌رسد؟ احتمال دارد به چیزی منفی فکر کنید – مثل لگد خوردن و یا فرستاده شدن به اتاق‌تان زمانی که بچه بودید یا حتی گرفتن یک هشدار برای تخلف در محل کار. بیشتر افراد فکر می‌کنند که انضباط یک نوع مجازات است، اما در واقع به معنای تمریناتی به منظور اصلاح، بهبود یا رفع نواقص روحی یا اخلاقی یک فرد می‌باشد. درست است، بسیاری از پدر و مادرها این نتایج را از طریق تنبیه‌های مختلف بدست می‌آورند، بنابراین اینکه از آن حس منفی بگیرید، پیش زمینه دارد.', 'https://cdn.fidibo.com/images/books/119147_32979_normal.jpg', '10', 'Fine'),
('44', 'هزار و یک شب', 'mahsa', 'افق', 'عبداللطیف طسوجی', 'ندارد', 'رمان', '45000', 'پارسه', '1399', '1389', '9786005026030', '11', 'شاه زمان ترک پادشاهی کرده و راهی دیار برادر می‌شود و شهریار هم به انتقام خیانت همسرش هر شب دختری را به نکاح در می‌آورد و بامداد دستور قتلش را می‌داد . تا اینکه دیگر دختری در شهر نمی‌ماند و وزیر شهریار که دو دختر به نام‌های شهرزاد و دنیا زاد داشت و به شدت نگران این قضیه بود به پیشنهاد شهرزاد وی را به عقد پادشاه درمی‌آورد. شهرزاد همان شب به شهریار می‌گوید که خواهری دارد که هر شب با قصه‌های او به خواب می‌رود و درخواست می‌کند که همان شب خواهرش را به قصر بیاورند تا برای بار آخر برایش قصه بگوید .', 'https://cdn.fidibo.com/images/books/110472_85468_normal.jpg', '10', 'Fine'),
('516', 'سینوهه', 'mahsa', 'افق', 'میکا والتری', 'ذبیح منصوری', 'رمان', '245000', 'زرین', '1398', '989', '9789644071744', '18', 'سینوهه پزشک مخصوص فرعون روایت مردی در دربار «آخناتون» است. والتاری این کتاب را از زبان سینوهه نوشته است و در آن به تمام جنبه‌های زندگی مردم مصر پرداخته‌شده است. درباره‌ی اینکه سینوهه شخصیتی واقعی است یا نه شک زیادی وجود دارد. با وجود اینکه آثاری از حضور او در تاریخ مصر وجود دارد درباره‌ی زمان زندگی او و پیشه‌اش اطلاعات دقیقی در دست نیست. سال 1954 بر اساس این کتاب فیلمی ساخته شد که با استقبال مخاطبان مواجه شد. فیلم این فیلم داستان سینوهه را در جوانی روایت می‌کند و از بسیاری از جزئیات کتاب چشم‌پوشی کرده است.', 'https://cdn.fidibo.com/images/books/93490_39523_normal.jpg', '71', 'Fine'),
('88', 'چشم هایش', 'reza', 'مهتاب', 'بزرگ علوی', 'ندارد', 'رمان', '53000', 'نگاه', '1399', '269', '9789646736597', '0', 'کتاب چشمهایش از زبان یک ناظم – که بعد از مرگ مشکوک استاد ماکان در مدرسه به عنوان ناظم مشغول به کار است- که در یک موزه هنری مسئولیت بازجویی از زنی را برعهده دارد نوشته شده است. ناظم نیز از همان زن به نام فرنگیس وقایعی را نقل قول می کند. این رمان را می توان از آغازین نوشته های ادبی دانست که با محوریت قرار دادن یک زن و به تصویر کشیدن عواطف و احساسات وی، یک فضای سیاسی و وجود خفقان در جامعه را در دوران رضا شاه به تصویر می‌کشد.', 'https://cdn.fidibo.com/images/books/927_86386_normal.jpg', '48', 'Fine'),
('8896', 'مردی به نام اوه', 'mahsa', 'افق', 'فردریک بکمن', 'الناز فرحناکیان', 'رمان', '60000', 'چشمه', '1399', '214', '9786002258812', '10', 'داستان مردی به نام اوه زندگی پیرمرد 59 ساله ای را به تصویر کشیده است که به علت کهولت سن از محل کارش اخراج شده و چند سالی است به عنوان مدیر محله تمام فعالیت های محله را زیر نظر دارد تا همه چیز به نحو احسن پیش برود. همسایه ها این پیرمرد را به عنوان یک مرد خشن و عبوس می شناسند چرا که همیشه اوه با همسایه ها به دلیل رعایت نکردن نظم و یا آوردن ماشین اضافه داخل محل بحث می کند.', 'https://cdn.fidibo.com/images/books/64664_53966_normal.jpg', '25', 'Fine'),
('998', 'چهار اثر فلورانس', 'reza', 'مهتاب', 'فلورانس اسکاول', 'گیتی خوشدل', 'روانشناسی', '75000', 'پیکان', '1395', '376', '9789643283377', '5', '«فلورانس اسکاول شین» در کتاب صوتی «چهار اثر» قانون کارما و قانون بخشایش را توضیح می‌دهد و درباره‌ی اثرگذاری بر ذهن هوشیار صحبت می‌کند. این نویسنده بابیان سلیس و شیوا طرح الهی زندگی که شامل ثروت، سلامت، عشق و ابراز کامل وجود است، را در این کتاب مطرح می‌کند. در بخش‌هایی از کتاب عبارات تأییدی وجود دارد که خواننده می‌تواند با تکرار و تمرکز بر آن‌ها دوستی، ایمان، آشتی، مهر و محبت را ملکه‌ی ذهنش قرار بدهد و تأثیر آن‌ها را بر زندگی‌اش ببیند.', 'https://cdn.fidibo.com/images/books/89636_57574_normal.jpg', '60', 'Fine');

-- --------------------------------------------------------

--
-- Table structure for table `bookreq`
--

CREATE TABLE `bookreq` (
  `buyerUsername` varchar(30) NOT NULL,
  `bookCode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookreq`
--

INSERT INTO `bookreq` (`buyerUsername`, `bookCode`) VALUES
('saba', '88');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `YearOfBirth` varchar(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `userType` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`firstName`, `lastName`, `YearOfBirth`, `username`, `userType`) VALUES
('حسین', 'کمالی', '1380', 'hosein', 'B'),
('منا', 'امامی', '1375', 'mona', 'B'),
('صبا', 'امامی', '1378', 'saba', 'B'),
('ادمین', 'ادمین', '1400', 'admin', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `buyerUsername` varchar(30) NOT NULL,
  `bookCode` varchar(30) NOT NULL,
  `oDate` date NOT NULL,
  `bookName` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `sellerUsername` varchar(30) NOT NULL,
  `cost` varchar(50) NOT NULL,
  `numOrder` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`buyerUsername`, `bookCode`, `oDate`, `bookName`, `img`, `sellerUsername`, `cost`, `numOrder`) VALUES
('saba', '1201', '2021-08-31', 'عادت های اتمی', 'https://cdn.fidibo.com/images/books/99791_82810_normal.jpg', 'reza', '49000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `likedbooks`
--

CREATE TABLE `likedbooks` (
  `buyerUsername` varchar(30) NOT NULL,
  `bookCode` varchar(30) NOT NULL,
  `addDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likedbooks`
--

INSERT INTO `likedbooks` (`buyerUsername`, `bookCode`, `addDate`) VALUES
('hosein', '11', '2021-08-29'),
('hosein', '32', '2021-08-29'),
('hosein', '1017', '2021-08-29'),
('mona', '21', '2021-08-29'),
('mona', '1201', '2021-08-29'),
('mona', '40', '2021-08-29'),
('mona', '325', '2021-08-29'),
('mona', '30', '2021-08-29'),
('saba', '32', '2021-08-31'),
('saba', '40', '2021-08-31'),
('saba', '158', '2021-08-31'),
('saba', '2', '2021-08-31'),
('saba', '1265', '2021-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `questionslist`
--

CREATE TABLE `questionslist` (
  `question` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `answer` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questionslist`
--

INSERT INTO `questionslist` (`question`, `username`, `answer`) VALUES
('ftn', 'ali', 'مرتضوی'),
('ftn', 'reza', 'ثروتی'),
('color', 'mahsa', 'بنفش'),
('ftn', 'hosein', 'کمال'),
('color', 'zomi', 'سفید'),
('ftn', 'mona', 'امینی'),
('color', 'ali', 'بنفش'),
('color', 'saba', 'سبز'),
('color', 'admin', 'ابی');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `storeName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `storeCode` varchar(50) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `userType` char(1) NOT NULL,
  `checkType` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`storeName`, `firstName`, `lastName`, `storeCode`, `adress`, `username`, `userType`, `checkType`) VALUES
('افق', 'مهسا', 'بیات', '559912', 'مشهد،فلسطین', 'mahsa', 'S', 'ok'),
('رضوان', 'علی', 'حقیقی', '9621', 'مشهد،سجاد', 'ali', 'S', 'ok'),
('زمرد', 'زمرد', 'سعادت', '68941', 'تهران،ازادی', 'zomi', 'S', 'Checking'),
('مهتاب', 'رضا', 'شفیعی', '556398', 'مشهد،سعدی', 'reza', 'S', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `sold`
--

CREATE TABLE `sold` (
  `sellerUsername` varchar(30) NOT NULL,
  `cost` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sold`
--

INSERT INTO `sold` (`sellerUsername`, `cost`) VALUES
('mahsa', '17000'),
('ali', '45000');

-- --------------------------------------------------------

--
-- Table structure for table `soldcart`
--

CREATE TABLE `soldcart` (
  `num` int(11) NOT NULL,
  `buyerUsername` varchar(30) NOT NULL,
  `bookCode` varchar(30) NOT NULL,
  `numOrder` varchar(50) NOT NULL,
  `oDate` date NOT NULL,
  `bDate` date NOT NULL,
  `bookName` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `sellerUsername` varchar(30) NOT NULL,
  `cost` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soldcart`
--

INSERT INTO `soldcart` (`num`, `buyerUsername`, `bookCode`, `numOrder`, `oDate`, `bDate`, `bookName`, `img`, `sellerUsername`, `cost`) VALUES
(4, 'saba', '2', '1', '2021-08-31', '2021-08-31', 'مزرعه حیوانات', 'https://cdn.fidibo.com/images/books/82098_82639_normal.jpg', 'mahsa', '17000'),
(5, 'saba', '1017', '1', '2021-08-31', '2021-08-31', 'اثر مرکب', 'https://cdn.fidibo.com/images/books/96207_10859_normal.jpg', 'ali', '45000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `userType` char(1) NOT NULL
) ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `pass`, `email`, `userType`) VALUES
('admin', 'adminadmin99', 'admin@gmail.com', 'B'),
('ali', 'ali56789', 'ali@gmail.com', 'S'),
('hosein', 'hosein80', 'hos@gmail.com', 'B'),
('mahsa', 'mahsamahsa66', 'mahsa@gmail.com', 'S'),
('mona', 'mn445588', 'mona@gmail.com', 'B'),
('reza', 'rezareza55', 'reza@gmail.com', 'S'),
('saba', 'sabas2255', 'saba.em9@gmail.com', 'B'),
('zomi', 'zomizomi98', 'zom@gmail.com', 'S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`num`),
  ADD KEY `buyerUsername` (`buyerUsername`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookCode`,`bookName`,`img`,`cost`),
  ADD KEY `sellerUsername` (`sellerUsername`),
  ADD KEY `storeName` (`storeName`);

--
-- Indexes for table `bookreq`
--
ALTER TABLE `bookreq`
  ADD KEY `buyerUsername` (`buyerUsername`),
  ADD KEY `bookCode` (`bookCode`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD KEY `username` (`username`,`userType`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `sellerUsername` (`sellerUsername`),
  ADD KEY `bookCode` (`bookCode`,`bookName`,`img`,`cost`),
  ADD KEY `buyerUsername` (`buyerUsername`);

--
-- Indexes for table `likedbooks`
--
ALTER TABLE `likedbooks`
  ADD KEY `buyerUsername` (`buyerUsername`),
  ADD KEY `bookCode` (`bookCode`);

--
-- Indexes for table `questionslist`
--
ALTER TABLE `questionslist`
  ADD KEY `username` (`username`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`storeName`),
  ADD KEY `username` (`username`,`userType`);

--
-- Indexes for table `sold`
--
ALTER TABLE `sold`
  ADD KEY `sellerUsername` (`sellerUsername`);

--
-- Indexes for table `soldcart`
--
ALTER TABLE `soldcart`
  ADD PRIMARY KEY (`num`),
  ADD KEY `sellerUsername` (`sellerUsername`),
  ADD KEY `bookCode` (`bookCode`,`bookName`,`img`,`cost`),
  ADD KEY `buyerUsername` (`buyerUsername`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`,`userType`,`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `soldcart`
--
ALTER TABLE `soldcart`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`buyerUsername`) REFERENCES `buyer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`sellerUsername`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`storeName`) REFERENCES `seller` (`storeName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookreq`
--
ALTER TABLE `bookreq`
  ADD CONSTRAINT `bookreq_ibfk_1` FOREIGN KEY (`buyerUsername`) REFERENCES `buyer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookreq_ibfk_2` FOREIGN KEY (`bookCode`) REFERENCES `book` (`bookCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `buyer_ibfk_1` FOREIGN KEY (`username`,`userType`) REFERENCES `user` (`username`, `userType`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`sellerUsername`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`bookCode`,`bookName`,`img`,`cost`) REFERENCES `book` (`bookCode`, `bookName`, `img`, `cost`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`buyerUsername`) REFERENCES `buyer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likedbooks`
--
ALTER TABLE `likedbooks`
  ADD CONSTRAINT `likedbooks_ibfk_1` FOREIGN KEY (`buyerUsername`) REFERENCES `buyer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likedbooks_ibfk_2` FOREIGN KEY (`bookCode`) REFERENCES `book` (`bookCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questionslist`
--
ALTER TABLE `questionslist`
  ADD CONSTRAINT `questionslist_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `seller_ibfk_1` FOREIGN KEY (`username`,`userType`) REFERENCES `user` (`username`, `userType`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sold`
--
ALTER TABLE `sold`
  ADD CONSTRAINT `sold_ibfk_1` FOREIGN KEY (`sellerUsername`) REFERENCES `seller` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soldcart`
--
ALTER TABLE `soldcart`
  ADD CONSTRAINT `soldcart_ibfk_1` FOREIGN KEY (`sellerUsername`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `soldcart_ibfk_2` FOREIGN KEY (`bookCode`,`bookName`,`img`,`cost`) REFERENCES `book` (`bookCode`, `bookName`, `img`, `cost`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `soldcart_ibfk_3` FOREIGN KEY (`buyerUsername`) REFERENCES `buyer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
