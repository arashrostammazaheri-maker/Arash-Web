document.addEventListener('DOMContentLoaded', () => {
    // -----------------------------------------
    // 1. UI Setup (Dark Mode & Menu)
    // -----------------------------------------
    const menuBtn = document.getElementById('menu-btn');
    const navbar = document.getElementById('navbar');
    const themeToggle = document.getElementById('theme-toggle');

    // Theme class is already applied before render by the inline script in <head>.
    // Here we only sync the toggle button icon to match the current state.
    if (document.documentElement.classList.contains('dark-mode')) {
        if(themeToggle) themeToggle.innerHTML = '☀️🦁';
    }

    if(themeToggle) {
        themeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark-mode');
            if (document.documentElement.classList.contains('dark-mode')) {
                localStorage.setItem('theme', 'dark');
                themeToggle.innerHTML = '☀️🦁';
            } else {
                localStorage.setItem('theme', 'light');
                themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
            }
        });
    }

    if (menuBtn && navbar) {
        menuBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            navbar.classList.toggle('show-menu');
            navbar.classList.toggle('hidden-menu');
        });

        document.addEventListener('click', (e) => {
            if (!navbar.contains(e.target) && !menuBtn.contains(e.target)) {
                navbar.classList.remove('show-menu');
                navbar.classList.add('hidden-menu');
            }
        });
    }

    // -----------------------------------------
    // 2. Hardware Case Interaction
    // -----------------------------------------
    const spots = document.querySelectorAll('.hardware-spot');
    const infoTitle = document.getElementById('info-title');
    const infoDesc = document.getElementById('info-desc');
    if (spots.length > 0 && infoTitle && infoDesc) {
        spots.forEach(spot => {
            spot.addEventListener('mouseenter', () => {
                let iconClass = spot.querySelector('i') ? spot.querySelector('i').classList[1] : 'fa-microchip';
                infoTitle.innerHTML = `<i class="fas ${iconClass}"></i> ` + spot.getAttribute('data-title');
                infoDesc.innerText = spot.getAttribute('data-desc');
            });
            spot.addEventListener('mouseleave', () => {
                infoTitle.innerHTML = '<i class="fas fa-info-circle"></i> راهنمای انتخاب';
                infoDesc.innerText = 'نشانگر ماوس را روی قطعات رنگی ببرید.';
            });
        });
    }

    // -----------------------------------------
    // 3. Static Client-Side Data Loaders
    // -----------------------------------------
    const urlParams = new URLSearchParams(window.location.search);
    
    // Component Page Loading
    if (window.location.pathname.includes('component.html')) {
        const type = urlParams.get('type') || 'cpu';
        const componentData = hardwareDetails[type];
        const container = document.getElementById('component-container');
        
        if (componentData && container) {
            container.innerHTML = `
                <h2 style="color: var(--highlight); border-bottom: 2px solid var(--glass-border); padding-bottom: 10px; margin-top: 0; font-size: 1.5rem;">
                    ${componentData.title}
                </h2>
                <div class="detailed-description" style="font-size: 1rem; color: var(--text-color); text-align: justify; margin-bottom: 25px;">
                    ${componentData.description}
                </div>
            `;
        } else if (container) {
            container.innerHTML = `<div style="background: #27272a; color: #ef4444; padding: 15px; border-radius: 8px; text-align: center; direction: rtl;">⚠ خطایی رخ داده است: قطعه سخت‌افزاری مورد نظر در ساختار تعاملی یافت نشد.</div>`;
        }
    }

    // Articles List Rendering
    if (window.location.pathname.includes('articles.html')) {
        const articles = JSON.parse(localStorage.getItem('llh_articles')) || [];
        const grid = document.getElementById('articles-grid');
        if (grid) {
            grid.innerHTML = articles.map(a => `
                <div class="glass-card article-card" style="display: flex; flex-direction: column;">
                    <img src="${a.image}" style="width:100%; height:200px; object-fit:cover; border-radius:8px;" alt="${a.title}">
                    <h3 style="margin: 15px 0; font-size:1.1rem;">${a.title}</h3>
                    <p style="font-size:0.9rem; opacity:0.8; flex-grow:1;">${a.desc}</p>
                    <a href="article-view.html?id=${a.id}" class="btn-primary">ادامه مطلب</a>
                </div>
            `).join('');
        }
    }

    // Single Article View
    if (window.location.pathname.includes('article-view.html')) {
        const id = urlParams.get('id');
        const articles = JSON.parse(localStorage.getItem('llh_articles')) || [];
        const current = articles.find(a => a.id == id);
        const container = document.getElementById('article-container');
        
        if (current && container) {
            container.innerHTML = `
                <img src="${current.image}" style="width:100%; max-height:400px; border-radius:15px; margin-bottom:20px; object-fit:cover;" alt="${current.title}">
                <h1 style="color: var(--highlight); margin-bottom: 15px;">${current.title}</h1>
                <div style="display:flex; gap:20px; font-size:0.9rem; opacity:0.8; margin-bottom: 30px; border-bottom: 1px solid var(--secondary-color); padding-bottom: 15px;">
                    <span><i class="fas fa-user"></i> ${current.author}</span>
                    <span><i class="fas fa-calendar-alt"></i> ${current.date}</span>
                </div>
                <div style="line-height: 2; font-size: 1.1rem; text-align: justify;">${current.content.replace(/\n/g, '<br>')}</div>
                <a href="articles.html" class="btn-secondary" style="margin-top: 30px;">بازگشت به مقالات</a>
            `;
        } else if (container) {
            container.innerHTML = "<h2>مقاله یافت نشد!</h2>";
        }
    }

    // -----------------------------------------
    // 4. Client-Side Navigation & Auth
    // -----------------------------------------
    renderNavigation();
});

