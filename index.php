<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);

// Page Configurations
$pageTitle = "Daksh. - Premium Home Services";
$currentYear = date("Y");
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo $pageTitle; ?></title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'sans-serif'] },
                    colors: {
                        brand: {
                            50: '#faf5ff',
                            100: '#f3e8ff',
                            200: '#e9d5ff',
                            800: '#5b21b6',
                            900: '#4c1d95',
                            950: '#2e1065',
                            darkbg: '#1d0a3d',
                        }
                    },
                    boxShadow: {
                        'glass': '0 20px 40px -10px rgba(91,33,182,0.1)',
                        'glow': '0 10px 30px -10px rgba(91,33,182,0.4)',
                        'badge': '0 4px 10px rgba(16, 185, 129, 0.4)',
                        'card-premium': '0 4px 20px -8px rgba(91,33,182,0.15)',
                        'card-premium-hover': '0 12px 30px -10px rgba(91,33,182,0.25)',
                    }
                }
            }
        }
    </script>

    <link rel="stylesheet" href="style.php">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="text-gray-900 antialiased overflow-x-hidden relative selection:bg-brand-200 selection:text-brand-900">

    <div id="daksh-loader" class="premium-loader-bg">
        <div class="loader-ring-wrapper">
            <div class="loader-orbit">
                <div class="loader-orbit-dot"></div>
            </div>
            <div class="loader-d-text">D</div>
        </div>
    </div>

    <div class="fixed inset-0 z-[-1] pointer-events-none overflow-hidden bg-gradient-to-br from-brand-50 via-purple-50 to-indigo-50 w-full h-full">
        <div class="ambient-orb w-[600px] h-[600px] bg-brand-800/10 -top-[100px] -right-[100px]"></div>
        <div class="ambient-orb w-[500px] h-[500px] bg-indigo-600/10 bottom-[10%] -left-[150px]" style="animation-delay: -5s;"></div>
    </div>

    <nav class="glass-navbar fixed w-full top-0 z-50 transition-all duration-300 py-3">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center w-full">
            <div class="flex items-center gap-8">
                <a href="index.php" class="text-2xl font-extrabold tracking-tight text-gray-900">
                    Daksh<span class="text-brand-800">.</span>
                </a>
                
                <div id="locationSelectorTrigger" class="hidden md:flex items-center gap-3 px-4 py-2 bg-white/50 backdrop-blur-md border border-white/80 rounded-full cursor-pointer hover:bg-white/80 transition-all duration-300 shadow-sm hover:shadow-glow group">
                    <div class="w-8 h-8 rounded-full bg-brand-100 flex items-center justify-center text-brand-800 flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                        <i class="fa-solid fa-location-dot text-sm drop-shadow-sm"></i>
                    </div>
                    <div class="flex flex-col leading-none">
                        <span id="navSelectedLocation" class="text-sm font-extrabold text-brand-900 flex items-center gap-1 group-hover:text-brand-800 transition-colors">Bangalore</span>
                        <span class="text-[10px] font-bold text-gray-500 tracking-wide uppercase mt-0.5 flex items-center gap-1">Hub <i class="fa-solid fa-chevron-down text-[8px] text-brand-800 group-hover:translate-y-0.5 transition-transform duration-300"></i></span>
                    </div>
                </div>
                
            </div>

            <div class="hidden md:flex items-center gap-6">
                <a href="#categories" class="text-sm font-semibold text-gray-600 hover:text-brand-800 transition-colors">Services</a>
                <a href="about.php" class="text-sm font-semibold text-gray-600 hover:text-brand-800 transition-colors">About</a>
                <div class="w-px h-6 bg-gray-300/50"></div>
                
                <?php if($isLoggedIn): 
                    // Dynamic Time-Based Greeting
                    $hour = date('H');
                    if ($hour < 12) $greeting = "Good Morning";
                    elseif ($hour < 17) $greeting = "Good Afternoon";
                    else $greeting = "Good Evening";
                ?>
                    <div class="relative group">
                        <button class="flex items-center gap-3 px-3 py-1.5 bg-white/50 backdrop-blur-md border border-brand-100 rounded-full hover:bg-white/90 hover:shadow-glow transition-all duration-300 cursor-pointer">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-brand-600 to-brand-900 text-white flex items-center justify-center font-extrabold text-sm shadow-sm">
                                <?= strtoupper(substr($_SESSION['user_name'], 0, 1)) ?>
                            </div>
                            <div class="flex flex-col text-left pr-2">
                                <span class="text-[9px] font-extrabold text-brand-800/80 uppercase tracking-wider leading-none"><?= $greeting ?>,</span>
                                <span class="text-sm font-extrabold text-gray-900 leading-tight"><?= htmlspecialchars($_SESSION['user_name']) ?></span>
                            </div>
                            <i class="fa-solid fa-chevron-down text-[10px] text-gray-400 group-hover:rotate-180 transition-transform duration-300 mr-2"></i>
                        </button>
                        
                        <div class="absolute right-0 top-full mt-3 w-56 bg-white/95 backdrop-blur-2xl border border-brand-200/50 rounded-2xl shadow-[0_10px_40px_rgba(91,33,182,0.15)] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 translate-y-2 group-hover:translate-y-0 z-50 overflow-hidden">
                            <a href="my-account.php#profile" class="block px-5 py-3.5 text-sm font-semibold text-gray-700 hover:bg-brand-50 hover:text-brand-900 transition-colors border-b border-brand-100/50"><i class="fa-regular fa-user mr-2 text-brand-500 w-4"></i> My Account</a>
                            <a href="my-account.php#bookings" class="block px-5 py-3.5 text-sm font-semibold text-gray-700 hover:bg-brand-50 hover:text-brand-900 transition-colors border-b border-brand-100/50"><i class="fa-solid fa-clipboard-list mr-2 text-brand-500 w-4"></i> My Bookings</a>
                            <a href="my-account.php#support" class="block px-5 py-3.5 text-sm font-semibold text-gray-700 hover:bg-brand-50 hover:text-brand-900 transition-colors border-b border-brand-100/50"><i class="fa-regular fa-circle-question mr-2 text-brand-500 w-4"></i> Help & Support</a>
                            <a href="logout.php" class="block px-5 py-3.5 text-sm font-bold text-red-500 hover:bg-red-50 transition-colors"><i class="fa-solid fa-arrow-right-from-bracket mr-2 w-4"></i> Logout</a>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="login.php" class="magnetic-btn bg-brand-800 text-white px-6 py-2.5 rounded-full text-sm font-bold shadow-glow hover:bg-brand-900 flex items-center gap-2 transition-all">
                        Sign In <i class="fa-solid fa-arrow-right ml-1"></i>
                    </a>
                <?php endif; ?>
            </div>
            
            <button class="md:hidden w-10 h-10 flex items-center justify-center bg-white/50 border border-white/60 rounded-xl text-gray-800 transition-colors hover:bg-gray-100">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </nav>

    <section class="min-h-screen pt-28 pb-10 px-4 md:px-6 flex items-center w-full">
        <div class="max-w-7xl mx-auto w-full">
            
            <div class="glass-panel p-6 md:p-12 lg:p-16 rounded-[2.5rem] reveal-up relative overflow-hidden">
                <div class="absolute -top-32 -left-32 w-64 h-64 bg-brand-800/20 rounded-full blur-[80px]"></div>
                
                <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center relative z-10 w-full">
                    
                    <div class="flex flex-col items-start text-left w-full">
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/60 border border-white/80 rounded-full text-xs font-bold text-gray-800 mb-6 shadow-sm">
                            <i class="fa-solid fa-bolt text-brand-800"></i> Bangalore's #1 Rated Experts
                        </div>

                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-[1.1] tracking-tight mb-6">
                            Elevate Your Home with <br>
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-brand-800 to-indigo-600">Master Craftsmanship.</span>
                        </h1>
                        
                        <p class="text-base md:text-lg font-medium text-gray-600 mb-8 max-w-lg leading-relaxed">
                            Experience flawless, reliable, and premium home services. We bring top-tier professionals directly to your sanctuary.
                        </p>
                        
                        <div class="flex flex-wrap gap-3 mb-10 w-full">
                            <div class="flex items-center gap-2 px-4 py-2 bg-white/40 backdrop-blur-md border border-white/60 rounded-full text-sm font-semibold text-gray-800 shadow-sm hover:-translate-y-1 hover:shadow-glow hover:bg-white/80 transition-all duration-300">
                                <i class="fa-solid fa-magnifying-glass-chart text-brand-800"></i> Free Inspection
                            </div>
                            <div class="flex items-center gap-2 px-4 py-2 bg-white/40 backdrop-blur-md border border-white/60 rounded-full text-sm font-semibold text-gray-800 shadow-sm hover:-translate-y-1 hover:shadow-glow hover:bg-white/80 transition-all duration-300">
                                <i class="fa-solid fa-file-invoice-dollar text-brand-800"></i> No Service Charge
                            </div>
                            <div class="flex items-center gap-2 px-4 py-2 bg-white/40 backdrop-blur-md border border-white/60 rounded-full text-sm font-semibold text-gray-800 shadow-sm hover:-translate-y-1 hover:shadow-glow hover:bg-white/80 transition-all duration-300">
                                <i class="fa-solid fa-shield-halved text-brand-800"></i> 30 Days Service Warranty
                            </div>
                        </div>

                        <div class="flex flex-col items-start w-full">
                            <a href="#categories" class="magnetic-btn bg-brand-800 hover:bg-brand-900 text-white px-8 py-3.5 rounded-full text-base font-bold shadow-glow flex items-center justify-center w-full sm:w-auto transition-all">
                                Explore Services
                            </a>
                            <p class="text-[13px] text-gray-500 font-semibold mt-4 flex items-center flex-wrap gap-1.5">
                                ⭐ 4.9/5 from 2,300+ local homeowners
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 grid-rows-2 gap-4 h-[320px] sm:h-[400px] lg:h-[480px] w-full relative">
                        <a href="ac-service.php" class="magnetic-hover rounded-[1.5rem] overflow-hidden shadow-lg border border-white/50 relative bg-brand-50 block cursor-pointer w-full h-full">
                            <img src="images/Ac_service.jpg" onerror="this.src='https://images.unsplash.com/photo-1621905252507-b35492cc74b4?w=600&q=80'" alt="AC Service" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-brand-900/5 mix-blend-overlay pointer-events-none group-hover:bg-transparent transition-colors duration-300"></div>
                        </a>
                        <div class="magnetic-hover rounded-[1.5rem] overflow-hidden shadow-lg border border-white/50 relative bg-brand-50 w-full h-full">
                            <img src="images/washing-machine_service.jpg" onerror="this.src='https://images.unsplash.com/photo-1626806787461-102c1bfaaea1?w=400&q=80'" alt="Washing Machine" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-brand-900/5 mix-blend-overlay pointer-events-none"></div>
                        </div>
                        <div class="magnetic-hover rounded-[1.5rem] overflow-hidden shadow-lg border border-white/50 relative bg-brand-50 w-full h-full">
                            <img src="images/Geyser_service.jpg" onerror="this.src='https://images.unsplash.com/photo-1584622650111-993a426fbf0a?w=400&q=80'" alt="Geyser" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-brand-900/5 mix-blend-overlay pointer-events-none"></div>
                        </div>
                        <div class="magnetic-hover rounded-[1.5rem] overflow-hidden shadow-lg border border-white/50 relative bg-brand-50 w-full h-full">
                            <img src="images/Fridge_service.jpg" onerror="this.src='https://images.unsplash.com/photo-1584568694244-14fbdf83bd30?w=400&q=80'" alt="Fridge" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-brand-900/5 mix-blend-overlay pointer-events-none"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="stats-section" class="py-8 bg-brand-50/50 relative z-20 border-y border-brand-200/40 w-full">
        <div class="max-w-[1400px] mx-auto px-4 md:px-6 w-full">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3 lg:gap-4 xl:gap-5 reveal-stagger w-full">
                
                <a href="ac-service.php" class="group flex items-center gap-3 xl:gap-4 bg-white/90 backdrop-blur-xl border border-white/60 rounded-2xl py-3 px-3 xl:px-5 shadow-card-premium hover:shadow-card-premium-hover hover:-translate-y-1 transition-all duration-400 cursor-pointer relative overflow-hidden w-full">
                    <div class="absolute inset-0 bg-gradient-to-r from-brand-100/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-400 pointer-events-none"></div>
                    <div class="w-10 h-10 lg:w-12 lg:h-12 xl:w-14 xl:h-14 flex-shrink-0 bg-gradient-to-br from-brand-50 to-brand-100/50 border border-brand-200/60 rounded-xl flex items-center justify-center shadow-inner group-hover:scale-105 transition-transform duration-400 relative z-10">
                        <img src="images/ac.png" alt="AC Service" class="w-6 h-6 lg:w-7 lg:h-7 xl:w-8 xl:h-8 object-contain drop-shadow-sm group-hover:-rotate-3 transition-transform duration-400" onerror="this.src='https://cdn-icons-png.flaticon.com/512/2911/2911145.png'">
                    </div>
                    <div class="flex flex-col justify-center relative z-10 overflow-hidden w-full">
                        <div class="flex items-baseline gap-0.5 w-full">
                            <span class="text-xl lg:text-2xl xl:text-3xl font-extrabold text-brand-900 tracking-tight leading-none counter truncate" data-target="5755">1</span>
                        </div>
                        <span class="text-[10px] lg:text-xs font-bold text-gray-500 mt-1 tracking-wide group-hover:text-brand-800 transition-colors truncate">AC Service</span>
                    </div>
                </a>

                <div class="group flex items-center gap-3 xl:gap-4 bg-white/90 backdrop-blur-xl border border-white/60 rounded-2xl py-3 px-3 xl:px-5 shadow-card-premium hover:shadow-card-premium-hover hover:-translate-y-1 transition-all duration-400 cursor-default relative overflow-hidden w-full">
                    <div class="absolute inset-0 bg-gradient-to-r from-brand-100/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-400 pointer-events-none"></div>
                    <div class="w-10 h-10 lg:w-12 lg:h-12 xl:w-14 xl:h-14 flex-shrink-0 bg-gradient-to-br from-brand-50 to-brand-100/50 border border-brand-200/60 rounded-xl flex items-center justify-center shadow-inner group-hover:scale-105 transition-transform duration-400 relative z-10">
                        <img src="images/water_purifier.png" alt="Water Purifier" class="w-6 h-6 lg:w-7 lg:h-7 xl:w-8 xl:h-8 object-contain drop-shadow-sm group-hover:-rotate-3 transition-transform duration-400" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3063/3063825.png'">
                    </div>
                    <div class="flex flex-col justify-center relative z-10 overflow-hidden w-full">
                        <div class="flex items-baseline gap-0.5 w-full">
                            <span class="text-xl lg:text-2xl xl:text-3xl font-extrabold text-brand-900 tracking-tight leading-none counter truncate" data-target="4951">1</span>
                        </div>
                        <span class="text-[10px] lg:text-xs font-bold text-gray-500 mt-1 tracking-wide group-hover:text-brand-800 transition-colors truncate">Water Purifier</span>
                    </div>
                </div>

                <div class="group flex items-center gap-3 xl:gap-4 bg-white/90 backdrop-blur-xl border border-white/60 rounded-2xl py-3 px-3 xl:px-5 shadow-card-premium hover:shadow-card-premium-hover hover:-translate-y-1 transition-all duration-400 cursor-default relative overflow-hidden w-full">
                    <div class="absolute inset-0 bg-gradient-to-r from-brand-100/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-400 pointer-events-none"></div>
                    <div class="w-10 h-10 lg:w-12 lg:h-12 xl:w-14 xl:h-14 flex-shrink-0 bg-gradient-to-br from-brand-50 to-brand-100/50 border border-brand-200/60 rounded-xl flex items-center justify-center shadow-inner group-hover:scale-105 transition-transform duration-400 relative z-10">
                        <img src="images/fridge.png" alt="Refrigerator" class="w-6 h-6 lg:w-7 lg:h-7 xl:w-8 xl:h-8 object-contain drop-shadow-sm group-hover:-rotate-3 transition-transform duration-400" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3021/3021102.png'">
                    </div>
                    <div class="flex flex-col justify-center relative z-10 overflow-hidden w-full">
                        <div class="flex items-baseline gap-0.5 w-full">
                            <span class="text-xl lg:text-2xl xl:text-3xl font-extrabold text-brand-900 tracking-tight leading-none counter truncate" data-target="1523">1</span>
                        </div>
                        <span class="text-[10px] lg:text-xs font-bold text-gray-500 mt-1 tracking-wide group-hover:text-brand-800 transition-colors truncate">Refrigerator</span>
                    </div>
                </div>

                <div class="group flex items-center gap-3 xl:gap-4 bg-white/90 backdrop-blur-xl border border-white/60 rounded-2xl py-3 px-3 xl:px-5 shadow-card-premium hover:shadow-card-premium-hover hover:-translate-y-1 transition-all duration-400 cursor-default relative overflow-hidden w-full">
                    <div class="absolute inset-0 bg-gradient-to-r from-brand-100/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-400 pointer-events-none"></div>
                    <div class="w-10 h-10 lg:w-12 lg:h-12 xl:w-14 xl:h-14 flex-shrink-0 bg-gradient-to-br from-brand-50 to-brand-100/50 border border-brand-200/60 rounded-xl flex items-center justify-center shadow-inner group-hover:scale-105 transition-transform duration-400 relative z-10">
                        <img src="images/washing-machine.png" alt="Washing Machine" class="w-6 h-6 lg:w-7 lg:h-7 xl:w-8 xl:h-8 object-contain drop-shadow-sm group-hover:-rotate-3 transition-transform duration-400" onerror="this.src='https://cdn-icons-png.flaticon.com/512/882/882745.png'">
                    </div>
                    <div class="flex flex-col justify-center relative z-10 overflow-hidden w-full">
                        <div class="flex items-baseline gap-0.5 w-full">
                            <span class="text-xl lg:text-2xl xl:text-3xl font-extrabold text-brand-900 tracking-tight leading-none counter truncate" data-target="7145">1</span>
                        </div>
                        <span class="text-[10px] lg:text-xs font-bold text-gray-500 mt-1 tracking-wide group-hover:text-brand-800 transition-colors truncate">Washing Machine</span>
                    </div>
                </div>

                <div class="group flex items-center gap-3 xl:gap-4 bg-white/90 backdrop-blur-xl border border-white/60 rounded-2xl py-3 px-3 xl:px-5 shadow-card-premium hover:shadow-card-premium-hover hover:-translate-y-1 transition-all duration-400 cursor-default relative overflow-hidden w-full">
                    <div class="absolute inset-0 bg-gradient-to-r from-brand-100/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-400 pointer-events-none"></div>
                    <div class="w-10 h-10 lg:w-12 lg:h-12 xl:w-14 xl:h-14 flex-shrink-0 bg-gradient-to-br from-brand-50 to-brand-100/50 border border-brand-200/60 rounded-xl flex items-center justify-center shadow-inner group-hover:scale-105 transition-transform duration-400 relative z-10">
                        <img src="images/geyser.png" alt="Geyser" class="w-6 h-6 lg:w-7 lg:h-7 xl:w-8 xl:h-8 object-contain drop-shadow-sm group-hover:-rotate-3 transition-transform duration-400" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3063/3063854.png'">
                    </div>
                    <div class="flex flex-col justify-center relative z-10 overflow-hidden w-full">
                        <div class="flex items-baseline gap-0.5 w-full">
                            <span class="text-xl lg:text-2xl xl:text-3xl font-extrabold text-brand-900 tracking-tight leading-none counter truncate" data-target="1850">1</span>
                        </div>
                        <span class="text-[10px] lg:text-xs font-bold text-gray-500 mt-1 tracking-wide group-hover:text-brand-800 transition-colors truncate">Geyser</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <style>
        @keyframes liveBar1 { 0%, 100% { height: 40%; } 50% { height: 60%; } }
        @keyframes liveBar2 { 0%, 100% { height: 70%; } 50% { height: 90%; } }
        @keyframes liveBar3 { 0%, 100% { height: 50%; } 50% { height: 75%; } }
        @keyframes liveBar4 { 0%, 100% { height: 85%; } 50% { height: 100%; } }
        @keyframes liveBar5 { 0%, 100% { height: 60%; } 50% { height: 80%; } }
        .animate-bar-1 { animation: liveBar1 3s ease-in-out infinite; }
        .animate-bar-2 { animation: liveBar2 2.5s ease-in-out infinite 0.2s; }
        .animate-bar-3 { animation: liveBar3 3.2s ease-in-out infinite 0.4s; }
        .animate-bar-4 { animation: liveBar4 2.8s ease-in-out infinite 0.1s; }
        .animate-bar-5 { animation: liveBar5 3.5s ease-in-out infinite 0.5s; }
    </style>
    <section class="py-16 px-4 md:px-6 reveal-up w-full relative bg-[#F8F7FC]">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[#7C4DFF]/10 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto relative z-10 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 auto-rows-auto lg:auto-rows-[280px]">

                <div class="lg:col-span-2 rounded-[32px] bg-[#FFFFFF] border border-[#EDE9FE] shadow-[0_8px_30px_rgb(124,77,255,0.04)] hover:shadow-[0_20px_40px_rgba(124,77,255,0.12)] transition-all duration-500 group overflow-hidden relative flex flex-col md:flex-row items-center p-8 md:p-10 hover:-translate-y-1">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#F3F0FF]/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

                    <div class="w-full md:w-1/2 z-10 flex flex-col justify-center h-full">
                        <div class="w-12 h-12 rounded-[14px] bg-[#F3F0FF] text-[#7C4DFF] flex items-center justify-center mb-6 shadow-inner group-hover:scale-110 transition-transform duration-500">
                            <i class="fa-solid fa-map-location-dot text-xl"></i>
                        </div>
                        <h3 class="text-gray-900 font-extrabold text-4xl md:text-5xl tracking-tight leading-tight mb-2">35+ Areas</h3>
                        <p class="text-gray-500 font-semibold text-lg">Near You</p>
                    </div>

                    <div class="w-full md:w-1/2 mt-8 md:mt-0 relative h-full min-h-[180px] z-10 flex items-center justify-center lg:justify-end">
                        <div class="relative w-full max-w-[220px] float-anim">
                            <div class="absolute -inset-6 bg-[#7C4DFF]/20 blur-2xl rounded-full opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <img src="images/wmt.png" class="relative z-10 w-full h-full object-cover rounded-[24px] shadow-[0_12px_30px_rgba(124,77,255,0.15)] border-4 border-white" onerror="this.src='https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=400&q=80'" alt="Areas">
                            
                            <div class="absolute -bottom-4 -left-4 bg-white/95 backdrop-blur-md px-4 py-2.5 rounded-2xl shadow-[0_8px_20px_rgba(124,77,255,0.15)] flex items-center gap-3 z-20 group-hover:scale-105 transition-transform duration-500">
                                <div class="relative flex h-3 w-3">
                                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#7C4DFF] opacity-75"></span>
                                  <span class="relative inline-flex rounded-full h-3 w-3 bg-[#7C4DFF]"></span>
                                </div>
                                <span class="text-xs font-extrabold text-gray-800 uppercase tracking-wider">Live Now</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1 lg:row-span-2 rounded-[32px] bg-[#FFFFFF] border border-[#EDE9FE] shadow-[0_8px_30px_rgb(124,77,255,0.04)] hover:shadow-[0_20px_40px_rgba(124,77,255,0.12)] transition-all duration-500 group overflow-hidden relative p-8 md:p-10 flex flex-col justify-between hover:-translate-y-1">
                    <div class="absolute inset-0 bg-gradient-to-b from-[#F3F0FF]/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

                    <div class="z-10">
                        <div class="w-12 h-12 rounded-[14px] bg-[#F3F0FF] text-[#7C4DFF] flex items-center justify-center mb-6 shadow-inner group-hover:scale-110 transition-transform duration-500">
                            <i class="fa-solid fa-chart-line text-xl"></i>
                        </div>
                        <div class="flex items-baseline gap-1 mb-2">
                            <h3 class="text-gray-900 font-extrabold text-5xl lg:text-6xl tracking-tight leading-none counter" data-target="25000">1</h3>
                            <span class="text-3xl font-extrabold text-[#7C4DFF]">+</span>
                        </div>
                        <p class="text-gray-500 font-semibold text-lg leading-tight">Services<br>Completed</p>
                    </div>

                    <div class="mt-8 relative z-10 w-full flex-1 flex items-end justify-center min-h-[180px]">
                        <div class="w-full bg-[#F8F7FC] rounded-[24px] p-5 shadow-inner border border-[#EDE9FE] relative overflow-hidden group-hover:-translate-y-2 transition-transform duration-700 ease-[cubic-bezier(0.16,1,0.3,1)] flex flex-col justify-end">
                            <div class="flex items-end justify-between h-32 gap-2 w-full">
                                <div class="w-full bg-gradient-to-t from-[#c4b5fd] to-[#7C4DFF] rounded-t-md animate-bar-1 opacity-80 group-hover:opacity-100 transition-opacity"></div>
                                <div class="w-full bg-gradient-to-t from-[#a78bfa] to-[#7C4DFF] rounded-t-md animate-bar-2 opacity-80 group-hover:opacity-100 transition-opacity"></div>
                                <div class="w-full bg-gradient-to-t from-[#c4b5fd] to-[#7C4DFF] rounded-t-md animate-bar-3 opacity-80 group-hover:opacity-100 transition-opacity"></div>
                                <div class="w-full bg-gradient-to-t from-[#8b5cf6] to-[#7C4DFF] rounded-t-md animate-bar-4 shadow-[0_0_15px_rgba(124,77,255,0.4)] z-10"></div>
                                <div class="w-full bg-gradient-to-t from-[#a78bfa] to-[#7C4DFF] rounded-t-md animate-bar-5 opacity-80 group-hover:opacity-100 transition-opacity"></div>
                            </div>
                            <div class="flex items-center justify-between mt-4 pt-4 border-t border-[#EDE9FE]">
                                <span class="text-[11px] font-extrabold text-gray-400 uppercase tracking-wider">Live Activity</span>
                                <span class="text-[10px] font-extrabold text-[#10b981] bg-emerald-50/80 backdrop-blur-md px-2.5 py-1 rounded-full flex items-center gap-1.5 shadow-[0_4px_10px_rgba(16,185,129,0.1)] border border-emerald-100/50 group-hover:shadow-[0_6px_15px_rgba(16,185,129,0.25)] transition-shadow duration-500"><i class="fa-solid fa-arrow-trend-up"></i> +18% this month</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 rounded-[32px] bg-[#FFFFFF] border border-[#EDE9FE] shadow-[0_8px_30px_rgb(124,77,255,0.04)] hover:shadow-[0_20px_40px_rgba(124,77,255,0.12)] transition-all duration-500 group overflow-hidden relative flex flex-col md:flex-row-reverse items-center p-8 md:p-10 hover:-translate-y-1">
                    <div class="absolute inset-0 bg-gradient-to-tr from-[#F0FDF4]/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

                    <div class="w-full md:w-1/2 z-10 flex flex-col justify-center h-full md:pl-12">
                        <div class="w-16 h-16 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center mb-6 shadow-[0_0_20px_rgba(16,185,129,0.2)] float-anim group-hover:scale-110 transition-transform duration-500 border border-emerald-100">
                            <i class="fa-solid fa-shield-check text-2xl"></i>
                        </div>
                        <h3 class="text-gray-900 font-extrabold text-4xl md:text-5xl tracking-tight leading-tight mb-2">Verified</h3>
                        <p class="text-gray-500 font-semibold text-lg">Home Experts</p>
                    </div>

                    <div class="w-full md:w-1/2 mt-8 md:mt-0 relative h-full min-h-[220px] z-10 flex flex-col items-center justify-center gap-5 lg:items-start lg:pl-4">
                        <div class="relative w-full max-w-[200px] float-anim-reverse group-hover:-translate-y-2 transition-transform duration-500">
                            <div class="absolute -inset-6 bg-emerald-400/20 blur-2xl rounded-full opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <img src="images/act.png" class="relative z-10 w-full h-full object-cover rounded-[24px] shadow-[0_12px_30px_rgba(16,185,129,0.15)] border-4 border-white" onerror="this.src='https://images.unsplash.com/photo-1537368910025-700350fe46c7?w=400&q=80'" alt="Experts">
                        </div>
                        
                        <div class="bg-white/95 backdrop-blur-md px-5 py-3 rounded-full shadow-[0_10px_25px_rgba(16,185,129,0.15)] border border-emerald-50 flex items-center gap-2.5 z-20 group-hover:-translate-y-1 transition-transform duration-500 float-anim delay-100">
                            <div class="w-6 h-6 rounded-full bg-[#d1fae5] flex items-center justify-center shadow-inner">
                                <i class="fa-solid fa-check text-[#10b981] text-[11px]"></i>
                            </div>
                            <span class="text-sm font-extrabold text-gray-800 tracking-wide">Background Checked</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="categories" class="py-16 reveal-up px-6 w-full">
        <div class="max-w-7xl mx-auto w-full">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-3 tracking-tight">Services We Provide For</h2>
                <p class="text-gray-500 font-medium max-w-xl mx-auto text-sm md:text-base">Professional doorstep solutions for essential home appliances with fast response, verified experts, and reliable support across Bangalore.</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-6">
                <a href="ac-service.php" class="group flex flex-col items-center p-6 bg-white/40 backdrop-blur-xl border border-white/60 rounded-[2rem] hover:-translate-y-2 hover:bg-white/80 hover:shadow-glow transition-all duration-400 relative overflow-hidden cursor-pointer w-full shadow-sm">
                    <div class="absolute inset-0 bg-gradient-to-b from-white/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                    <div class="w-20 h-20 bg-brand-50 rounded-2xl flex items-center justify-center border border-white mb-4 group-hover:scale-110 transition-transform duration-400 shadow-inner z-10 relative">
                        <div class="absolute w-full h-full bg-brand-800/20 blur-xl rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="images/ac.png" alt="AC Service" class="w-12 h-12 object-contain relative z-10 drop-shadow-sm" onerror="this.src='https://cdn-icons-png.flaticon.com/512/2911/2911145.png'">
                    </div>
                    <span class="font-bold text-gray-800 group-hover:text-brand-800 transition-colors z-10">AC Service</span>
                </a>

                <a href="water-purifier.php" class="group flex flex-col items-center p-6 bg-white/40 backdrop-blur-xl border border-white/60 rounded-[2rem] hover:-translate-y-2 hover:bg-white/80 hover:shadow-glow transition-all duration-400 relative overflow-hidden w-full shadow-sm">
                    <div class="absolute inset-0 bg-gradient-to-b from-white/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                    <div class="w-20 h-20 bg-brand-50 rounded-2xl flex items-center justify-center border border-white mb-4 group-hover:scale-110 transition-transform duration-400 shadow-inner z-10 relative">
                        <div class="absolute w-full h-full bg-brand-800/20 blur-xl rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="images/water_purifier.png" alt="Water Purifier" class="w-12 h-12 object-contain relative z-10 drop-shadow-sm" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3063/3063825.png'">
                    </div>
                    <span class="font-bold text-gray-800 group-hover:text-brand-800 transition-colors z-10 text-center">Water Purifier</span>
                </a>

                <a href="fridge-repair.php" class="group flex flex-col items-center p-6 bg-white/40 backdrop-blur-xl border border-white/60 rounded-[2rem] hover:-translate-y-2 hover:bg-white/80 hover:shadow-glow transition-all duration-400 relative overflow-hidden w-full shadow-sm">
                    <div class="absolute inset-0 bg-gradient-to-b from-white/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                    <div class="w-20 h-20 bg-brand-50 rounded-2xl flex items-center justify-center border border-white mb-4 group-hover:scale-110 transition-transform duration-400 shadow-inner z-10 relative">
                        <div class="absolute w-full h-full bg-brand-800/20 blur-xl rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="images/fridge.png" alt="Refrigerator" class="w-12 h-12 object-contain relative z-10 drop-shadow-sm" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3021/3021102.png'">
                    </div>
                    <span class="font-bold text-gray-800 group-hover:text-brand-800 transition-colors z-10 text-center">Refrigerator</span>
                </a>

                <a href="washing-machine.php" class="group flex flex-col items-center p-6 bg-white/40 backdrop-blur-xl border border-white/60 rounded-[2rem] hover:-translate-y-2 hover:bg-white/80 hover:shadow-glow transition-all duration-400 relative overflow-hidden w-full shadow-sm">
                    <div class="absolute inset-0 bg-gradient-to-b from-white/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                    <div class="w-20 h-20 bg-brand-50 rounded-2xl flex items-center justify-center border border-white mb-4 group-hover:scale-110 transition-transform duration-400 shadow-inner z-10 relative">
                        <div class="absolute w-full h-full bg-brand-800/20 blur-xl rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="images/washing-machine.png" alt="Washing Machine" class="w-12 h-12 object-contain relative z-10 drop-shadow-sm" onerror="this.src='https://cdn-icons-png.flaticon.com/512/882/882745.png'">
                    </div>
                    <span class="font-bold text-gray-800 group-hover:text-brand-800 transition-colors z-10 text-center">Washing Machine</span>
                </a>

                <a href="geyser-service.php" class="group flex flex-col items-center p-6 bg-white/40 backdrop-blur-xl border border-white/60 rounded-[2rem] hover:-translate-y-2 hover:bg-white/80 hover:shadow-glow transition-all duration-400 relative overflow-hidden col-span-2 md:col-span-1 lg:col-span-1 w-full shadow-sm">
                    <div class="absolute inset-0 bg-gradient-to-b from-white/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                    <div class="w-20 h-20 bg-brand-50 rounded-2xl flex items-center justify-center border border-white mb-4 group-hover:scale-110 transition-transform duration-400 shadow-inner z-10 relative">
                        <div class="absolute w-full h-full bg-brand-800/20 blur-xl rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="images/geyser.png" alt="Geyser" class="w-12 h-12 object-contain relative z-10 drop-shadow-sm" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3063/3063854.png'">
                    </div>
                    <span class="font-bold text-gray-800 group-hover:text-brand-800 transition-colors z-10 text-center">Geyser</span>
                </a>

            </div>
        </div>
    </section>

    <section id="service-journey" class="py-20 relative overflow-hidden w-full bg-gradient-to-b from-white via-brand-50/50 to-white">
        <div class="absolute top-10 left-10 w-[400px] h-[400px] bg-brand-200/30 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="absolute bottom-10 right-10 w-[300px] h-[300px] bg-indigo-200/30 rounded-full blur-[80px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 md:px-6 relative z-10 w-full reveal-up">
            
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 mb-4 tracking-tight">Your Service Journey</h2>
                <p class="text-gray-500 font-medium max-w-2xl mx-auto text-base md:text-lg">From booking to doorstep service, Daksh keeps every step simple, transparent, and stress-free.</p>
            </div>

            <div class="relative w-full mt-10">
                <div class="absolute left-[39px] top-0 bottom-0 w-1 bg-brand-100 rounded-full overflow-hidden z-0 lg:hidden block">
                    <div class="absolute top-0 left-0 w-full h-1/3 bg-gradient-to-b from-transparent via-brand-500 to-transparent animate-journey-y"></div>
                </div>
                <div class="absolute top-[88px] left-0 right-0 h-1 w-full bg-brand-100 rounded-full overflow-hidden z-0 hidden lg:block">
                    <div class="absolute top-0 left-0 w-1/3 h-full bg-gradient-to-r from-transparent via-brand-500 to-transparent animate-journey-x"></div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-5 gap-10 lg:gap-6 relative z-10 w-full">
                    
                    <div class="flex flex-row lg:flex-col items-start lg:items-center relative group gap-6 lg:gap-4 w-full">
                        <div class="w-20 h-20 lg:w-16 lg:h-16 rounded-full bg-white border-4 border-brand-50 flex items-center justify-center flex-shrink-0 z-10 shadow-sm group-hover:border-brand-300 group-hover:shadow-[0_0_20px_rgba(139,92,246,0.3)] transition-all duration-500">
                            <span class="text-brand-800 font-extrabold text-xl lg:text-lg">1</span>
                        </div>
                        <div class="glass-panel p-5 rounded-[28px] w-full hover:-translate-y-2 hover:shadow-card-premium-hover transition-all duration-500 relative bg-white/70">
                            <div class="h-24 bg-brand-50/50 rounded-2xl border border-white p-3 mb-4 shadow-sm relative overflow-hidden group-hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-center mb-3">
                                    <div class="w-14 h-2 bg-brand-200 rounded"></div>
                                    <div class="w-4 h-4 rounded bg-brand-100"></div>
                                </div>
                                <div class="grid grid-cols-4 gap-1.5">
                                    <div class="h-6 rounded-md bg-white border border-brand-50"></div>
                                    <div class="h-6 rounded-md bg-white border border-brand-50"></div>
                                    <div class="h-6 rounded-md bg-brand-500 shadow-glow animate-pulse"></div>
                                    <div class="h-6 rounded-md bg-white border border-brand-50"></div>
                                </div>
                            </div>
                            <h4 class="font-bold text-gray-900 text-base mb-1">Book a Service</h4>
                            <p class="text-xs font-medium text-gray-500 leading-relaxed">Choose your appliance issue and preferred date and time slot within seconds.</p>
                        </div>
                    </div>

                    <div class="flex flex-row lg:flex-col items-start lg:items-center relative group gap-6 lg:gap-4 w-full">
                        <div class="w-20 h-20 lg:w-16 lg:h-16 rounded-full bg-white border-4 border-brand-50 flex items-center justify-center flex-shrink-0 z-10 shadow-sm group-hover:border-brand-300 group-hover:shadow-[0_0_20px_rgba(139,92,246,0.3)] transition-all duration-500">
                            <span class="text-brand-800 font-extrabold text-xl lg:text-lg">2</span>
                        </div>
                        <div class="glass-panel p-5 rounded-[28px] w-full hover:-translate-y-2 hover:shadow-card-premium-hover transition-all duration-500 relative bg-white/70">
                            <div class="h-24 bg-white rounded-2xl border border-brand-50 p-3 mb-4 shadow-sm flex items-center gap-3 relative group-hover:shadow-md transition-shadow">
                                <div class="absolute top-2 right-2 bg-emerald-50 text-emerald-600 text-[7px] font-extrabold px-1.5 py-0.5 rounded-full border border-emerald-200/50 uppercase tracking-wider">Verified</div>
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-indigo-400 to-brand-600 flex-shrink-0 flex items-center justify-center border-2 border-white shadow-sm">
                                    <i class="fa-solid fa-user text-white text-lg"></i>
                                </div>
                                <div class="flex flex-col gap-1.5 w-full">
                                    <div class="w-3/4 h-2 bg-gray-800 rounded-sm"></div>
                                    <div class="w-1/2 h-1.5 bg-gray-300 rounded-sm"></div>
                                    <div class="flex gap-0.5 mt-0.5">
                                        <i class="fa-solid fa-star text-[8px] text-amber-400"></i>
                                        <i class="fa-solid fa-star text-[8px] text-amber-400"></i>
                                        <i class="fa-solid fa-star text-[8px] text-amber-400"></i>
                                        <i class="fa-solid fa-star text-[8px] text-amber-400"></i>
                                        <i class="fa-solid fa-star text-[8px] text-amber-400"></i>
                                    </div>
                                </div>
                            </div>
                            <h4 class="font-bold text-gray-900 text-base mb-1">Technician Assigned</h4>
                            <p class="text-xs font-medium text-gray-500 leading-relaxed">A verified Daksh technician is assigned based on your location and service requirement.</p>
                        </div>
                    </div>

                    <div class="flex flex-row lg:flex-col items-start lg:items-center relative group gap-6 lg:gap-4 w-full">
                        <div class="w-20 h-20 lg:w-16 lg:h-16 rounded-full bg-white border-4 border-brand-50 flex items-center justify-center flex-shrink-0 z-10 shadow-sm group-hover:border-brand-300 group-hover:shadow-[0_0_20px_rgba(139,92,246,0.3)] transition-all duration-500">
                            <span class="text-brand-800 font-extrabold text-xl lg:text-lg">3</span>
                        </div>
                        <div class="glass-panel p-5 rounded-[28px] w-full hover:-translate-y-2 hover:shadow-card-premium-hover transition-all duration-500 relative bg-white/70">
                            <div class="h-24 bg-brand-50 rounded-2xl border border-white p-3 mb-4 shadow-sm relative overflow-hidden flex items-center justify-center group-hover:shadow-md transition-shadow">
                                <div class="absolute inset-0 opacity-40 map-pattern"></div>
                                <div class="absolute w-full h-[2px] bg-brand-300 top-1/2 left-0 -rotate-12 border-dashed border-t-2 border-brand-400 opacity-50"></div>
                                <div class="bg-white px-3 py-1.5 rounded-full shadow-lg border border-brand-100 z-10 flex items-center gap-2 relative">
                                    <div class="w-2 h-2 bg-brand-500 rounded-full animate-ping absolute"></div>
                                    <div class="w-2 h-2 bg-brand-500 rounded-full relative"></div>
                                    <span class="text-[9px] font-extrabold text-gray-800 tracking-wide">ETA 15 MIN</span>
                                </div>
                            </div>
                            <div class="inline-flex mb-2 px-2 py-0.5 bg-brand-50 border border-brand-100 rounded text-[9px] font-bold text-brand-800 uppercase tracking-widest">Live Tracking</div>
                            <h4 class="font-bold text-gray-900 text-base mb-1">Live Arrival Updates</h4>
                            <p class="text-xs font-medium text-gray-500 leading-relaxed">Receive real-time arrival updates and service notifications.</p>
                        </div>
                    </div>

                    <div class="flex flex-row lg:flex-col items-start lg:items-center relative group gap-6 lg:gap-4 w-full">
                        <div class="w-20 h-20 lg:w-16 lg:h-16 rounded-full bg-white border-4 border-brand-50 flex items-center justify-center flex-shrink-0 z-10 shadow-sm group-hover:border-brand-300 group-hover:shadow-[0_0_20px_rgba(139,92,246,0.3)] transition-all duration-500">
                            <span class="text-brand-800 font-extrabold text-xl lg:text-lg">4</span>
                        </div>
                        <div class="glass-panel p-5 rounded-[28px] w-full hover:-translate-y-2 hover:shadow-card-premium-hover transition-all duration-500 relative bg-white/70">
                            <div class="h-24 bg-white rounded-2xl border border-brand-50 p-4 mb-4 shadow-sm flex flex-col justify-center gap-3 group-hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-center">
                                    <div class="w-8 h-8 rounded-xl bg-blue-50 flex items-center justify-center border border-blue-100">
                                        <i class="fa-solid fa-screwdriver-wrench text-blue-500 text-sm"></i>
                                    </div>
                                    <div class="bg-blue-50 text-blue-600 text-[8px] font-extrabold px-2 py-1 rounded-full uppercase tracking-wider border border-blue-100">In Progress</div>
                                </div>
                                <div class="w-full bg-gray-100 h-1.5 rounded-full overflow-hidden">
                                    <div class="w-[60%] h-full bg-gradient-to-r from-blue-400 to-brand-500 rounded-full shadow-glow"></div>
                                </div>
                            </div>
                            <div class="inline-flex mb-2 px-2 py-0.5 bg-blue-50 border border-blue-100 rounded text-[9px] font-bold text-blue-700 uppercase tracking-widest">Real-Time Updates</div>
                            <h4 class="font-bold text-gray-900 text-base mb-1">Service & Inspection</h4>
                            <p class="text-xs font-medium text-gray-500 leading-relaxed">The technician inspects the issue and explains the required work transparently.</p>
                        </div>
                    </div>

                    <div class="flex flex-row lg:flex-col items-start lg:items-center relative group gap-6 lg:gap-4 w-full">
                        <div class="w-20 h-20 lg:w-16 lg:h-16 rounded-full bg-white border-4 border-brand-50 flex items-center justify-center flex-shrink-0 z-10 shadow-sm group-hover:border-brand-300 group-hover:shadow-[0_0_20px_rgba(139,92,246,0.3)] transition-all duration-500">
                            <span class="text-brand-800 font-extrabold text-xl lg:text-lg">5</span>
                        </div>
                        <div class="glass-panel p-5 rounded-[28px] w-full hover:-translate-y-2 hover:shadow-card-premium-hover transition-all duration-500 relative bg-white/70">
                            <div class="h-24 bg-gradient-to-br from-emerald-50 to-teal-50 rounded-2xl border border-white p-3 mb-4 shadow-sm flex flex-col items-center justify-center relative overflow-hidden group-hover:shadow-md transition-shadow">
                                <div class="absolute inset-0 bg-emerald-400/10 animate-pulse"></div>
                                <div class="w-10 h-10 bg-emerald-400 rounded-full flex items-center justify-center shadow-[0_0_15px_rgba(52,211,153,0.5)] z-10 mb-2 border-2 border-white group-hover:scale-110 transition-transform duration-300">
                                    <i class="fa-solid fa-check text-white text-lg"></i>
                                </div>
                                <div class="text-[10px] font-extrabold text-emerald-800 z-10 uppercase tracking-widest bg-white/80 px-2 py-0.5 rounded shadow-sm border border-emerald-100">30-Day Warranty</div>
                            </div>
                            <div class="inline-flex mb-2 px-2 py-0.5 bg-emerald-50 border border-emerald-100 rounded text-[9px] font-bold text-emerald-700 uppercase tracking-widest">Service Warranty</div>
                            <h4 class="font-bold text-gray-900 text-base mb-1">Issue Resolved</h4>
                            <p class="text-xs font-medium text-gray-500 leading-relaxed">Your appliance is repaired, tested, and completed with service support.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="py-16 reveal-stagger w-full bg-gradient-to-b from-transparent to-brand-50/30">
        <div class="max-w-7xl mx-auto px-6 w-full mb-10">
            <div class="text-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-3 tracking-tight">Loved by Bangalore</h2>
                <p class="text-gray-500 font-medium text-sm md:text-base">Real experiences from our trusted homeowners.</p>
            </div>
        </div>
        
        <div class="relative w-full overflow-hidden mask-edges py-6">
            <div class="flex gap-6 w-max animate-testimonial-marquee hover:[animation-play-state:paused]">
                
                <?php
                // 10 Demo Reviews specifically curated for Daksh
                $reviews = [
                    ["name" => "Siddharth M.", "loc" => "Indiranagar", "text" => "The AC repair was flawless. The technician was polite, clean, and extremely knowledgeable. Highly recommended!", "color" => "from-brand-600 to-brand-900"],
                    ["name" => "Riya K.", "loc" => "Koramangala", "text" => "Best RO service experience. Booking took 10 seconds, and the expert was here exactly on time.", "color" => "from-blue-500 to-indigo-700"],
                    ["name" => "Arjun P.", "loc" => "Whitefield", "text" => "Transparent pricing is what won me over. No haggling, just pure professional service for my washing machine.", "color" => "from-emerald-500 to-teal-700"],
                    ["name" => "Neha S.", "loc" => "HSR Layout", "text" => "My refrigerator stopped cooling, but the Daksh expert fixed it within an hour. Incredible speed and professionalism.", "color" => "from-orange-400 to-red-600"],
                    ["name" => "Vikram D.", "loc" => "Jayanagar", "text" => "Geyser installation was seamless. The pro handled everything perfectly and even cleaned up afterwards.", "color" => "from-purple-500 to-pink-600"],
                    ["name" => "Priya R.", "loc" => "Bellandur", "text" => "I've tried many services, but Daksh is definitely the most premium. The AC cooling is back to brand new!", "color" => "from-sky-400 to-blue-600"],
                    ["name" => "Amit T.", "loc" => "Marathahalli", "text" => "Very satisfied with the water purifier servicing. The app tracking feature is a game changer for busy people.", "color" => "from-teal-400 to-emerald-600"],
                    ["name" => "Kavita N.", "loc" => "BTM Layout", "text" => "The washing machine drum was making a loud noise. The expert diagnosed and replaced the part transparently.", "color" => "from-rose-400 to-red-500"],
                    ["name" => "Rohan B.", "loc" => "JP Nagar", "text" => "Excellent fridge repair service. The technician explained the issue clearly and fixed the compressor fast.", "color" => "from-indigo-400 to-brand-600"],
                    ["name" => "Sneha M.", "loc" => "Malleshwaram", "text" => "Highly reliable geyser repair. They truly live up to their 30-minute arrival promise. So impressed!", "color" => "from-amber-400 to-orange-500"]
                ];
                
                // Duplicate array to create a seamless infinite scrolling effect
                $seamlessReviews = array_merge($reviews, $reviews);
                
                foreach ($seamlessReviews as $rev):
                ?>
                
                <div class="w-[340px] bg-[#FFFFFF] rounded-[28px] border border-gray-200/60 shadow-[0_8px_30px_rgb(0,0,0,0.04)] p-6 flex flex-col gap-4 flex-shrink-0 transition-transform duration-300 hover:-translate-y-2">
                    <div class="flex items-center mb-2">
                        <div class="flex gap-1.5">
                            <div class="w-3 h-3 rounded-full bg-[#ff5f56]"></div>
                            <div class="w-3 h-3 rounded-full bg-[#ffbd2e]"></div>
                            <div class="w-3 h-3 rounded-full bg-[#27c93f]"></div>
                        </div>
                        <div class="ml-auto flex text-amber-400 text-[10px] gap-0.5">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    
                    <p class="text-gray-700 font-medium text-sm leading-relaxed flex-1 m-0">"<?= $rev['text'] ?>"</p>
                    
                    <div class="flex items-center gap-3 mt-4 pt-4 border-t border-gray-100">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br <?= $rev['color'] ?> text-white font-bold flex items-center justify-center text-lg shadow-sm">
                            <?= substr($rev['name'], 0, 1) ?>
                        </div>
                        <div class="flex flex-col leading-tight">
                            <span class="font-extrabold text-gray-900 text-sm"><?= $rev['name'] ?></span>
                            <span class="text-[11px] text-gray-500 font-semibold tracking-wide uppercase mt-0.5">Daksh, <?= $rev['loc'] ?></span>
                        </div>
                    </div>
                </div>
                
                <?php endforeach; ?>
                
            </div>
        </div>
    </section>

    <section id="faq-section" class="py-20 px-4 md:px-6 relative overflow-hidden bg-[#F8F7FC] w-full border-t border-brand-100/50">
        <div class="absolute top-0 right-[10%] w-[500px] h-[500px] bg-brand-200/40 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-[-100px] left-[5%] w-[400px] h-[400px] bg-indigo-100/50 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="max-w-6xl mx-auto relative z-10 w-full reveal-up">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight mb-4">Frequently Asked Questions</h2>
                <p class="text-gray-500 font-medium text-base md:text-lg max-w-2xl mx-auto">Everything you need to know about our premium home services.</p>
            </div>

            <div class="columns-1 md:columns-2 gap-4 md:gap-6 w-full space-y-4 md:space-y-6">
                
                <?php 
                // ✨ RESTORED DATA ARRAY ✨
                $faqs = [
                    [
                        "q" => "What services do you provide through your home service platform?",
                        "a" => "We provide expert home services for AC, Water Purifier, Washing Machine, Geyser, and Refrigerator repair, installation, maintenance, and servicing. Our trained professionals ensure fast, affordable, and reliable doorstep support for major appliance brands."
                    ],
                    [
                        "q" => "Which locations or areas do you currently serve?",
                        "a" => "We currently provide home services across most areas of Bangalore. Our service network is expanding continuously to support more locations with fast doorstep assistance."
                    ],
                    [
                        "q" => "How can customers book a service?",
                        "a" => "Customers can book a service easily through our website by selecting the required service, choosing the preferred date, time slot, and address, then confirming the booking. A technician is assigned shortly after booking confirmation."
                    ],
                    [
                        "q" => "Are your service professionals verified and trained?",
                        "a" => "Yes. All service professionals are verified, trained, and experienced to provide safe, reliable, and high-quality home services."
                    ],
                    [
                        "q" => "What are your working hours and availability?",
                        "a" => "Our services are available from 8:00 AM to 8:00 PM, seven days a week, including weekends and holidays."
                    ],
                    [
                        "q" => "How is pricing calculated for each service?",
                        "a" => "Final pricing is shared after the technician inspects the issue. This helps ensure accurate pricing based on the required work, issue complexity, and spare parts if needed."
                    ],
                    [
                        "q" => "Do you provide same-day or emergency service?",
                        "a" => "Yes. Same-day and emergency services are available depending on technician availability in your area."
                    ],
                    [
                        "q" => "What payment methods do you accept?",
                        "a" => "We accept both online payments and cash payments for customer convenience."
                    ],
                    [
                        "q" => "What happens if a customer is not satisfied with the service?",
                        "a" => "Customer satisfaction is our priority. If the issue is not resolved, our support team reviews the complaint. If the concern is found valid, we provide a full refund and arrange another technician without additional visiting or service charges."
                    ],
                    [
                        "q" => "Do you offer warranty or revisit support after service?",
                        "a" => "Yes. Eligible services include warranty and revisit support to ensure reliable after-service assistance and customer satisfaction."
                    ]
                ];

                foreach ($faqs as $index => $faq): 
                ?>
                <div class="faq-item group relative bg-[#FFFFFF] hover:bg-brand-50/30 border border-gray-200/80 rounded-[1.5rem] transition-all duration-500 cursor-pointer overflow-hidden shadow-sm hover:border-brand-300 hover:shadow-md break-inside-avoid">
                    
                    <div class="faq-header flex items-center justify-between p-5 md:p-6 gap-4 z-10 relative select-none">
                        <h4 class="text-sm md:text-base font-bold text-gray-900 group-hover:text-brand-900 transition-colors pr-2 leading-tight">
                            <?= htmlspecialchars($faq['q']) ?>
                        </h4>
                        <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 transition-transform duration-300 z-10 relative">
                            <i class="fa-solid fa-chevron-down text-teal-500 text-sm faq-icon transition-transform duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] relative z-10 group-hover:text-brand-600"></i>
                        </div>
                    </div>
                    
                    <div class="faq-body">
                        <div class="overflow-hidden">
                            <div class="px-5 pb-5 pt-0">
                                <p class="text-xs md:text-sm font-medium text-gray-600 leading-relaxed m-0 border-t border-gray-100 pt-4">
                                    <?= htmlspecialchars($faq['a']) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <section class="bg-gray-900 py-12 overflow-hidden reveal-up w-full">
        <div class="max-w-7xl mx-auto px-6 w-full">
            <h3 class="text-xs font-bold text-center uppercase tracking-[0.2em] text-brand-200 mb-6">Serving Premium Neighborhoods</h3>
            <div class="relative w-full flex overflow-hidden mask-edges">
                <div class="flex gap-16 items-center whitespace-nowrap animate-marquee">
                    <div class="text-lg font-bold text-white/80 hover:text-white transition-colors flex items-center gap-2"><i class="fa-solid fa-map-pin text-brand-500 text-sm"></i> MG Road</div>
                    <div class="text-lg font-bold text-white/80 hover:text-white transition-colors flex items-center gap-2"><i class="fa-solid fa-map-pin text-brand-500 text-sm"></i> Brigade Road</div>
                    <div class="text-lg font-bold text-white/80 hover:text-white transition-colors flex items-center gap-2"><i class="fa-solid fa-map-pin text-brand-500 text-sm"></i> Indiranagar</div>
                    <div class="text-lg font-bold text-white/80 hover:text-white transition-colors flex items-center gap-2"><i class="fa-solid fa-map-pin text-brand-500 text-sm"></i> Koramangala</div>
                    <div class="text-lg font-bold text-white/80 hover:text-white transition-colors flex items-center gap-2"><i class="fa-solid fa-map-pin text-brand-500 text-sm"></i> Whitefield</div>
                    <div class="text-lg font-bold text-white/80 hover:text-white transition-colors flex items-center gap-2"><i class="fa-solid fa-map-pin text-brand-500 text-sm"></i> HSR Layout</div>
                    <div class="text-lg font-bold text-white/80 hover:text-white transition-colors flex items-center gap-2"><i class="fa-solid fa-map-pin text-brand-500 text-sm"></i> Jayanagar</div>
                </div>
            </div>
        </div>
    </section>

    <section id="premium-cta-section" class="py-16 px-4 md:px-6 reveal-up relative z-20 w-full mb-10 mt-10">
        <div class="max-w-7xl mx-auto relative rounded-[40px] overflow-hidden shadow-[0_20px_50px_rgba(27,0,54,0.3)] w-full bg-gradient-to-br from-[#1B0036] to-[#2A0055] border border-white/10">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#7C4DFF]/30 rounded-full blur-[120px] pointer-events-none"></div>
            <div class="absolute bottom-[-100px] left-[-100px] w-[400px] h-[400px] bg-[#C7B8FF]/20 rounded-full blur-[100px] pointer-events-none"></div>
            
            <div class="flex flex-col lg:flex-row items-center justify-between p-8 md:p-12 lg:p-16 relative z-10 gap-12">
                <div class="w-full lg:w-3/5 text-center lg:text-left">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white leading-tight tracking-tight mb-6">
                        Emergency services — <br class="hidden md:block">
                        arrive within <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#C7B8FF] to-[#7C4DFF]">30 minutes</span>
                    </h2>
                    
                    <div class="flex flex-wrap justify-center lg:justify-start gap-3 mb-8 w-full">
                        <span class="px-5 py-2 rounded-full bg-white/5 border border-white/10 text-white text-xs md:text-sm font-semibold backdrop-blur-md hover:bg-white/10 hover:shadow-[0_0_20px_rgba(124,77,255,0.4)] transition-all cursor-default">AC</span>
                        <span class="px-5 py-2 rounded-full bg-white/5 border border-white/10 text-white text-xs md:text-sm font-semibold backdrop-blur-md hover:bg-white/10 hover:shadow-[0_0_20px_rgba(124,77,255,0.4)] transition-all cursor-default">Water Purifier</span>
                        <span class="px-5 py-2 rounded-full bg-white/5 border border-white/10 text-white text-xs md:text-sm font-semibold backdrop-blur-md hover:bg-white/10 hover:shadow-[0_0_20px_rgba(124,77,255,0.4)] transition-all cursor-default">Washing Machine</span>
                        <span class="px-5 py-2 rounded-full bg-white/5 border border-white/10 text-white text-xs md:text-sm font-semibold backdrop-blur-md hover:bg-white/10 hover:shadow-[0_0_20px_rgba(124,77,255,0.4)] transition-all cursor-default">Geyser</span>
                        <span class="px-5 py-2 rounded-full bg-white/5 border border-white/10 text-white text-xs md:text-sm font-semibold backdrop-blur-md hover:bg-white/10 hover:shadow-[0_0_20px_rgba(124,77,255,0.4)] transition-all cursor-default">Fridge</span>
                    </div>

                    <button class="modal-trigger-btn bg-white text-[#1B0036] hover:bg-[#F8F7FC] hover:scale-105 transition-all duration-300 px-8 py-4 rounded-full text-base font-bold shadow-[0_10px_30px_rgba(124,77,255,0.4)] hover:shadow-[0_15px_40px_rgba(124,77,255,0.6)] inline-flex items-center justify-center gap-2">
                        Book Now <i class="fa-solid fa-arrow-right text-sm"></i>
                    </button>
                </div>

                <div class="w-full lg:w-2/5 relative flex items-center justify-center lg:justify-end">
                    <div class="z-20 w-full max-w-sm p-6 rounded-[28px] bg-[#2A0055]/60 backdrop-blur-2xl border border-[#7C4DFF]/30 shadow-[0_20px_40px_rgba(0,0,0,0.4)] float-anim relative overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#7C4DFF]/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                        
                        <div class="flex items-center gap-4 mb-6 relative z-10">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#7C4DFF] to-[#2A0055] flex items-center justify-center p-3 shadow-[0_0_20px_rgba(124,77,255,0.4)] border border-white/20 group-hover:scale-110 transition-transform duration-500">
                                <img src="images/ac.png" alt="AC" class="w-full h-full object-contain filter brightness-0 invert drop-shadow-md" onerror="this.src='https://cdn-icons-png.flaticon.com/512/2911/2911145.png'">
                            </div>
                            <div class="flex flex-col gap-1 text-left">
                                <h4 class="text-white font-extrabold text-base md:text-lg leading-none">AC Service</h4>
                                <p class="text-[#C7B8FF] text-[10px] md:text-xs font-semibold uppercase tracking-wider bg-[#1B0036]/50 px-2 py-1 rounded-md inline-block w-max border border-[#7C4DFF]/30 mt-1">Technician assigned</p>
                            </div>
                        </div>
                        
                        <div class="w-full bg-[#1B0036] h-2.5 rounded-full overflow-hidden relative z-10 mb-4 shadow-inner border border-white/5">
                            <div class="w-[80%] h-full bg-gradient-to-r from-emerald-500 to-emerald-300 rounded-full shadow-[0_0_15px_rgba(52,211,153,0.8)] relative overflow-hidden">
                                <div class="absolute top-0 bottom-0 left-0 w-full bg-gradient-to-r from-transparent via-white/50 to-transparent animate-journey-x"></div>
                            </div>
                        </div>
                        <p class="text-sm text-white font-medium text-right relative z-10">Arriving in <span class="text-emerald-400 font-extrabold animate-pulse">15 mins</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-brand-darkbg pt-20 pb-8 px-6 border-t-4 border-brand-600 relative overflow-hidden w-full">
        
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[80%] h-[150px] bg-brand-800/20 blur-[100px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto relative z-10 w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 lg:gap-8 mb-16 w-full">
                
                <div class="lg:col-span-1">
                    <h2 class="text-3xl font-extrabold text-white mb-4 tracking-tight">Daksh<span class="text-brand-500">.</span></h2>
                    <p class="text-sm text-brand-200/70 font-medium mb-6 leading-relaxed">The future of home services. We combine elite craftsmanship with modern technology to deliver peace of mind.</p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-brand-600 hover:border-brand-500 hover:-translate-y-1 hover:shadow-[0_0_15px_rgba(91,33,182,0.6)] transition-all duration-300"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-brand-600 hover:border-brand-500 hover:-translate-y-1 hover:shadow-[0_0_15px_rgba(91,33,182,0.6)] transition-all duration-300"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-brand-600 hover:border-brand-500 hover:-translate-y-1 hover:shadow-[0_0_15px_rgba(91,33,182,0.6)] transition-all duration-300"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-6 text-sm uppercase tracking-wider">Company</h4>
                    <ul class="flex flex-col gap-4 text-sm font-medium text-brand-200/70">
                        <li><a href="about.php" class="hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">About Us</a></li>
                        <li><a href="contact.php" class="hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">Contact Us</a></li>
                        <li><a href="careers.php" class="hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">Careers</a></li>
                        <li><a href="blog.php" class="hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">Blog</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-6 text-sm uppercase tracking-wider">Policies</h4>
                    <ul class="flex flex-col gap-4 text-sm font-medium text-brand-200/70">
                        <li><a href="privacy.php" class="hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">Privacy Policy</a></li>
                        <li><a href="anti-discrimination.php" class="hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">Anti-Discrimination Policy</a></li>
                        <li><a href="security.php" class="hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">Platform Security Policy</a></li>
                        <li><a href="terms-and-conditions.php" class="hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">Terms & Conditions</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-6 text-sm uppercase tracking-wider">Services</h4>
                    <ul class="flex flex-col gap-4 text-sm font-medium text-brand-200/70">
                        <li><a href="ac-service.php" class="text-brand-400 hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">AC Service</a></li>
                        <li><a href="water-purifier.php" class="hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">Water Purifier Service</a></li>
                        <li><a href="fridge-repair.php" class="hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">Refrigerator Repair</a></li>
                        <li><a href="washing-machine.php" class="hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">Washing Machine Repair</a></li>
                        <li><a href="geyser-service.php" class="hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">Geyser Service</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-6 text-sm uppercase tracking-wider">Quick Links</h4>
                    <ul class="flex flex-col gap-4 text-sm font-medium text-brand-200/70">
                        <?php if ($isLoggedIn): ?>
                            <li><a href="#" class="modal-trigger-btn hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">Book Service</a></li>
                            <li><a href="#" class="hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">Track Booking</a></li>
                            <li><a href="logout.php" class="hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">Logout</a></li>
                        <?php else: ?>
                            <li><a href="login.php" class="hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">Login / Book Service</a></li>
                            <li><a href="register.php" class="hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">Register</a></li>
                        <?php endif; ?>
                        <li><a href="#" class="hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">Customer Login</a></li>
                        <li><a href="#" class="hover:text-white hover:translate-x-1 transition-all duration-300 hover:drop-shadow-[0_0_8px_rgba(168,85,247,0.8)] block">Technician Login</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-6 text-xs font-medium text-brand-200/60 w-full">
                <div class="text-center md:text-left">
                    &copy; <?php echo $currentYear; ?> Daksh. All rights reserved.
                </div>
                <div class="flex flex-wrap justify-center md:justify-end gap-6 md:gap-8">
                    <a href="privacy.php" class="hover:text-white transition-colors duration-300">Privacy Policy</a>
                    <a href="terms-and-conditions.php" class="hover:text-white transition-colors duration-300">Terms</a>
                    <a href="mailto:support@daksh.service.com" class="hover:text-white transition-colors duration-300">support@daksh.service.com</a>
                </div>
            </div>
        </div>
    </footer>

    <div class="md:hidden">
        <nav class="fixed bottom-6 left-1/2 -translate-x-1/2 w-[90%] max-w-sm bg-white/80 backdrop-blur-xl border border-white/60 rounded-full px-2 py-2 flex justify-between items-center shadow-[0_10px_40px_rgba(91,33,182,0.15)] z-[100]">
            <a href="index.php" class="nav-item active group flex items-center justify-center px-4 py-2.5 rounded-full text-gray-500 transition-all cursor-pointer">
                <i class="fa-solid fa-house text-lg group-[.active]:text-brand-800 transition-colors"></i>
                <span class="max-w-0 opacity-0 overflow-hidden text-xs font-bold transition-all group-[.active]:max-w-[100px] group-[.active]:opacity-100 group-[.active]:ml-2 text-brand-800 whitespace-nowrap">Home</span>
            </a>
            <a href="<?php echo $isLoggedIn ? '#' : 'login.php'; ?>" class="nav-item group flex items-center justify-center px-4 py-2.5 rounded-full text-gray-500 transition-all cursor-pointer">
                <i class="fa-solid fa-clipboard-list text-lg group-[.active]:text-brand-800 transition-colors"></i>
                <span class="max-w-0 opacity-0 overflow-hidden text-xs font-bold transition-all group-[.active]:max-w-[100px] group-[.active]:opacity-100 group-[.active]:ml-2 text-brand-800 whitespace-nowrap">Bookings</span>
            </a>
            <a href="#" class="nav-item group flex items-center justify-center px-4 py-2.5 rounded-full text-gray-500 transition-all cursor-pointer">
                <i class="fa-solid fa-tag text-lg group-[.active]:text-brand-800 transition-colors"></i>
                <span class="max-w-0 opacity-0 overflow-hidden text-xs font-bold transition-all group-[.active]:max-w-[100px] group-[.active]:opacity-100 group-[.active]:ml-2 text-brand-800 whitespace-nowrap">Offers</span>
            </a>
            <a href="<?php echo $isLoggedIn ? '#' : 'login.php'; ?>" class="nav-item group flex items-center justify-center px-4 py-2.5 rounded-full text-gray-500 transition-all cursor-pointer">
                <i class="fa-regular fa-user text-lg group-[.active]:text-brand-800 transition-colors"></i>
                <span class="max-w-0 opacity-0 overflow-hidden text-xs font-bold transition-all group-[.active]:max-w-[100px] group-[.active]:opacity-100 group-[.active]:ml-2 text-brand-800 whitespace-nowrap">Account</span>
            </a>
        </nav>
    </div>

    <div id="bookNowModal" class="fixed inset-0 z-[9999] flex items-center justify-center opacity-0 invisible transition-all duration-300">
        <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm modal-close-trigger cursor-pointer"></div>
        
        <?php if ($isLoggedIn): ?>
        <div class="bg-white/95 backdrop-blur-xl border border-white/50 w-[90%] max-w-sm rounded-[2rem] p-6 shadow-2xl scale-95 transition-transform duration-300 relative z-10 modal-content-box">
            <div class="flex justify-between items-center mb-2">
                <h3 class="text-lg font-extrabold text-gray-900">Select Service</h3>
                <button class="modal-close-trigger w-8 h-8 flex items-center justify-center bg-gray-100 hover:bg-gray-200 rounded-full text-gray-600 transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            
            <p class="text-xs font-medium text-gray-500 mb-6">Choose a category to continue booking.</p>
            
            <div class="grid grid-cols-3 gap-3">
                <a href="water-purifier.php" class="flex flex-col items-center p-3 bg-brand-50 border border-brand-100/50 rounded-2xl hover:bg-white hover:shadow-md hover:border-brand-200 transition-all text-gray-800 hover:text-brand-800 font-bold text-[10px] text-center">
                    <img src="images/water_purifier.png" class="w-10 h-10 object-contain mb-2 drop-shadow-sm" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3063/3063825.png'" alt="RO">
                    <span>RO Service</span>
                </a>
                <a href="washing-machine.php" class="flex flex-col items-center p-3 bg-brand-50 border border-brand-100/50 rounded-2xl hover:bg-white hover:shadow-md hover:border-brand-200 transition-all text-gray-800 hover:text-brand-800 font-bold text-[10px] text-center">
                    <img src="images/washing-machine.png" class="w-10 h-10 object-contain mb-2 drop-shadow-sm" onerror="this.src='https://cdn-icons-png.flaticon.com/512/882/882745.png'" alt="Wash">
                    <span>Washing</span>
                </a>
                <a href="ac-service.php" class="flex flex-col items-center p-3 bg-brand-50 border border-brand-100/50 rounded-2xl hover:bg-white hover:shadow-md hover:border-brand-200 transition-all text-gray-800 hover:text-brand-800 font-bold text-[10px] text-center cursor-pointer">
                    <img src="images/ac.png" class="w-10 h-10 object-contain mb-2 drop-shadow-sm" onerror="this.src='https://cdn-icons-png.flaticon.com/512/2911/2911145.png'" alt="AC">
                    <span>AC</span>
                </a>
                <a href="fridge-repair.php" class="flex flex-col items-center p-3 bg-brand-50 border border-brand-100/50 rounded-2xl hover:bg-white hover:shadow-md hover:border-brand-200 transition-all text-gray-800 hover:text-brand-800 font-bold text-[10px] text-center">
                    <img src="images/fridge.png" class="w-10 h-10 object-contain mb-2 drop-shadow-sm" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3021/3021102.png'" alt="Fridge">
                    <span>Fridge</span>
                </a>
                <a href="geyser-service.php" class="flex flex-col items-center p-3 bg-brand-50 border border-brand-100/50 rounded-2xl hover:bg-white hover:shadow-md hover:border-brand-200 transition-all text-gray-800 hover:text-brand-800 font-bold text-[10px] text-center">
                    <img src="images/geyser.png" class="w-10 h-10 object-contain mb-2 drop-shadow-sm" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3063/3063854.png'" alt="Geyser">
                    <span>Geyser</span>
                </a>
            </div>
        </div>
        
        <?php else: ?>
        
        <div class="bg-gradient-to-br from-brand-900 to-brand-950 backdrop-blur-2xl border border-brand-400/30 w-[90%] max-w-sm rounded-[2rem] p-8 shadow-[0_20px_50px_rgba(46,16,101,0.5)] scale-95 transition-transform duration-300 relative z-10 modal-content-box overflow-hidden">
            <div class="absolute top-0 right-0 w-40 h-40 bg-brand-500/20 rounded-full blur-[50px] pointer-events-none"></div>
            
            <button class="modal-close-trigger absolute top-4 right-4 w-8 h-8 flex items-center justify-center bg-white/10 hover:bg-white/20 rounded-full text-white/80 transition-colors z-20">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div class="flex flex-col items-center justify-center text-center relative z-10">
                <div class="w-16 h-16 bg-gradient-to-br from-brand-100 to-white text-brand-900 rounded-2xl flex items-center justify-center mb-5 shadow-[0_0_20px_rgba(255,255,255,0.2)]">
                    <i class="fa-solid fa-shield-lock text-2xl"></i>
                </div>
                <h4 class="text-xl font-extrabold text-white mb-2">Login Required</h4>
                <p class="text-sm font-medium text-brand-100/80 mb-8 px-2">Please log in to securely book and track our premium home services.</p>
                
                <a href="login.php" class="w-full bg-white text-brand-900 rounded-xl px-4 py-3.5 text-sm font-bold hover:bg-brand-50 transition-all shadow-[0_4px_15px_rgba(255,255,255,0.15)] hover:shadow-[0_6px_20px_rgba(255,255,255,0.25)] hover:-translate-y-0.5 flex justify-center items-center gap-2">
                    Login to Continue <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
                <a href="register.php" class="text-brand-200/80 hover:text-white text-xs font-semibold mt-5 transition-colors hover:underline underline-offset-2">
                    Don't have an account? Register here
                </a>
            </div>
        </div>
        
        <?php endif; ?>
    </div>

    <div id="locationModal" class="fixed inset-0 z-[10000] flex items-center justify-center opacity-0 invisible transition-all duration-300">
        <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm location-close-trigger cursor-pointer transition-opacity"></div>
        <div class="bg-white/95 backdrop-blur-2xl border border-brand-200/50 w-[95%] max-w-md rounded-[2rem] p-6 shadow-[0_0_40px_rgba(91,33,182,0.2)] scale-95 transition-transform duration-300 relative z-10 location-content-box flex flex-col max-h-[85vh]">
            
            <div class="flex justify-between items-center mb-5">
                <h3 class="text-xl font-extrabold text-gray-900 tracking-tight">Select Location</h3>
                <button class="location-close-trigger w-8 h-8 flex items-center justify-center bg-gray-100 hover:bg-gray-200 rounded-full text-gray-600 transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="relative mb-4">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fa-solid fa-magnifying-glass text-brand-800/60"></i>
                </div>
                <input type="text" id="locationSearchInput" class="w-full bg-brand-50 border border-brand-100 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-brand-500 focus:border-brand-500 block pl-10 p-3 font-medium transition-all outline-none" placeholder="Search service area">
            </div>

            <div class="flex-1 overflow-y-auto pr-2 custom-scrollbar space-y-1 mb-4" id="locationListContainer">
            </div>

            <div class="border-t border-brand-100 pt-4 mt-2">
                <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-3">Can't find your area?</h4>
                <div id="pincodeRequestForm" class="flex gap-2 relative">
                    <input type="text" id="pincodeInput" maxlength="6" class="flex-1 bg-white border border-brand-200 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-brand-500 focus:border-brand-500 block px-3 py-2.5 font-medium outline-none transition-all" placeholder="Enter your pincode">
                    <button type="button" id="pincodeSubmitBtn" class="bg-brand-800 text-white px-4 py-2.5 rounded-xl text-sm font-bold shadow-sm hover:bg-brand-900 hover:shadow-glow transition-all whitespace-nowrap min-w-[90px] flex justify-center items-center">
                        Request
                    </button>
                </div>
                <div id="pincodeSuccessMsg" class="hidden mt-3 text-xs font-bold text-emerald-700 bg-emerald-50/90 backdrop-blur-md px-4 py-3 rounded-xl border border-emerald-200/50 shadow-sm items-center gap-2 transition-all duration-300">
                    <div class="w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-check text-emerald-600"></i>
                    </div>
                    <span>Service request submitted successfully.</span>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach(item => {
                const header = item.querySelector('.faq-header');
                
                header.addEventListener('click', () => {
                    const isActive = item.classList.contains('active');
                    
                    // Close all other FAQs for clean UX
                    faqItems.forEach(otherItem => {
                        if(otherItem !== item) {
                            otherItem.classList.remove('active');
                        }
                    });

                    // Toggle current FAQ
                    if (!isActive) {
                        item.classList.add('active');
                    } else {
                        item.classList.remove('active');
                    }
                });
            });
        });
    </script>
    
    <script src="script.php"></script>
</body>
</html>
