<?php
session_start();

// آرایه جامع و تخصصی اطلاعات سخت‌افزاری
$hardware_details = [
    'cpu' => [
        'title' => 'پردازنده مرکزی (CPU - Central Processing Unit)',
        'specs' => 'Microarchitecture, Cores/Threads, L1/L2/L3 Cache, Clock Speed, TDP, IPC',
        'description' => 'واحد پردازش مرکزی یا CPU، مغز متفکر و هسته اصلی محاسباتی در یک سیستم کامپیوتری است. وظیفه اصلی این قطعه، دریافت دستورالعمل‌ها از حافظه رم، رمزگشایی (Decode) آن‌ها و اجرای عملیات‌های ریاضی، منطقی و کنترل ورودی/خروجی است. فرکانس پردازنده (Clock Speed) بر حسب گیگاهرتز، نشان‌دهنده تعداد چرخه‌های کاری است که پردازنده در یک ثانیه انجام می‌دهد. با این حال، قدرت واقعی یک CPU صرفاً به فرکانس آن بستگی ندارد، بلکه شاخص IPC (تعداد دستورالعمل در هر چرخه) و نوع ریزمعماری (Microarchitecture) آن تعیین‌کننده نهایی سرعت هستند.<br><br>در ساختار سی‌پیوهای مدرن، مفهوم هسته‌های فیزیکی (Cores) و رشته‌های منطقی (Threads) نقشی کلیدی در پردازش موازی دارند. تکنولوژی‌هایی مانند Hyper-Threading به هر هسته فیزیکی اجازه می‌دهند تا دو رشته پردازشی را به صورت همزمان مدیریت کند. عامل حیاتی دیگر، حافظه پنهان یا کش (Cache) است که در سه سطح L1 (سریع‌ترین و کم‌حجم‌ترین)، L2 و L3 (حجیم‌تر و مشترک بین هسته‌ها) طراحی می‌شود. کش با ذخیره داده‌های پرمصرف، فاصله زمانی بزرگ میان سرعت فوق‌العاده پردازنده و سرعت پایین‌تر رم را پر می‌کند. همچنین شاخص TDP (توان طراحی حرارتی) میزان گرمای تولیدی پردازنده در بار کاری کامل را نشان می‌دهد که تعیین‌کننده نوع سیستم خنک‌کننده مورد نیاز است.<br><br><strong>سیستم‌های خنک‌کننده پردازنده (CPU Coolers) و انواع آن:</strong><br>با توجه به شاخص TDP و گرمای شدیدی که پردازنده‌های مدرن در حین پردازش‌های سنگین تولید می‌کنند، استفاده از یک خنک‌کننده مناسب برای جلوگیری از پدیده گلوگاه حرارتی (Thermal Throttling) و افت کارایی قطعه کاملاً حیاتی است. خنک‌کننده‌های سی‌پی‌یو به طور کلی به دو دسته اصلی تقسیم می‌شوند:<br><br>۱. <strong>خنک‌کننده‌های بادی (Air Coolers):</strong> این سیستم‌ها شامل یک بلوک اتصال مسی یا آلومینیومی، لوله‌های انتقال حرارت (Heat Pipes) و هیت‌سینک‌های پره‌ای بزرگ هستند. مایع خاص درون لوله‌ها گرما را از پردازنده جذب کرده، به بالا منتقل می‌کند و فن با عبور جریان هوا از میان پره‌ها، هیت‌سینک را خنک می‌سازد. این کولرها طول عمر بسیار بالا، قیمت اقتصادی و امنیت بالایی (بدون ریسک نشتی) دارند.<br><br>۲. <strong>خنک‌کننده‌های مایع یا آبی (Liquid / AIO Coolers):</strong> در این سیستم‌ها، یک بلوک اختصاصی (Water Block) گرما را از پردازنده به مایع خنک‌کننده منتقل می‌کند. این مایع توسط پمپ به سمت رادیاتور هدایت شده و فن‌های متصل به رادیاتور، مایع را خنک کرده و دوباره به چرخه برمی‌گردانند. خنک‌کننده‌های آبی بازدهی حرارتی بسیار بالاتری در پردازش‌های طولانی دارند و فضای کمتری را اطراف سوکت پردازنده اشغال می‌کنند، اما قیمت بالاتر و ریسک خرابی پمپ یا نشتی دارند.',
    ],
    'gpu' => [
        'title' => 'کارت گرافیک (GPU - Graphics Processing Unit)',
        'specs' => 'Parallel Processing, CUDA/Stream Cores, VRAM (GDDR6/HBM), Ray Tracing, Memory Bus',
        'description' => 'واحد پردازش گرافیکی یا GPU، یک پردازنده اختصاصی و به شدت موازی است که برای تسریع رندرینگ تصاویر، انیمیشن‌ها، بازی‌های ویدئویی و محاسبات سنگین ریاضی (مانند پردازش‌های هوش مصنوعی و یادگیری ماشین) طراحی شده است. تفاوت ساختاری اصلی GPU با CPU در این است که CPU برای پردازش‌های ترتیبی سریع با چند هسته قدرتمند بهینه شده، اما GPU از هزاران هسته کوچک‌تر و هم‌راستا ساخته شده که می‌توانند میلیون‌ها رشته محاسباتی کوچک را به طور همزمان و موازی پردازش کنند.<br><br>در معماری کارت‌های گرافیک مدرن، اصطلاحاتی مانند هسته‌های محاسباتی (CUDA در انویدیا و Stream Processors در ای‌ام‌دی) بیانگر قدرت پردازش موازی کارت هستند. علاوه بر این، هسته‌های اختصاصی RT (برای شبیه‌سازی فیزیکی نور یا Ray Tracing) و هسته‌های هوش مصنوعی (Tensor Cores) وظایف پردازش‌های نوین را بر عهده دارند. حافظه اختصاصی کارت گرافیک یا VRAM (از نوع GDDR6 یا HBM) نقشی حیاتی در ذخیره‌سازی بافت‌ها (Textures) و فریم‌های تصویر دارد. پهنای باند حافظه (Memory Bus) که با بیت (مثلاً 256-bit یا 384-bit) سنجیده می‌شود، تعیین می‌کند که در هر ثانیه چه حجم عظیمی از داده می‌تواند بین پردازنده گرافیکی و حافظه خصیصه‌یافته منتقل شود تا از لک یا افت فریم در رزولوشن‌های بالا (مثل 4K) جلوگیری به عمل آید.'
    ],
    'motherboard' => [
        'title' => 'مادربرد (Motherboard / Mainboard)',
        'specs' => 'Chipset, VRM Phases, Form Factor (ATX), PCIe Lanes, Socket, I/O Controller',
        'description' => 'مادربرد، ستون فقرات و شاهرگ اصلی ارتباطی کامپیوتر است که تمامی قطعات سخت‌افزاری از جمله پردازنده، کارت گرافیک، رم و حافظه‌های ذخیره‌سازی به طور مستقیم یا غیرمستقیم روی آن سوار شده و با یکدیگر تبادل اطلاعات می‌کنند. قلب کنترل‌کننده مادربرد، چیپست (Chipset) نام دارد که کلاس کاری، پتانسیل اورکلاک و تعداد مسیرهای ارتباطی سیستم را مشخص می‌کند. سوکت پردازنده (مانند LGA یا AM5) نیز تعیین‌کننده نسل پردازنده‌های قابل پشتیبانی است.<br><br>یکی از تخصصی‌ترین بخش‌های مادربرد، مدار تغذیه یا VRM (واحد تنظیم ولتاژ) است. VRM وظیفه دارد ولتاژ ۱۲ ولت ورودی از منبع تغذیه را به ولتاژ دقیق و پایدار حدود ۱ تا ۱.۳ ولت مورد نیاز پردازنده تبدیل کند. تعداد فازهای قدرت (Power Phases) و کیفیت خنک‌کننده‌های روی چوک‌ها و ماسفت‌های VRM، تضمین‌کننده پایداری سیستم تحت لود سنگین و اورکلاک طولانی‌مدت هستند. فرم فاکتور مادربرد (مانند ATX, Micro-ATX, Mini-ITX) ابعاد فیزیکی و تعداد اسلات‌های توسعه آن را مشخص می‌کند. اسلات‌های PCIe Gen 5/Gen 4 مسیرهای فوق‌العاده سریعی برای کارت‌های گرافیک و حافظه‌های NVMe SSD فراهم می‌کنند که پهنای باند عظیمی را برای انتقال بی‌وقفه داده‌ها در پهنای مادربرد جاری می‌سازند.'
    ],
    'ram' => [
        'title' => 'حافظه دسترسی تصادفی (RAM - Random Access Memory)',
        'specs' => 'Volatile Memory, Frequency (MT/s), CAS Latency (CL), Dual-Channel, DDR Architecture',
        'description' => 'حافظه رم (RAM)، حافظه موقت، فرار (Volatile) و فوق‌العاده سریع سیستم است که وظیفه نگهداری داده‌های زنده و فعال سیستم‌عامل و برنامه‌های در حال اجرا را بر عهده دارد. از آنجایی که سرعت هارددیسک‌ها و حتی SSDها بسیار کمتر از سرعت پردازنده است، CPU نمی‌تواند داده‌ها را مستقیماً از آن‌ها فراخوانی کند؛ بنابراین داده‌ها ابتدا به رم منتقل می‌شوند تا پردازنده در کسری از نانوثانیه به آن‌ها دسترسی داشته باشد. با قطع جریان برق، تمام داده‌های ذخیره‌شده روی رم به طور کامل پاک می‌شوند.<br><br>مشخصات فنی رم بر اساس دو پارامتر اصلی سنجیده می‌شود: فرکانس و تایمینگ. فرکانس که امروزه در نسل‌های DDR5 بر حسب مگاترنسفر بر ثانیه (MT/s) بیان می‌شود، سرعت انتقال داده را نشان می‌دهد. تایمینگ یا CAS Latency (مانند CL16 یا CL30) نشان‌دهنده تعداد چرخه‌های تاخیری است که طول می‌کشد تا رم به دستور ارسال شده از سوی CPU پاسخ دهد (هرچه کمتر، بهتر). برای دستیابی به حداکثر کارایی، استفاده از معماری دوکاناله (Dual-Channel) با قرار دادن دو ماژول رم همسان در اسلات‌های مشخص مادربرد الزامی است، چرا که پهنای باند ارتباطی با پردازنده را دقیقاً دو برابر می‌کند و گلوگاه‌های سیستمی را در بازی‌ها و رندرهای سنگین از بین می‌برد.'
    ],
    'storage' => [
        'title' => 'حافظه ذخیره‌سازی (SSD / HDD)',
        'specs' => 'NVMe Protocol, PCIe Interface, NAND Flash (TLC/QLC), IOPS, Sequential Read/Write',
        'description' => 'حافظه ذخیره‌سازی، محل نگهداری دائمی و غیرفرار (Non-Volatile) اطلاعات از جمله سیستم‌عامل، نرم‌افزارها و فایل‌های شخصی است. دیسک‌های مکانیکی قدیمی (HDD) از پلترهای مغناطیسی چرخان و هد برای خواندن اطلاعات استفاده می‌کردند که سرعت بسیار پایینی داشتند، اما امروزه حافظه‌های حالت جامد یا SSDها به استاندارد طلایی کامپیوترها تبدیل شده‌اند. این حافظه‌ها هیچ قطعه متحرکی ندارند و داده‌ها را درون تراشه‌های سیلیکونی پیشرفته ذخیره می‌کنند.<br><br>درایوهای مدرن NVMe SSD که از رابط PCIe (مانند Gen 4 یا Gen 5) استفاده می‌کنند، سرعتی فراتر از ۷۰۰۰ مگابایت بر ثانیه ارائه می‌دهند که تا ۱۴ برابر سریع‌تر از SSDهای قدیمی SATA است. فاکتورهای تخصصی یک SSD شامل نوع سلول‌های فلش (NAND) مانند TLC (طول عمر و سرعت بالاتر) و QLC (حجم بالاتر و قیمت کمتر)، حضور حافظه کش اختصاصی DRAM (که سرعت آدرس‌دهی فایل‌ها را به شدت افزایش می‌دهد) و شاخص IOPS (تعداد عملیات ورودی/خروجی در ثانیه) است. شاخص IOPS سرعت هارد را در خواندن فایل‌های ریز و پراکنده توصیف می‌کند که عامل اصلی سرعت لودینگ و پاسخ‌دهی سریع سیستم‌عامل است. همچنین مفهوم TBW (حجم کل بایت‌های نوشته شده) میزان طول عمر و استقامت درایو را در طول سالیان مصرف مشخص می‌کند.'
    ],
    'psu' => [
        'title' => 'منبع تغذیه (PSU - Power Supply Unit)',
        'specs' => 'AC to DC Conversion, +12V Rail, 80 PLUS Efficiency, Modular, Protection Circuits',
        'description' => 'منبع تغذیه یا PSU، قلب تپنده انرژی کامپیوتر است. وظیفه اصلی این قطعه، دریافت جریان برق متناوب شهری (AC) با ولتاژ بالا و تبدیل آن به جریان‌های مستقیم (DC) تمیز، پایدار و کم‌ولتاژ (شامل ریل‌های ۱۲+ ولت، ۵+ ولت و ۳.۳+ ولت) است که قطعات الکترونیکی حساس کامپیوتر برای کارکرد به آن‌ها نیاز دارند. ریل ۱۲+ ولت مهم‌ترین بخش یک پاور مدرن است، چرا که برق اصلی قطعات پرمصرف یعنی پردازنده و کارت گرافیک را تامین می‌کند.<br><br>یکی از مهم‌ترین فاکتورهای کیفی در انتخاب پاور، استاندارد بازدهی انرژی یا گواهی 80 PLUS (شامل بسته‌های Bronze, Gold, Platinum و Titanium) است. این گواهی نشان می‌دهد که چه مقدار از برق ورودی به انرژی مفید تبدیل شده و چه مقدار به شکل گرما هدر می‌رود (پاورهای گولد معمولاً بالای ۹۰٪ راندمان دارند). از نظر مدیریت کابل، پاورها به سه دسته غیرماژولار، نیمه‌ماژولار و تمام ماژولار (Fully Modular) تقسیم می‌شوند که مدل‌های ماژولار به شما اجازه می‌دهند کابل‌های اضافی را جدا کنید تا جریان هوای داخل کیس بهبود یابد. همچنین پاورهای حرفه‌ای به سیستم‌های محافظتی چندگانه مانند OVP (محافظت در برابر ولتاژ بیش از حد)، SCP (محافظت در برابر اتصال کوتاه) و OPP (محافظت در برابر توان بیش از حد) مجهز هستند تا در صورت بروز نوسانات برقی، از سوختن قطعات گران‌قیمت سیستم جلوگیری کنند.'
    ],
    'cooling' => [
        'title' => 'سیستم خنک‌کننده (Cooling System - Air/Liquid)',
        'specs' => 'Thermal Dissipation, Liquid AIO, Heat Pipes, Static Pressure Fans, Airflow Architecture',
        'description' => 'سیستم خنک‌کننده وظیفه حیاتی دفع حرارت تولید شده توسط قطعات پرمصرف (به خصوص CPU و GPU) را بر عهده دارد تا از پدیده Thermal Throttling (کاهش خودکار فرکانس قطعه برای جلوگیری از ذوب شدن ناشی از حرارت بالا) جلوگیری کند. خنک‌کننده‌ها به طور کلی به دو دسته بادی (Air Cooling) و مایع (Liquid AIO / Custom Loop) تقسیم می‌شوند. خنک‌کننده‌های بادی از طریق لوله‌های مسی متصل به یک هیت‌سینک آلومینیومی بزرگ و به کمک فن، گرما را دفع می‌کنند. در مقابل، خنک‌کننده‌های مایع از یک بلوک آب (Water Block)، پمپ، مایع کولانت مخصوص و یک رادیاتور بزرگ برای سیکل انتقال حرارت بهره می‌برند.<br><br>برای عملکرد صحیح خنک‌کننده، استفاده از خمیر سیلیکون (Thermal Paste) با ضریب انتقال حرارت بالا جهت پر کردن منافذ میکروسکوپی هوای بین سطح پردازنده و خنک‌کننده الزامی است. فن‌های خنک‌کننده بر اساس دو شاخص سنجیده می‌شوند: Airflow (حجم هوای جابجا شده بر حسب CFM) و Static Pressure (فشار استاتیک که برای عبور دادن هوا از میان پره‌های متراکم رادیاتورها حیاتی است). ساختار کلی خنک‌سازی سیستم بر پایه اصول جریان هوا (Airflow Architecture) شکل می‌گیرد؛ به این صورت که فن‌های جلوی کیس هوای خنک را وارد کرده (Intake) و فن‌های سقف و پشت کیس هوای داغ صعودکرده را به بیرون هدایت می‌کنند (Exhaust) تا تعادل فشار هوای مثبت یا منفی درون کیس حفظ شود.'
    ]
];