function togglePassword(icon) {
    const input = icon.previousElementSibling;
    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}

// Helpers for Calculators (from original script.js)
function calculatePower() {
    const cpuSelect = document.getElementById('pw-cpu');
    const gpuSelect = document.getElementById('pw-gpu');
    const resultBox = document.getElementById('pw-result');

    if (!cpuSelect || !gpuSelect || !cpuSelect.value || !gpuSelect.value) {
        if(resultBox) {
            resultBox.innerHTML = "لطفاً هر دو قطعه را انتخاب کنید.";
            resultBox.style.color = "#ff6b6b";
            resultBox.classList.remove('hidden');
        }
        return;
    }

    const cpu = parseInt(cpuSelect.value);
    const gpu = parseInt(gpuSelect.value);
    const baseUsage = 120; 
    const total = cpu + gpu + baseUsage;
    let suggested = Math.ceil((total * 1.4) / 50) * 50; 

    if (suggested > 1000) suggested += 150;

    resultBox.classList.remove('hidden');
    resultBox.innerHTML = `
        <span style="font-size:0.9rem; opacity:0.8;">تخمین مصرف خالص در اوج فشار: ${total} وات</span><br>
        <span style="font-size:1.2rem; color: var(--highlight); font-weight:bold; display:block; margin-top:8px;">پاور استاندارد پیشنهادی: ${suggested} وات</span>
    `;
    resultBox.style.color = "var(--text-color)";
}

function calculateBottleneck() {
    const cpuSelect = document.getElementById('bn-cpu');
    const gpuSelect = document.getElementById('bn-gpu');
    const bar = document.getElementById('bn-bar');
    const text = document.getElementById('bn-text');
    const wrapper = document.getElementById('bn-result');

    if (!cpuSelect.value || !gpuSelect.value) return;

    wrapper.classList.remove('hidden');
    let cpuScore = parseInt(cpuSelect.value);
    let gpuScore = parseInt(gpuSelect.value);
    
    let percentage = gpuScore > cpuScore ? (gpuScore - cpuScore) * 2 : (cpuScore - gpuScore) / 2;
    if(percentage < 0) percentage = 0;
    if(percentage > 100) percentage = 99;

    bar.style.width = '0%';
    setTimeout(() => {
        bar.style.width = `${percentage}%`;
        if(percentage < 15) { bar.style.background = "#2ecc71"; text.innerText = `وضعیت عالی (گلوگاه: ${Math.round(percentage)}%)`; }
        else if(percentage < 40) { bar.style.background = "#f1c40f"; text.innerText = `قابل قبول (گلوگاه: ${Math.round(percentage)}%)`; }
        else { bar.style.background = "#e74c3c"; text.innerText = `گلوگاه شدید! (${Math.round(percentage)}%)`; }
    }, 100);
}

// -----------------------------------------
// Navigation & Auth Logic (Dynamic Routing)
// -----------------------------------------
function renderNavigation() {
    const navbar = document.getElementById('navbar');
    if (!navbar) return;

    // Determine whether the current page is the home page based on the URL path.
    const isHomePage = window.location.pathname.endsWith('/') || window.location.pathname.endsWith('index.html') || !window.location.pathname.includes('/pages/');
    
    // Generate dynamic base paths according to the current page location.
    const homeUrl = isHomePage ? 'index.html' : '../index.html';
    const pagesPrefix = isHomePage ? 'pages/' : '';

    // Assemble the navigation HTML string with links to all main pages.
    let navHTML = `<ul>`;
    navHTML += `<li><a href="${homeUrl}">خانه</a></li>`;
    navHTML += `<li><a href="${pagesPrefix}tools.html">ابزارها</a></li>`;
    navHTML += `<li><a href="${pagesPrefix}articles.html">مقالات</a></li>`;
    navHTML += `<li><a href="${pagesPrefix}hardware.html">کیس تعاملی</a></li>`;
    navHTML += `<li><a href="${pagesPrefix}help.html">راهنما</a></li>`;

    // Apply account navigation visibility rules (these items are only displayed on the Home page).
    if (isHomePage) {
        navHTML += `<li style="list-style: none; padding: 0; margin: 0;"><hr style="border-color: rgba(173, 173, 173, 0.2); margin: 10px 0;"></li>`;
        
        const email = localStorage.getItem('llh_user_email');
        
        if (email) {
            navHTML += `<li><a href="${pagesPrefix}account.html">حساب کاربری</a></li>`;
            navHTML += `<li><a href="${pagesPrefix}admin.html">پنل مدیریت</a></li>`;
            navHTML += `<li><a href="#" onclick="logoutUser()" style="color: #e74c3c;">خروج از حساب</a></li>`;
        } else {
            navHTML += `<li><a href="${pagesPrefix}login.html">ورود / ثبت‌نام</a></li>`;
        }
    }

    navHTML += `</ul>`;
    
    // Inject the generated navigation structure into the empty navbar container.
    navbar.innerHTML = navHTML;
}

// Clear all user session data from localStorage and refresh the page.
window.logoutUser = function() {
    localStorage.removeItem('llh_user_email');
    localStorage.removeItem('llh_user_name');
    localStorage.removeItem('llh_is_admin');
    window.location.reload();
};

function requireAuth() {
    if (!localStorage.getItem('llh_user_email')) {
        // Resolve the correct login page path and redirect the unauthenticated user.
        const isHomePage = window.location.pathname.endsWith('/') || window.location.pathname.endsWith('index.html') || !window.location.pathname.includes('/pages/');
        window.location.href = isHomePage ? 'pages/login.html' : 'login.html';
    }
}