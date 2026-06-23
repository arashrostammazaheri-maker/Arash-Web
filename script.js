document.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.getElementById('menu-btn');
    const navbar = document.getElementById('navbar');
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;

    if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark-mode');
        if(themeToggle) themeToggle.innerHTML = '☀️🦁';
    }

    if(themeToggle) {
        themeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            if (body.classList.contains('dark-mode')) {
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
    
    // مصرف پایه قطعات جانبی (مادربرد، رم‌ها، فن‌ها، نورپردازی و هاردها)
    const baseUsage = 120; 
    
    // مجموع مصرف خالص و واقعی قطعات در حداکثر فشار
    const total = cpu + gpu + baseUsage;
    
    // ضریب 1.4 برای طول عمر پاور، راندمان بهینه و نوسانات شدید برق کارت گرافیک
    let suggested = Math.ceil((total * 1.4) / 50) * 50; 

    
    if (suggested > 1000) {
        suggested += 150;
    }

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