$db_file = 'articles.json';

$default_articles = [
    // تصویر پردازنده برای مقاله اول (pic2)، گرافیک برای مقاله دوم (pic1) و رم برای مقاله سوم (pic3)
    ["id" => 1, "title" => "راهنمای خرید پردازنده (CPU) بلاخره Intel یا AMD؟", "image" => "pic2.png?v=2", "desc" => "در سال 2026 انتخاب بین اینتل و AMD سخت‌تر شده است...", "content" => "در سال 2026 انتخاب بین اینتل و AMD سخت‌تر شده است. پردازنده‌های سری Ultra اینتل با مصرف بهینه‌تر وارد بازار شده‌اند و AMD با رایزن‌های سری 9000 قدرت پردازشی را به سطح جدیدی برده است.", "author" => "آرش", "date" => "16 خرداد 2585"],
    ["id" => 2, "title" => "غول جدید انویدیا RTX 5090! با ما همراه باشید.", "image" => "pic1.png?v=2", "desc" => "کارت گرافیک RTX 5090 پرچمدار جدید انویدیا است که...", "content" => "کارت گرافیک RTX 5090 پرچمدار جدید انویدیا است که با لیتوگرافی جدید و معماری Blackwell عرضه شده است. این کارت دارای 32 گیگابایت حافظه GDDR7 است.", "author" => "آرش", "date" => "16 خرداد 2585"],
    ["id" => 3, "title" => "تفاوت رم‌های DDR4 و DDR5. آیا ارتقا ارزش دارد؟", "image" => "pic3.png?v=2", "desc" => "رم‌های DDR5 حالا به بلوغ رسیده‌اند و با سرعت‌های بالا...", "content" => "رم‌های DDR5 حالا به بلوغ رسیده‌اند و با سرعت‌های بالای 8000 مگاهرتز در دسترس هستند. تفاوت اصلی در پهنای باند و مدیریت انرژی است.", "author" => "آرش", "date" => "16 خرداد 2585"]
];

