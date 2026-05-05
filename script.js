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


document.addEventListener('DOMContentLoaded', () => {
    
    // --- Mobile Bottom Nav Bar Interactivity ---
    const navItems = document.querySelectorAll('.m-nav-item');
    navItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault(); 
            // Remove active class from all tabs
            navItems.forEach(nav => nav.classList.remove('active'));
            // Add active class to clicked tab (reveals full color without bounce)
            this.classList.add('active');
        });
    });

    // --- Dynamic Banner Fetch ---
    const topBanner = document.getElementById('dynamicTopBanner');
    const mTopBanner = document.getElementById('mDynamicTopBanner');
    let currentBannerData = null; 

    function fetchActiveHeroBanner() {
        fetch('api/banners.php?action=fetch_active_hero')
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success' && data.data) {
                    const newDataString = JSON.stringify(data.data);
                    if (currentBannerData !== newDataString) {
                        if (topBanner) {
                            document.getElementById('dynBannerTitle').innerHTML = data.data.title;
                            document.getElementById('dynBannerPrice').innerText = '₹' + data.data.price;
                            topBanner.style.display = 'flex'; 
                        }
                        if (mTopBanner) {
                            document.getElementById('mDynBannerTitle').innerHTML = data.data.title;
                            document.getElementById('mDynBannerPrice').innerText = '₹' + data.data.price;
                            mTopBanner.style.display = 'flex'; 
                        }
                        currentBannerData = newDataString; 
                    }
                } else {
                    if (topBanner) topBanner.style.display = 'none'; 
                    if (mTopBanner) mTopBanner.style.display = 'none';
                    currentBannerData = null;
                }
            })
            .catch(error => console.error("Banner fetch error:", error));
    }

    fetchActiveHeroBanner();
    setInterval(fetchActiveHeroBanner, 3000); 

    // --- Desktop Location Dropdown Toggle ---
    const locationBtn = document.getElementById('locationDropdownBtn');
    if(locationBtn) {
        locationBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const arrowIcon = locationBtn.querySelector('.arrow-icon');
            if(arrowIcon.classList.contains('fa-chevron-down')) {
                arrowIcon.classList.replace('fa-chevron-down', 'fa-chevron-up');
                arrowIcon.style.transform = 'rotate(180deg)';
            } else {
                arrowIcon.classList.replace('fa-chevron-up', 'fa-chevron-down');
                arrowIcon.style.transform = 'rotate(0deg)';
            }
        });
    }

    // --- 🧠 TAB SWITCHING LOGIC (Desktop) ---
    const serviceTabs = document.querySelectorAll('.svc-tab');
    const servicePanels = document.querySelectorAll('.svc-content-panel');

    if (serviceTabs.length > 0 && servicePanels.length > 0) {
        serviceTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                if(tab.classList.contains('active')) return;

                serviceTabs.forEach(t => t.classList.remove('active'));
                
                servicePanels.forEach(p => {
                    p.classList.remove('active');
                    p.style.animation = 'none';
                    p.offsetHeight; 
                    p.style.animation = null; 
                });
                
                tab.classList.add('active');
                
                const targetId = tab.getAttribute('data-tab');
                const targetPanel = document.getElementById(targetId);
                
                if (targetPanel) {
                    targetPanel.classList.add('active');
                }
            });
        });
    }
});
