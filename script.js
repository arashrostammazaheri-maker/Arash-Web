document.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.getElementById('menu-btn');
    const navbar = document.getElementById('navbar');
    const themeToggleBtn = document.querySelectorAll('#theme-toggle');
    const body = document.body;

    if(menuBtn && navbar) {
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

    if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark-mode');
        updateIcon(true);
    }

    themeToggleBtn.forEach(btn => {
        btn.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            const isDark = body.classList.contains('dark-mode');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            updateIcon(isDark);
        });
    });

    function updateIcon(isDark) {
        const icons = document.querySelectorAll('#theme-toggle i');
        icons.forEach(icon => {
            icon.className = isDark ? 'fas fa-sun' : 'fas fa-moon';
        });
    }

    // بخش ادمین
    const addForm = document.getElementById('add-article-form');
    const adminList = document.getElementById('admin-articles-list');

    if (addForm) {
        renderAdminList(); 

        addForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const articles = JSON.parse(localStorage.getItem('articles')) || [];
            const newArticle = {
                id: Date.now(),
                title: document.getElementById('title').value,
                image: document.getElementById('image').value,
                content: document.getElementById('content').value
            };
            articles.push(newArticle);
            localStorage.setItem('articles', JSON.stringify(articles));
            alert('مقاله با موفقیت ثبت شد!');
            addForm.reset();
            renderAdminList();
        });
    }

    function renderAdminList() {
        if (!adminList) return;
        const articles = JSON.parse(localStorage.getItem('articles')) || [];
        adminList.innerHTML = '';
        
        if (articles.length === 0) {
            adminList.innerHTML = '<p style="text-align:center; color:gray;">هنوز مقاله‌ای ثبت نشده است.</p>';
            return;
        }

        articles.forEach((article, index) => {
            const item = document.createElement('div');
            item.style.cssText = 'display: flex; justify-content: space-between; align-items: center; background: rgba(0,0,0,0.05); padding: 10px; border-radius: 8px;';
            item.innerHTML = `
                <div style="display:flex; align-items:center; gap:10px;">
                    <img src="${article.image}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                    <span>${article.title}</span>
                </div>
                <button class="delete-btn" data-index="${index}" style="background: #e74c3c; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">حذف</button>
            `;
            adminList.appendChild(item);
        });

        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const idx = this.getAttribute('data-index');
                const currentArticles = JSON.parse(localStorage.getItem('articles')) || [];
                currentArticles.splice(idx, 1);
                localStorage.setItem('articles', JSON.stringify(currentArticles));
                renderAdminList();
            });
        });
    }
});