if (!file_exists($db_file)) file_put_contents($db_file, json_encode([]));
$json_articles = json_decode(file_get_contents($db_file), true);
if (!is_array($json_articles)) $json_articles = [];
$articles = array_merge($json_articles, $default_articles);

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$msg = ""; $err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    if ($_POST['action'] == 'register') {
        $email = trim($_POST['email']); $pass = $_POST['pass'];
        $user_data = trim($_POST['fname']) . "|" . trim($_POST['lname']) . "|" . $email . "|" . password_hash($pass, PASSWORD_DEFAULT) . PHP_EOL;
        // امنیت: اضافه کردن قفل فایل LOCK_EX
        file_put_contents("users_list.txt", $user_data, FILE_APPEND | LOCK_EX);
        $msg = "ثبت‌نام موفقیت‌آمیز بود! وارد شوید.";
        $page = 'login';
    } 
    elseif ($_POST['action'] == 'login') {
        $email = trim($_POST['email']); $pass = $_POST['pass'];
        if ($email === "Administrator@llh.com" && $pass === "SuperAdmin2026") {
            $_SESSION['user_name'] = "مدیر کل سیستم"; $_SESSION['user_email'] = $email;
            $_SESSION['is_superadmin'] = true; $_SESSION['is_admin'] = true;
            header("Location: ?page=account"); exit;
        } else if (file_exists("users_list.txt")) {
            $users = file("users_list.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($users as $user) {
                $data = explode("|", $user);
                if (trim($data[2]) === $email && password_verify($pass, trim($data[3]))) {
                    $_SESSION['user_name'] = $data[0] . " " . $data[1]; $_SESSION['user_email'] = $data[2];
                    if (!isset($_SESSION['is_admin'])) $_SESSION['is_admin'] = false;
                    header("Location: ?page=account"); exit;
                }
            }
            $err = "ایمیل یا رمز عبور اشتباه است.";
        }
    } 
    elseif ($_POST['action'] == 'admin_login') {
        if (trim($_POST['admin_pass']) === "LLHAdmin2026") { $_SESSION['is_admin'] = true; } 
        else { $err = "رمز عبور ادمین نادرست است!"; }
    }
    elseif ($_POST['action'] == 'add_article') {
        $new_article = ["id" => time(), "title" => htmlspecialchars($_POST['title']), "image" => htmlspecialchars($_POST['image']), "desc" => htmlspecialchars($_POST['desc']), "content" => htmlspecialchars($_POST['content']), "author" => $_SESSION['user_name'], "date" => "امروز"];
        array_unshift($json_articles, $new_article);
        file_put_contents($db_file, json_encode($json_articles, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        $msg = "مقاله با موفقیت ثبت شد!";
        $articles = array_merge($json_articles, $default_articles);
    }
    elseif ($_POST['action'] == 'change_pass') {
        if (!isset($_SESSION['is_superadmin']) && file_exists("users_list.txt")) {
            $lines = file("users_list.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $out = []; $changed = false;
            foreach ($lines as $line) {
                $data = explode("|", $line);
                if (trim($data[2]) === $_SESSION['user_email'] && password_verify($_POST['old_pass'], trim($data[3]))) {
                    $data[3] = password_hash($_POST['new_pass'], PASSWORD_DEFAULT); $changed = true;
                }
                $out[] = implode("|", $data);
            }
            if ($changed) { file_put_contents("users_list.txt", implode(PHP_EOL, $out) . PHP_EOL); $msg = "رمز عبور با موفقیت تغییر کرد."; } 
            else { $err = "رمز عبور فعلی اشتباه است."; }
        } else { $err = "مدیر کل مجاز به تغییر این فرم نیست."; }
    }
}

// امنیت: افزودن بررسی وضعیت ادمین به بخش حذف مقاله
if (isset($_GET['delete']) && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true) {
    $id_del = intval($_GET['delete']);
    $json_articles = array_filter($json_articles, function($a) use ($id_del) { return $a['id'] != $id_del; });
    file_put_contents($db_file, json_encode(array_values($json_articles), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    header("Location: ?page=admin"); exit;
}
if ($page == 'logout') { session_destroy(); header("Location: index.php"); exit; }
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lets Learn Hardware</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet">
</head>
<body>

<header class="glass-header">
    <button id="theme-toggle" class="btn-icon"><i class="fas fa-moon"></i></button>
    <div class="logo-area" dir="ltr">
        <a href="index.php">
            <img src="logo.png" alt="LLH Logo" class="site-logo">
            <h1 class="brand-name" style="margin: 0; padding-left: 8px; display: block;">
    <?php if($page == 'account'): ?><span class="highlight">LLH</span> <span class="text-purple">Account</span>
    <?php elseif($page == 'help'): ?><span class="highlight">LLH</span> <span class="text-purple">Help</span>
    <?php elseif($page == 'tools'): ?><span class="text-purple">LLH</span> <span class="text-orange">Tools</span>
    <?php elseif($page == 'hardware' || $page == 'component'): ?><span class="text-purple">LLH</span> <span class="text-orange">PC Case</span>
    <?php elseif($page == 'articles' || $page == 'article-view'): ?><span class="text-purple">LLH</span> <span class="text-orange">Articles</span>
    <?php else: ?>
        <span class="highlight">L</span>ets&nbsp;<span class="text-purple">L</span>earn&nbsp;<span class="text-orange">H</span>ardware
    <?php endif; ?>
</h1>
        </a>
    </div>
    
    <div class="menu-container">
        <button id="menu-btn" class="btn-icon"><i class="fas fa-bars"></i></button>
        <nav id="navbar" class="nav-menu hidden-menu">
            <ul>
    <li><a href="?page=home">خانه</a></li>
    <li><a href="?page=tools">ابزارها</a></li>
    <li><a href="?page=articles">مقالات</a></li>
    <li><a href="?page=hardware">کیس تعاملی</a></li>
    <li><a href="?page=help">راهنما</a></li>
    
    <?php if($page === 'home'): ?>
        <hr style="border-color: rgba(173, 173, 173, 0.2); margin: 10px 0;">
        <?php if (isset($_SESSION['user_email'])): ?>
            <li><a href="?page=account">حساب کاربری</a></li>
            <li><a href="?page=admin">پنل مدیریت</a></li>
            <li><a href="?page=logout" style="color: #e74c3c;">خروج از حساب</a></li>
        <?php else: ?>
            <li><a href="?page=login">ورود / ثبت‌نام</a></li>
        <?php endif; ?>
    <?php endif; ?>
</ul>
        </nav>
    </div>
</header>

<main class="main-wrapper" style="<?php echo ($page == 'home') ? '' : 'justify-content: flex-start; padding-top: 40px;'; ?>">

<?php switch ($page): case 'home': ?>
    <section class="hero-section">
        <div class="hero-content glass-card" style="text-align: center;">
            <h2>دنیای سخت‌افزار در مشت شما</h2>
            <p style="color: var(--highlight); font-weight: bold; margin-top: 10px;">معتبرترین و بروزترین منبع آموزش تکنولوژی</p>
            <p style="margin-top: 15px; opacity: 0.9;">به Lets Learn Hardware خوش آمدید. در اینجا می‌توانید به ابزارهای محاسباتی دقیق دسترسی داشته باشید، قطعات سخت افزاری کامپیوتر را یاد بگیرید یا جدیدترین مقالات دنیای تکنولوژی را مطالعه کنید. کافیه از کادر زیر امتحانش کنید!
</p>
        </div>
    </section>
    <section class="entry-buttons container">
        <div class="glass-card entry-card"><i class="fas fa-tools icon-large"></i><h3>جعبه ابزار</h3><a href="?page=tools" class="btn-primary">ورود به ابزارها</a></div>
        <div class="glass-card entry-card"><i class="fas fa-desktop icon-large"></i><h3>کیس تعاملی</h3><a href="?page=hardware" class="btn-primary">مشاهده قطعات</a></div>
        <div class="glass-card entry-card"><i class="fas fa-newspaper icon-large"></i><h3>مجله خبری</h3><a href="?page=articles" class="btn-primary">ورود به مقالات</a></div>
    </section>

<?php break; case 'tools': ?>
    <section class="container" style="max-width: 900px;">
        <h2 style="text-align:center; color: var(--highlight); margin-bottom: 30px;">ابزارهای هوشمند</h2>
        <div class="tools-grid">
            <div class="tool-card glass-card">
                <h3 style="margin-bottom: 15px;"><i class="fas fa-bolt"></i> محاسبه‌گر پاور</h3>
                <div class="form-group"><label>پردازنده:</label><select id="pw-cpu" class="form-input" style="margin:0;">
                    <option value="" disabled selected>قطعه مورد نظر را انتخاب کنید</option>
                    <optgroup label="Intel - نسل 14 و Core Ultra">
                        <option value="181">Intel Core i5-14600K</option>
                        <option value="253">Intel Core i7-14700K</option>
                        <option value="253">Intel Core i9-14900K</option>
                        <option value="320">Intel Core i9-14900KS</option>
                        <option value="159">Intel Core Ultra 5 245K</option>
                        <option value="250">Intel Core Ultra 7 265K</option>
                        <option value="250">Intel Core Ultra 9 285K</option>
                    </optgroup>
                    <optgroup label="AMD Ryzen - سری 7000 و 9000">
                        <option value="105">AMD Ryzen 5 7600X</option>
                        <option value="105">AMD Ryzen 7 7700X</option>
                        <option value="120">AMD Ryzen 7 7800X3D</option>
                        <option value="105">AMD Ryzen 7 9700X</option>
                        <option value="120">AMD Ryzen 7 9800X3D</option>
                        <option value="162">AMD Ryzen 9 9900X</option>
                        <option value="200">AMD Ryzen 9 9950X</option>
                    </optgroup>
                </select></div>
                <div class="form-group"><label>کارت گرافیک:</label><select id="pw-gpu" class="form-input" style="margin:0;">
                    <option value="" disabled selected>قطعه مورد نظر را انتخاب کنید</option>
                    <optgroup label="NVIDIA GeForce - سری 40 و 50">
                        <option value="115">NVIDIA RTX 4060</option>
                        <option value="220">NVIDIA RTX 4070 Super</option>
                        <option value="285">NVIDIA RTX 4070 Ti Super</option>
                        <option value="320">NVIDIA RTX 4080 Super</option>
                        <option value="450">NVIDIA RTX 4090</option>
                        <option value="115">NVIDIA RTX 5050</option>
                        <option value="150">NVIDIA RTX 5060</option>
                        <option value="250">NVIDIA RTX 5070</option>
                        <option value="400">NVIDIA RTX 5080</option>
                        <option value="600">NVIDIA RTX 5090</option>
                    </optgroup>
                    <optgroup label="AMD Radeon - سری 7000 و 9000">
                        <option value="190">AMD Radeon RX 7600 XT</option>
                        <option value="263">AMD Radeon RX 7800 XT</option>
                        <option value="315">AMD Radeon RX 7900 XT</option>
                        <option value="355">AMD Radeon RX 7900 XTX</option>
                        <option value="200">AMD Radeon RX 9060 XT</option>
                        <option value="250">AMD Radeon RX 9070</option>
                        <option value="300">AMD Radeon RX 9070 XT</option>
                    </optgroup>
                </select></div>
                <button onclick="calculatePower()" class="btn-secondary" style="margin-top:5px;">محاسبه توان</button>
                <div id="pw-result" class="result-box hidden"></div>
            </div>
            
            <div class="tool-card glass-card">
                <h3 style="margin-bottom: 15px;"><i class="fas fa-tachometer-alt"></i> تست گلوگاه</h3>
                <div class="form-group"><label>پردازنده:</label><select id="bn-cpu" class="form-input" style="margin:0;">
                    <option value="" disabled selected>قطعه مورد نظر را انتخاب کنید</option>
                    <optgroup label="Intel - نسل 14 و Core Ultra">
                        <option value="85">Intel Core i5-14600K</option>
                        <option value="92">Intel Core i7-14700K</option>
                        <option value="98">Intel Core i9-14900K</option>
                        <option value="100">Intel Core i9-14900KS</option>
                        <option value="88">Intel Core Ultra 5 245K</option>
                        <option value="94">Intel Core Ultra 7 265K</option>
                        <option value="102">Intel Core Ultra 9 285K</option>
                    </optgroup>
                    <optgroup label="AMD Ryzen - سری 7000 و 9000">
                        <option value="80">AMD Ryzen 5 7600X</option>
                        <option value="86">AMD Ryzen 7 7700X</option>
                        <option value="97">AMD Ryzen 7 7800X3D</option>
                        <option value="93">AMD Ryzen 7 9700X</option>
                        <option value="105">AMD Ryzen 7 9800X3D</option>
                        <option value="96">AMD Ryzen 9 9900X</option>
                        <option value="100">AMD Ryzen 9 9950X</option>
                    </optgroup>
                </select></div>
                
                <div class="form-group"><label>گرافیک:</label><select id="bn-gpu" class="form-input" style="margin:0;">
                    <option value="" disabled selected>قطعه مورد نظر را انتخاب کنید</option>
                    <optgroup label="NVIDIA GeForce - سری 40 و 50">
                        <option value="50">NVIDIA RTX 4060</option>
                        <option value="70">NVIDIA RTX 4070 Super</option>
                        <option value="78">NVIDIA RTX 4070 Ti Super</option>
                        <option value="88">NVIDIA RTX 4080 Super</option>
                        <option value="98">NVIDIA RTX 4090</option>
                        <option value="85">NVIDIA RTX 5050</option>
                        <option value="85">NVIDIA RTX 5060</option>
                        <option value="85">NVIDIA RTX 5070</option>
                        <option value="102">NVIDIA RTX 5080</option>
                        <option value="115">NVIDIA RTX 5090</option>
                    </optgroup>
                    <optgroup label="AMD Radeon - سری 7000 و 9000">
                        <option value="48">AMD Radeon RX 7600 XT</option>
                        <option value="68">AMD Radeon RX 7800 XT</option>
                        <option value="82">AMD Radeon RX 7900 XT</option>
                        <option value="90">AMD Radeon RX 7900 XTX</option>
                        <option value="86">AMD Radeon RX 9060 XT</option>
                        <option value="86">AMD Radeon RX 9070</option>
                        <option value="86">AMD Radeon RX 9070 XT</option>
                    </optgroup>
                </select></div>
                <button onclick="calculateBottleneck()" class="btn-secondary" style="margin-top:5px;">بررسی گلوگاه</button>
                <div class="progress-wrapper hidden" id="bn-result">
                    <div class="progress-bar-bg"><div class="progress-bar-fill" id="bn-bar"></div></div>
                    <p id="bn-text" style="font-weight:bold;">درصد گلوگاه: 0%</p>
                </div>
            </div>
        </div>
    </section>

<?php break; case 'hardware': ?>
    <div class="container" style="padding: 0 20px;">
        <p style="text-align: center; font-size: 1.1rem; opacity: 0.9; margin-bottom: 20px;">موس خود را روی قطعات داخل کیس ببرید یا روی آنها کلیک کنید.</p>
        <div class="hardware-layout">
            <div class="case-wrapper">
                <div class="pc-case-mock">
                    <a href="?page=component&type=motherboard" class="hardware-spot spot-mobo" data-title="مادربرد (Motherboard)" data-desc="برد اصلی کامپیوتر که تمامی قطعات را به هم متصل می کند.">
                        <span style="font-size:0.85rem; color:#1e3799; font-weight:bold; position:absolute; top:8px; right:10px;"><i class="fas fa-server"></i> MotherBoard</span>
                    </a>
                    <a href="?page=component&type=cpu" class="hardware-spot spot-cpu" data-title="پردازنده (CPU)" data-desc="مغز متفکر و محاسباتی کامپیوتر."><span><i class="fas fa-microchip"></i> CPU</span></a>
                    <a href="?page=component&type=ram" class="hardware-spot spot-ram" data-title="حافظه موقت (RAM)" data-desc="محل ذخیره‌سازی موقت داده‌های زنده سیستم."><span style="writing-mode: vertical-rl;"><i class="fas fa-memory"></i> RAM</span></a>
                    <a href="?page=component&type=storage" class="hardware-spot spot-ssd" data-title="حافظه پرسرعت (M.2 SSD)" data-desc="محل ذخیره‌سازی دائمی اطلاعات با سرعت فوق العاده بالا."><span><i class="fas fa-hdd"></i> M.2 SSD</span></a>
                    <a href="?page=component&type=gpu" class="hardware-spot spot-gpu" data-title="کارت گرافیک (GPU)" data-desc="مسئول تولید و رندر کردن تصاویر."><span><i class="fas fa-vr-cardboard"></i> GPU / VGA</span></a>
                    <a href="?page=component&type=psu" class="hardware-spot spot-psu" data-title="منبع تغذیه (Power)" data-desc="تامین کننده انرژی حیاتی قطعات سیستم."><span><i class="fas fa-bolt"></i> Power</span></a>
                </div>
            </div>
            <div class="info-panel">
                <div class="glass-card preview-box" id="info-box">
                    <h3 id="info-title" style="color: var(--highlight); margin-bottom: 15px;"><i class="fas fa-info-circle"></i> راهنمای انتخاب</h3>
                    <p id="info-desc" style="line-height: 1.8; text-align: justify;">نشانگر ماوس را روی قطعات رنگی ببرید.</p>
                </div>
            </div>
        </div>
    </div>

<?php break; case 'component': 
    // دریافت خودکار قطعه کلیک شده از آدرس بار (URL)
    $current_slug = $_GET['type'] ?? 'cpu'; 
?>
    <div class="container" style="max-width: 800px; padding: 0 20px;">
        <?php if (array_key_exists($current_slug, $hardware_details)): 
            $item = $hardware_details[$current_slug];
        ?>
            <div class="hardware-detail-container glass-card" style="padding: 25px; border-radius: 12px; font-family: 'Vazirmatn', sans-serif; line-height: 1.8; direction: rtl;">
                
                <h2 style="color: var(--highlight); border-bottom: 2px solid var(--glass-border); padding-bottom: 10px; margin-top: 0; font-size: 1.5rem;">
                    <?= htmlspecialchars($item['title']) ?>
                </h2>
                
                <div class="detailed-description" style="font-size: 1rem; color: var(--text-color); text-align: justify; margin-bottom: 25px;">
                    <?= $item['description'] ?>
                </div>

                <div class="code-integration-box" style="direction: ltr; text-align: left; margin-top: 20px;">
                </div>
            </div>
        <?php else: ?>
            <div style="background: #27272a; color: #ef4444; padding: 15px; border-radius: 8px; text-align: center; direction: rtl;">
                ⚠ خطایی رخ داده است: قطعه سخت‌افزاری مورد نظر در ساختار تعاملی یافت نشد.
            </div>
        <?php endif; ?>
        
        <div style="text-align: center; margin-top: 30px;">
            <a href="?page=hardware" class="btn-primary" style="width: auto; padding: 10px 40px; display: inline-block;">بازگشت به کیس</a>
        </div>
    </div>

<?php break; case 'articles': ?>
    <div class="container">
        <h2 style="text-align:center; margin-bottom: 30px; color: var(--highlight);">مجله خبری سخت‌افزار</h2>
        <div class="articles-grid">
            <?php foreach ($articles as $a): ?>
                <div class="glass-card article-card" style="display: flex; flex-direction: column;">
                    <img src="<?php echo htmlspecialchars($a['image']); ?>" style="width:100%; height:200px; object-fit:cover; border-radius:8px;">
                    <h3 style="margin: 15px 0; font-size:1.1rem;"><?php echo htmlspecialchars($a['title']); ?></h3>
                    <p style="font-size:0.9rem; opacity:0.8; flex-grow:1;"><?php echo htmlspecialchars($a['desc']); ?></p>
                    <a href="?page=article-view&id=<?php echo $a['id']; ?>" class="btn-primary">ادامه مطلب</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php break; case 'article-view': 
    $current = null; foreach ($articles as $a) { if ($a['id'] == $_GET['id']) { $current = $a; break; } }
    if (!$current) { echo "<h2>مقاله یافت نشد!</h2>"; } else {
?>
    <div class="glass-card container" style="max-width: 800px; padding: 40px;">
        <img src="<?php echo htmlspecialchars($current['image']); ?>" style="width:100%; max-height:400px; border-radius:15px; margin-bottom:20px; object-fit:cover;">
        <h1 style="color: var(--highlight); margin-bottom: 15px;"><?php echo htmlspecialchars($current['title']); ?></h1>
        <div style="display:flex; gap:20px; font-size:0.9rem; opacity:0.8; margin-bottom: 30px; border-bottom: 1px solid var(--secondary-color); padding-bottom: 15px;">
            <span><i class="fas fa-user"></i> <?php echo htmlspecialchars($current['author']); ?></span>
            <span><i class="fas fa-calendar-alt"></i> <?php echo htmlspecialchars($current['date']); ?></span>
        </div>
        <div style="line-height: 2; font-size: 1.1rem; text-align: justify;"><?php echo nl2br(htmlspecialchars($current['content'])); ?></div>
        <a href="?page=articles" class="btn-secondary" style="margin-top: 30px;">بازگشت به مقالات</a>
    </div>
<?php } break; case 'login': case 'register': ?>
    <div class="glass-card container" style="max-width: 450px;">
        <h2 style="text-align:center; color:var(--highlight); margin-bottom:20px;"><?php echo $page == 'login' ? 'ورود به حساب' : 'ساخت حساب جدید'; ?></h2>
        <?php if($msg) echo "<div style='color:#2ecc71; text-align:center; font-weight:bold; margin-bottom:15px;'>$msg</div>"; ?>
        <?php if($err) echo "<div style='color:#ff6b6b; text-align:center; font-weight:bold; margin-bottom:15px;'>$err</div>"; ?>
        
        <form method="POST">
            <input type="hidden" name="action" value="<?php echo $page; ?>">
            <?php if($page == 'register'): ?>
                <div style="display: flex; gap: 10px;">
                    <input type="text" name="fname" class="form-input" placeholder="نام" required>
                    <input type="text" name="lname" class="form-input" placeholder="نام خانوادگی" required>
                </div>
            <?php endif; ?>
            <input type="email" name="email" class="form-input" placeholder="ایمیل شما..." required>
            
            <div class="password-wrapper" style="margin-bottom: 15px;">
                <input type="password" name="pass" class="form-input" placeholder="رمز عبور..." required>
                <i class="fas fa-eye" onclick="togglePassword(this)"></i>
            </div>
            
            <button type="submit" class="btn-primary"><?php echo $page == 'login' ? 'ورود' : 'ثبت نام'; ?></button>
        </form>
        <p style="text-align:center; margin-top:20px; font-size:0.9rem;">
            <?php if($page == 'login'): ?> حساب ندارید؟ <a href="?page=register" style="color:var(--highlight);">ثبت‌نام کنید</a>
            <?php else: ?> قبلاً ثبت‌نام کرده‌اید؟ <a href="?page=login" style="color:var(--highlight);">وارد شوید</a> <?php endif; ?>
        </p>
    </div>

<?php break; case 'account': if (!isset($_SESSION['user_email'])) { header("Location: ?page=login"); exit; } ?>
    <div class="container" style="display:flex; flex-direction:column; gap:30px; align-items:center; width:100%;">
        <div class="glass-card" style="max-width: 500px; width:100%; text-align:center;">
            <h2 style="color:var(--highlight); margin-bottom: 20px;">مشخصات شما</h2>
            <h3>درود، <?php echo htmlspecialchars($_SESSION['user_name']); ?> 👋</h3>
            <p style="margin: 10px 0; opacity: 0.9;">ایمیل: <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
            <p style="font-weight: bold; color: var(--accent-color);">سطح دسترسی: <?php echo isset($_SESSION['is_superadmin']) ? "مدیر کل سایت" : (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] ? "ادمین" : "کاربر عادی"); ?></p>
        </div>
        <div class="glass-card" style="max-width: 500px; width:100%;">
            <h3 style="text-align:center; color:var(--highlight); margin-bottom: 20px;">تغییر رمز عبور</h3>
            <?php if($msg) echo "<p style='color:#2ecc71; text-align:center; margin-bottom:10px;'>$msg</p>"; ?>
            <?php if($err) echo "<p style='color:#ff6b6b; text-align:center; margin-bottom:10px;'>$err</p>"; ?>
            <form method="POST">
                <input type="hidden" name="action" value="change_pass">
                <div class="password-wrapper" style="margin-bottom:10px;"><input type="password" name="old_pass" class="form-input" placeholder="رمز فعلی" required><i class="fas fa-eye" onclick="togglePassword(this)"></i></div>
                <div class="password-wrapper" style="margin-bottom:10px;"><input type="password" name="new_pass" class="form-input" placeholder="رمز جدید" required><i class="fas fa-eye" onclick="togglePassword(this)"></i></div>
                <button type="submit" class="btn-primary">بروزرسانی</button>
            </form>
        </div>
    </div>

<?php break; case 'admin': if (!isset($_SESSION['user_email'])) { header("Location: ?page=login"); exit; } ?>
    <?php if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']): ?>
        <div class="glass-card container" style="max-width: 450px; text-align: center;">
            <h2 style="color:var(--highlight); margin-bottom: 20px;">ورود به پنل مدیریت</h2>
            
            <p style="font-size: 0.9rem; line-height: 1.8; color: var(--secondary-color); margin-bottom: 20px; text-align: justify; background: rgba(0,0,0,0.1); padding: 15px; border-radius: 8px;">
                رمز عبور فقط یکبار از شما خواسته میشه و سپس حساب کاربری شما به عنوان ادمین ثبت میشه. توجه داشته باشید که در صورت عدم فعالیت یا زیر پا گذاشتن قوانین هنگام انتشار محتوا در سایت، حساب شما به حال عادی بر خواهد گشت. سپاس از همراهی شما
            </p>

            <?php if($err) echo "<p style='color:#ff6b6b; margin-bottom:15px;'>$err</p>"; ?>
            <form method="POST">
                <input type="hidden" name="action" value="admin_login">
                <div class="password-wrapper" style="margin-bottom:20px;">
                    <input type="password" name="admin_pass" class="form-input" placeholder="رمز عبور ادمین..." required>
                    <i class="fas fa-eye" onclick="togglePassword(this)"></i>
                </div>
                <button type="submit" class="btn-primary">بررسی</button>
            </form>
        </div>
    <?php else: ?>
        <div class="container" style="display:flex; flex-direction:column; gap:30px; width:100%; max-width:800px;">
            <div class="glass-card">
                <h3 style="margin-bottom: 20px; color: var(--highlight);"><i class="fas fa-plus"></i> افزودن مقاله جدید</h3>
                <?php if($msg) echo "<p style='color:#2ecc71; margin-bottom:15px; font-weight:bold;'>$msg</p>"; ?>
                <form method="POST">
                    <input type="hidden" name="action" value="add_article">
                    <input type="text" name="title" class="form-input" placeholder="عنوان مقاله" required>
                    <input type="text" name="image" class="form-input" placeholder="لینک تصویر" required>
                    <input type="text" name="desc" class="form-input" placeholder="توضیح کوتاه روی کارت" required>
                    <textarea name="content" class="form-input" rows="5" placeholder="متن کامل..." required></textarea>
                    <button type="submit" class="btn-primary">انتشار محتوا</button>
                </form>
            </div>
            <div class="glass-card">
                <h3 style="margin-bottom: 20px; color: var(--highlight);"><i class="fas fa-list"></i> مقالات کاستوم دیتابیس</h3>
                <?php foreach ($json_articles as $a): ?>
                    <div style="display:flex; justify-content:space-between; align-items:center; padding:12px; border-bottom:1px solid rgba(255,255,255,0.1);">
                        <span><?php echo htmlspecialchars($a['title']); ?></span>
                        <a href="?page=admin&delete=<?php echo $a['id']; ?>" class="btn-secondary" style="width:auto; margin:0; background:#e74c3c; padding:6px 12px;">حذف</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

<?php break; case 'help': ?>
    <div class="glass-card container" style="max-width: 800px; padding: 40px; line-height: 1.8;">
        <h2 style="color: var(--highlight); text-align: center; margin-bottom: 30px;"><i class="fas fa-info-circle"></i> راهنمای استفاده از دانشنامه سخت‌افزار</h2>
        <h3 style="color: var(--text-purple); margin-bottom: 12px;">۱. جعبه ابزار محاسباتی</h3>
        <p style="text-align: justify; margin-bottom: 10px;">در این بخش می‌توانید از ابزارهای هوشمند استفاده کنید:</p>
        
        <ul style="text-align: justify; padding-right: 20px; margin-bottom: 20px; list-style-type: square;">
            <li style="margin-bottom: 15px;">
                <strong>محاسبه‌گر پاور:</strong> این ابزار به شما <strong>کمک می‌کند</strong> تا پاور مورد نیاز برای سیستم خود را انتخاب کنید.
                <br>
                <span style="font-size: 0.9em; opacity: 0.85;"><strong>نحوه استفاده:</strong> پردازنده و کارت گرافیک کامپیوتر خود را از منوی قطعات انتخاب کرده و سپس روی دکمه “محاسبه توان” کلیک کنید تا مقدار برق مصرفی قطعات خود و پاور پیشنهادی را مشاهده کنید.</span>
            </li>
            
            <li style="margin-bottom: 15px;">
                <strong>محاسبه‌گر گلوگاه (Bottleneck):</strong> این ابزار به شما <strong>کمک می‌کند</strong> تا پردازنده و کارت گرافیک مناسب به هم را انتخاب کنید.
                
                <div style="margin-top: 10px; margin-bottom: 10px;">
                    <strong>گلوگاه (Bottleneck) چیست؟</strong>
                    <br>
                    گلوگاه به وضعیتی گفته می‌شود که یکی از قطعات اصلی سیستم (معمولاً پردازنده یا کارت گرافیک) نتواند با سرعت قطعه دیگر هماهنگ شود و باعث محدود شدن عملکرد کلی سیستم شود. به عنوان مثال، اگر کارت گرافیک بسیار قدرتمند باشد اما پردازنده توان کافی برای پردازش داده‌ها را نداشته باشد، بخشی از قدرت کارت گرافیک بلااستفاده خواهد ماند. هدف این ابزار بررسی میزان هماهنگی بین پردازنده و کارت گرافیک و نمایش درصد تقریبی گلوگاه است. 
                    <br>
                    <strong>توجه داشته باشید که مقدار بسیار کمی گلوگاه تقریباً در همه سیستم‌ها وجود دارد و حذف کامل آن عملاً امکان‌پذیر نیست، زیرا هیچ یک از قطعات به صورت اختصاصی برای یکدیگر ساخته نشده اند. هدف از انتخاب قطعات مناسب، کاهش گلوگاه و ایجاد بیشترین هماهنگی ممکن بین اجزای سیستم است.</strong> 
                    به طور کلی، گلوگاه کمتر از ۱۰٪ مناسب و کمتر از ۵٪ ایده‌آل در نظر گرفته می‌شود. توجه داشته باشید که درصد گلوگاه تنها یک تخمین است و عملکرد واقعی سیستم به نوع نرم‌افزار، بازی و تنظیمات مورد استفاده نیز بستگی دارد.
                </div>
                
                <span style="font-size: 0.9em; opacity: 0.85;"><strong>نحوه استفاده:</strong> پردازنده و کارت گرافیک کامپیوتر خود را از منوی قطعات انتخاب کرده و سپس روی دکمه “بررسی گلوگاه” کلیک کنید تا درصد گلوگاه قطعات خود را مشاهده کنید.</span>
            </li>
        </ul>

        <h3 style="color: var(--text-orange); margin-bottom: 12px;">۲. ساختار کیس تعاملی</h3>
        <p style="text-align: justify; margin-bottom: 20px;">
            در این بخش، نمایی شماتیک از یک کیس کامپیوتر از زاویه جانبی نمایش داده شده است؛ مشابه نمایی که از طریق پنل شیشه‌ای در بسیاری از کیس‌های مدرن قابل مشاهده است. در این تصویر، سمت راست نمایانگر بخش جلویی کیس و سمت چپ نمایانگر بخش پشتی آن است.
            <br><br>
            چیدمان قطعات بر اساس موقعیت رایج آن‌ها در یک سیستم واقعی طراحی شده و شامل اجزای اصلی مورد نیاز <strong>برای کارکرد صحیح یک کامپیوتر</strong> است؛ از جمله پردازنده (CPU)، خنک‌کننده پردازنده، مادربرد، حافظه رم (RAM)، کارت گرافیک (GPU)، حافظه ذخیره‌سازی (SSD/HDD)، منبع تغذیه (Power Supply) و کیس.
            <br><br>
            برای آشنایی اولیه با هر قطعه، نشانگر موس را روی آن قرار دهید تا توضیح مختصری در کادر راهنما نمایش داده شود. همچنین با کلیک روی هر قطعه می‌توانید اطلاعات تخصصی‌تر و جزئیات فنی مربوط به آن را مشاهده کنید.
        </p>

        <h3 style="color: var(--text-color); margin-bottom: 12px;">۳. مجله خبری و مقالات</h3>
        <p style="text-align: justify; margin-bottom: 20px;">جدیدترین مقالات آموزشی و خبری در بخش <strong>مجله‌ها</strong> در دسترس است. مدیر و ادمین‌ها می‌توانند با ورود به بخش "پنل مدیریت" مقالات جدید را ثبت یا مقالات موجود را حذف کنند.</p>
        
        <h3 style="color: var(--text-color); margin-bottom: 12px;">سخنی با شما</h3>
        <p style="text-align: justify; margin-bottom: 15px;">
            ما در اینجا تلاش کرده‌ایم مجموعه‌ای از ابزارها، منابع آموزشی و دانش تخصصی دنیای تکنولوژی را گرد هم بیاوریم تا مسیر یادگیری و آموزش برای شما ساده‌تر و لذت‌بخش‌تر شود.
            <br><br>
            این پروژه کاملاً رایگان و با هدف گسترش دانش و فرهنگ یادگیری توسعه داده شده است و استفاده از محتوای آن برای همه آزاد است.
            <br><br>
            هرگونه استفاده مادی و معنوی بدون اطلاع و هماهنگی پیگرد قانونی که... ندارد؛ ولی آدم خوبی باشید🙂
        </p>
    </div>
<?php break; endswitch; ?>

</main>

<?php if ($page == 'home'): ?>
<footer style="text-align: center; padding: 20px; border-top: 1px solid var(--glass-border);">
    <p>&copy; 2026 Lets Learn Hardware . Created by <a href="https://github.com/arashrostammazaheri-maker" target="_blank" style="color:var(--highlight); font-weight:bold; text-decoration:none;">Arash_R.m✨</a>. All Rights Reserved</p>
</footer>
<?php elseif (in_array($page, ['tools', 'hardware', 'articles'])): ?>
<footer style="text-align: center; padding: 20px; border-top: 1px solid var(--glass-border);">
    <p>&copy; 2585 Lets Learn Hardware. Made with ❤️ by <a href="https://github.com/arashrostammazaheri-maker" target="_blank" style="color:var(--highlight); font-weight:bold; text-decoration:none;">Arash_R.m</a></p>
</footer>
<?php endif; ?>

<script src="script.js"></script>
</body>
</html>
