// ⚡ GUARANTEED PAYTM-STYLE LOADING EXPERIENCE
function removeLoader() {
    const loader = document.getElementById('daksh-loader');
    if (loader && loader.style.display !== 'none') {
        loader.style.opacity = '0';
        loader.style.pointerEvents = 'none';
        setTimeout(() => { loader.style.display = 'none'; }, 400); 
    }
}

document.addEventListener('DOMContentLoaded', () => {
    setTimeout(removeLoader, 800);
});
setTimeout(removeLoader, 2500); // Failsafe


// 🧠 TAB SWITCHING LOGIC (Desktop)
document.addEventListener('DOMContentLoaded', () => {
    
    const serviceTabs = document.querySelectorAll('.svc-tab');
    const servicePanels = document.querySelectorAll('.svc-content-panel');

    if (serviceTabs.length > 0 && servicePanels.length > 0) {
        
        serviceTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                
                // Ignore if already active
                if(tab.classList.contains('active')) return;

                // 1. Remove 'active' class from all tabs
                serviceTabs.forEach(t => t.classList.remove('active'));
                
                // 2. Hide all content panels and reset animation
                servicePanels.forEach(p => {
                    p.classList.remove('active');
                    p.style.animation = 'none';
                    p.offsetHeight; /* trigger reflow */
                    p.style.animation = null; 
                });
                
                // 3. Add 'active' class to the clicked tab
                tab.classList.add('active');
                
                // 4. Show the matching content panel
                const targetId = tab.getAttribute('data-tab');
                const targetPanel = document.getElementById(targetId);
                
                if (targetPanel) {
                    targetPanel.classList.add('active');
                }
            });
        });
    }
});