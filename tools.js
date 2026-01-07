function calculatePower() {
    const cpu = parseInt(document.getElementById('cpu-select').value);
    const gpu = parseInt(document.getElementById('gpu-select').value);
    const resultBox = document.getElementById('power-result');

    if (cpu === 0 || gpu === 0) {
        resultBox.innerHTML = "لطفاً قطعات را انتخاب کنید.";
        resultBox.style.color = "red";
        return;
    }

    const baseUsage = 150; 
    const total = cpu + gpu + baseUsage;
    const suggested = Math.ceil((total * 1.25) / 50) * 50; 

    resultBox.innerHTML = `
        <span style="font-size:0.9rem">مصرف سیستم: ${total} وات</span><br>
        <span style="font-size:1.2rem; color: var(--highlight);">پاور پیشنهادی: ${suggested} وات</span>
    `;
    resultBox.style.color = "var(--text-color)";
}

function calculateBottleneck() {
    const cpuScore = parseInt(document.getElementById('bn-cpu').value);
    const gpuScore = parseInt(document.getElementById('bn-gpu').value);
    const bar = document.getElementById('bn-bar');
    const text = document.getElementById('bn-text');
    const wrapper = document.getElementById('bn-result');

    wrapper.classList.remove('hidden');

    let diff = Math.abs(cpuScore - gpuScore);
    let percentage = 0;

    if (gpuScore > cpuScore) {
        percentage = (gpuScore - cpuScore) * 2; 
    } else {
        percentage = (cpuScore - gpuScore) / 2;
    }

    if(percentage < 0) percentage = 0;
    if(percentage > 100) percentage = 99;

    bar.style.width = '0%';
    
    setTimeout(() => {
        bar.style.width = `${percentage}%`;
        
        if(percentage < 15) {
            bar.style.background = "#2ecc71";
            text.innerText = `وضعیت عالی (گلوگاه: ${Math.round(percentage)}%)`;
        }
        else if(percentage < 40) {
            bar.style.background = "#f1c40f"; 
            text.innerText = `قابل قبول (گلوگاه: ${Math.round(percentage)}%)`;
        }
        else {
            bar.style.background = "#e74c3c";
            text.innerText = `گلوگاه شدید! (${Math.round(percentage)}%)`;
        }
    }, 100);
}