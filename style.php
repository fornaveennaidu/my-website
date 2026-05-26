<?php
header("Content-type: text/css; charset: UTF-8");
?>
/* =========================================
   ✨ DAKSH PREMIUM TAILWIND ANIMATION CORE
   ========================================= */

/* Base Adjustments */
html, body {
    max-width: 100vw;
    overflow-x: hidden;
}

/* Scrollbar Customization */
::-webkit-scrollbar { width: 8px; }
::-webkit-scrollbar-track { background: #f5f3ff; }
::-webkit-scrollbar-thumb { background: #c4b5fd; border-radius: 4px; }
::-webkit-scrollbar-thumb:hover { background: #a78bfa; }

/* Custom utility for perfectly hiding horizontal scrollbars in snap containers */
.hide-scrollbar {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
}
.hide-scrollbar::-webkit-scrollbar {
    display: none;
}

/* Custom scrollbar for Location Area List Modal */
.custom-scrollbar::-webkit-scrollbar {
    width: 4px;
}
.custom-scrollbar::-webkit-scrollbar-track {
    background: transparent; 
}
.custom-scrollbar::-webkit-scrollbar-thumb {
    background: #e9d5ff; 
    border-radius: 10px;
}
.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #c4b5fd; 
}

body.modal-open { overflow: hidden; }

/* ⚡ Premium Startup Loader */
.premium-loader-bg {
    position: fixed;
    inset: 0;
    z-index: 99999;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #f5f3ff 0%, #ede9fe 100%);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    transition: opacity 0.8s cubic-bezier(0.25, 1, 0.5, 1), visibility 0.8s ease;
}

.loader-ring-wrapper {
    position: relative;
    width: 90px;
    height: 90px;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: premiumLoaderFloat 3s ease-in-out infinite;
}

.loader-d-text {
    font-size: 3.5rem;
    font-weight: 800;
    color: #4c1d95; /* Dark Purple */
    text-shadow: 0 4px 20px rgba(76, 29, 149, 0.25);
    transform: translateX(3px); /* Optical centering for letter D */
}

.loader-orbit {
    position: absolute;
    inset: -15px;
    border-radius: 50%;
    animation: premiumOrbit 1.5s linear infinite;
}

.loader-orbit-dot {
    position: absolute;
    top: -6px;
    left: 50%;
    transform: translateX(-50%);
    width: 12px;
    height: 12px;
    background-color: #a855f7; /* Bright Purple Accent */
    border-radius: 50%;
    box-shadow: 0 0 20px 4px rgba(168, 85, 247, 0.6), inset 0 0 4px rgba(255,255,255,0.8);
}

@keyframes premiumOrbit {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@keyframes premiumLoaderFloat {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
}

/* 💎 Custom Glass Utilities */
.glass-panel {
    background: rgba(255, 255, 255, 0.65);
    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);
    border: 1px solid rgba(255, 255, 255, 0.8);
}

.glass-navbar.scrolled {
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    box-shadow: 0 4px 20px -2px rgba(91, 33, 182, 0.05);
    border-bottom: 1px solid rgba(255, 255, 255, 0.5);
}

/* 🎨 Animated Mesh Background for Stats */
.bg-mesh-animated {
    background: linear-gradient(-45deg, #f5f3ff, #ffffff, #ede9fe, #faf5ff);
    background-size: 400% 400%;
    animation: gradientMesh 15s ease infinite;
}
@keyframes gradientMesh {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* 🧲 Magnetic Button Core */
.magnetic-btn {
    position: relative;
    overflow: hidden;
    z-index: 1;
    transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.4s ease;
}
.magnetic-btn::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to right, rgba(255,255,255,0.2), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: -1;
    pointer-events: none;
}
.magnetic-btn:hover::after { opacity: 1; }

.magnetic-hover {
    transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.4s ease;
}

/* 🎬 Cinematic Scroll Reveals */
.reveal-up {
    opacity: 0;
    transform: translateY(40px) scale(0.98);
    transition: all 1s cubic-bezier(0.25, 1, 0.5, 1);
    will-change: opacity, transform;
}
.reveal-up.is-visible {
    opacity: 1;
    transform: translateY(0) scale(1);
}

.reveal-stagger > * {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s cubic-bezier(0.25, 1, 0.5, 1);
}
.reveal-stagger.is-visible > * {
    opacity: 1;
    transform: translateY(0);
}

/* 🌌 Ambient Floating Orbs */
.ambient-orb {
    position: absolute;
    border-radius: 50%;
    filter: blur(100px);
    animation: floatOrb 20s infinite alternate ease-in-out;
}
@keyframes floatOrb {
    0% { transform: translate(0,0) scale(1); }
    50% { transform: translate(-40px, 60px) scale(1.1); }
    100% { transform: translate(40px, -40px) scale(0.9); }
}

/* 🎈 Float Animations */
.float-anim {
    animation: premiumFloat 8s ease-in-out infinite;
}
.float-anim-reverse {
    animation: premiumFloat 6s ease-in-out infinite reverse;
}
.float-anim-delay {
    animation: premiumFloat 7s ease-in-out infinite 1s;
}

@keyframes premiumFloat { 
    0% { transform: translateY(0px); } 
    50% { transform: translateY(-12px); } 
    100% { transform: translateY(0px); } 
}

/* 💫 Infinite Marquee (Both Footer & Testimonials) */
.mask-edges {
    -webkit-mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
    mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
}
.animate-marquee {
    animation: scrollLeftToRight 40s linear infinite;
}
@keyframes scrollLeftToRight {
    0% { transform: translateX(0); }
    100% { transform: translateX(calc(-50% - 2rem)); }
}

/* Premium Marquee Testimonials */
@keyframes testimonialMarquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(calc(-50% - 0.75rem)); } /* Accounts for gap */
}
.animate-testimonial-marquee {
    animation: testimonialMarquee 60s linear infinite;
    will-change: transform;
}

/* Form Helper Animations */
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in-up { 
    animation: fadeInUp 0.4s ease-out forwards; 
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}
.animate-shake { 
    animation: shake 0.3s ease-in-out; 
}

/* Modal Animations */
.modal-active {
    opacity: 1 !important;
    visibility: visible !important;
}
.modal-active .modal-content-box,
.modal-active .location-content-box {
    transform: scale(1) !important;
}

/* 🚗 Service Journey Animations */
@keyframes journeyLineX {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(300%); }
}
@keyframes journeyLineY {
    0% { transform: translateY(-100%); }
    100% { transform: translateY(300%); }
}
.animate-journey-x { animation: journeyLineX 3s infinite linear; }
.animate-journey-y { animation: journeyLineY 3s infinite linear; }
.map-pattern {
    background-image: radial-gradient(#cbd5e1 1px, transparent 1px);
    background-size: 8px 8px;
}

/* 🪄 Premium FAQ Accordion Grid Transitions */
.faq-body {
    display: grid;
    grid-template-rows: 0fr; 
    opacity: 0;
    transition: grid-template-rows 0.5s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.4s ease, transform 0.4s ease;
    transform: translateY(-5px);
}
.faq-item.active .faq-body {
    grid-template-rows: 1fr;
    opacity: 1;
    transform: translateY(0);
}
.faq-item.active .faq-icon {
    transform: rotate(180deg);
}
.break-inside-avoid {
    break-inside: avoid;
    page-break-inside: avoid;
}

/* =========================================
   📱 MOBILE RESPONSIVE OPTIMIZATION
   Strict overrides for screens <= 768px
   ========================================= */
@media (max-width: 768px) {
    
    /* Global Layout & Overflow Protection */
    html, body {
        overflow-x: hidden !important;
        width: 100% !important;
        max-width: 100vw !important;
        -webkit-text-size-adjust: 100%;
        padding-bottom: 90px; /* Safe space for bottom sticky nav */
    }

    /* Typography Scaling (Native App Feel) */
    h1, .text-6xl, .text-5xl {
        font-size: clamp(2rem, 8vw, 2.75rem) !important;
        line-height: 1.15 !important;
        letter-spacing: -0.02em;
    }
    h2, .text-4xl {
        font-size: clamp(1.75rem, 6vw, 2.25rem) !important;
        line-height: 1.2 !important;
    }
    h3, .text-3xl {
        font-size: 1.5rem !important;
        line-height: 1.3 !important;
    }
    p, .text-lg {
        font-size: 1rem !important;
        line-height: 1.5 !important;
    }

    /* Global Section Spacing (Fluid Space) */
    section {
        padding-left: 1rem !important;
        padding-right: 1rem !important;
        padding-top: 3rem !important;
        padding-bottom: 3rem !important;
    }

    /* Native App Touch Targets (Min 48px height) */
    button, 
    .magnetic-btn, 
    .modal-trigger-btn, 
    select, 
    input[type="text"], 
    input[type="number"], 
    input[type="email"] {
        min-height: 48px !important;
        padding-top: 0.75rem !important;
        padding-bottom: 0.75rem !important;
        font-size: 1rem !important;
    }

    /* Popups & Modals (Center Aligned, No Overflow) */
    .modal-content-box, 
    .location-content-box {
        width: 100% !important;
        max-width: 92vw !important;
        margin: 0 auto;
        border-radius: 1.5rem !important;
        padding: 1.5rem !important;
        max-height: 85vh;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
    }

    /* Glass Panels & Bento Cards (Better Padding & Stacking) */
    .glass-panel {
        padding: 1.5rem !important;
        border-radius: 1.5rem !important;
    }

    /* Performance Optimizations (Smooth 60fps) */
    .ambient-orb {
        filter: blur(50px) !important; /* Lighter blur for mobile GPU */
        opacity: 0.6 !important;
        animation-duration: 30s !important; /* Slower animation saves battery */
        will-change: transform, opacity;
    }
    .glass-navbar {
        backdrop-filter: blur(12px) !important;
        -webkit-backdrop-filter: blur(12px) !important;
    }
    
    /* FAQ Section */
    .faq-item {
        border-radius: 1.25rem !important;
    }
    .faq-header {
        padding: 1.25rem !important;
    }
    
    /* Testimonial Section */
    .animate-testimonial-marquee {
        /* Slightly faster marquee for smaller screens to maintain momentum */
        animation-duration: 45s !important; 
    }
}
