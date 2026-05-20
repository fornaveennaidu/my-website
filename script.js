// ⚡ PREMIUM LOADER LOGIC
function removeLoader() {
    const loader = document.getElementById('daksh-loader');
    if (loader) {
        loader.style.opacity = '0';
        loader.style.pointerEvents = 'none';
        
        // Wait for the opacity transition to finish before hiding from DOM
        setTimeout(() => { 
            loader.style.visibility = 'hidden';
            loader.style.display = 'none'; 
        }, 800); 
    }
}

document.addEventListener('DOMContentLoaded', () => {
    // Elegant 1.5 second loading preview for premium feel
    setTimeout(removeLoader, 1500);
});
setTimeout(removeLoader, 3000); // Failsafe fallback


document.addEventListener('DOMContentLoaded', () => {

    // 🎬 SCROLL REVEAL ANIMATIONS (Intersection Observer)
    const revealElements = document.querySelectorAll('.reveal-up, .reveal-stagger');
    const revealOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px" 
    };

    if ('IntersectionObserver' in window) {
        const revealOnScroll = new IntersectionObserver(function(entries, observer) {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target); 
            });
        }, revealOptions);

        revealElements.forEach(el => revealOnScroll.observe(el));
    } else {
        revealElements.forEach(el => el.classList.add('is-visible'));
    }

    // 🧲 MAGNETIC BUTTON PHYSICS (Desktop Only)
    if (window.innerWidth > 768) {
        const magneticElements = document.querySelectorAll('.magnetic-btn, .magnetic-hover');
        
        magneticElements.forEach(btn => {
            btn.addEventListener('mousemove', (e) => {
                const rect = btn.getBoundingClientRect();
                const x = e.clientX - rect.left; 
                const y = e.clientY - rect.top;  
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const deltaX = ((x - centerX) / centerX) * 12;
                const deltaY = ((y - centerY) / centerY) * 12;
                
                btn.style.transform = `translate(${deltaX}px, ${deltaY}px) scale(1.02)`;
            });

            btn.addEventListener('mouseleave', () => {
                btn.style.transform = 'translate(0px, 0px) scale(1)';
            });
        });
    }

    // 📱 NAVBAR SCROLL EFFECT
    const navbar = document.querySelector('.glass-navbar');
    if(navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }

    // --- Floating Mobile Bottom Nav Bar Interactivity ---
    const navItems = document.querySelectorAll('.nav-item');
    navItems.forEach(item => {
        item.addEventListener('click', function(e) {
            if(this.getAttribute('href') === '#') {
                e.preventDefault(); 
            }
            navItems.forEach(nav => nav.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // --- TAILWIND MODAL LOGIC ---
    const bookNowModal = document.getElementById('bookNowModal');
    const modalTriggerBtns = document.querySelectorAll('.modal-trigger-btn');
    const modalCloseTriggers = document.querySelectorAll('.modal-close-trigger');

    function openModal($el) {
        if(!$el) return;
        $el.classList.remove('opacity-0', 'invisible');
        $el.classList.add('modal-active');
        document.body.classList.add('modal-open');
    }

    function closeModal($el) {
        if(!$el) return;
        $el.classList.remove('modal-active');
        $el.classList.add('opacity-0', 'invisible');
        document.body.classList.remove('modal-open');
    }

    if(modalTriggerBtns.length > 0 && bookNowModal) {
        modalTriggerBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                openModal(bookNowModal);
            });
        });
    }
    
    if(modalCloseTriggers.length > 0 && bookNowModal) {
        modalCloseTriggers.forEach(trigger => {
            trigger.addEventListener('click', () => {
                closeModal(bookNowModal);
            });
        });
    }

    // Close modal on Escape key
    document.addEventListener('keydown', (event) => {
        if(event.key === "Escape" && bookNowModal && bookNowModal.classList.contains('modal-active')) {
            closeModal(bookNowModal);
        }
    });

    // --- Dynamic Banner Fetch (Preserved) ---
    const topBanner = document.getElementById('dynamicTopBanner');
    const mTopBanner = document.getElementById('mDynamicTopBanner');
    let currentBannerData = null; 

    function fetchActiveHeroBanner() {
        try {
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
                .catch(error => console.log("Banner fetch standby - API not present."));
        } catch (e) {}
    }

    fetchActiveHeroBanner();
    setInterval(fetchActiveHeroBanner, 3000); 

});
