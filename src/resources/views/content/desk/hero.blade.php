<section class="hero-section">
    <div class="hero-container">
        <!-- Text Content -->
        <div class="hero-content">
            <h1 class="hero-name slide-in-left">M Estiaque Ahmed Khan</h1>
            <h2 class="hero-title slide-in-right">Software Engineer</h2>
            <p class="hero-description slide-in-left">
                A dedicated PHP and Laravel expert specializing in high-performance ERP systems, inventory software, and scalable web applications, driving enterprise efficiency through robust code.
            </p>
            
            <div class="hero-socials">
                <a href="https://linkedin.com/in/demo" target="_blank" aria-label="LinkedIn" class="social-link slide-in-left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect width="4" height="12" x="2" y="9"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                </a>
                <a href="https://github.com/demo" target="_blank" aria-label="Github" class="social-link slide-in-up">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"></path><path d="M9 18c-4.51 2-5-2-7-2"></path></svg>
                </a>
                <a href="https://facebook.com/demo" target="_blank" aria-label="Facebook" class="social-link slide-in-down">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                </a>
                <a href="mailto:hello@me.dev" aria-label="Email" class="social-link slide-in-up">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path><rect x="2" y="4" width="20" height="16" rx="2"></rect></svg>
                </a>
                <a href="tel:+8801234567890" aria-label="Phone" class="social-link slide-in-right">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384"></path></svg>
                </a>
            </div>
        </div>

        <!-- Image Section -->
        <div class="hero-image-wrapper" style="animation: slideInDown 1s ease-in-out none; ">
            <div class="image-orbit orbit-1"></div>
            <div class="image-orbit orbit-2"></div>
            <div class="image-glow"></div>
            <div class="image-frame">
                <img src="{{ get_image('profile_image') }}" alt="M. Estiaque Ahmed Khan">
            </div>
        </div>
    </div>
</section>


<link href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap" rel="stylesheet">
<style>
    /* Root Variables for easy color changes */
:root {
    --bg-dark: #050014;
    --text-main: #f8fafc;
    --text-muted: #94a3b8;
    --accent-cyan: #22d3ee;
    --accent-blue: #3b82f6;
    --gradient-text: linear-gradient(to right, #bfdbfe, #cffafe, #a7f3d0);
    --gradient-blue: linear-gradient(to right, #22d3ee, #3b82f6);
}

/* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: var(--bg-dark);
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    color: var(--text-main);
    overflow-x: hidden;
}

/* Hero Layout */
.hero-section {
    min-height: 90vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
}

.hero-container {
    /* max-width: 1200px; */
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 4rem;
}

/* Content Styling */
.hero-content {
    flex: 1;
    /* max-width: 700px; */
}

/* .hero-name {
    font-size: clamp(2.5rem, 8vw, 5rem);
    font-weight: 800;
    line-height: 1.1;
    background: var(--gradient-text);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1rem;
    letter-spacing: -0.02em;
} */


.hero-name {
    font-family: 'Nosifer', cursive; /* Applying the dripping font */
    font-size: clamp(2rem, 8vw, 5.5rem); /* Slightly adjusted size for this font */
    font-weight: 400; /* Nosifer only has one weight */
    line-height: 1.5; /* Increased line-height so drips have space */
    background: var(--gradient-text);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1.5rem;
    letter-spacing: 0.02em;
    
    /* This creates the neon glow effect seen in your image */
    filter: drop-shadow(0 0 10px rgba(165, 243, 252, 0.5));
    text-transform: uppercase; /* Makes it look exactly like the image */
}

.hero-title {
    font-size: clamp(1.5rem, 4vw, 3rem);
    font-weight: 700;
    background: var(--gradient-blue);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1.5rem;
}

.hero-description {
    color: var(--text-muted);
    font-size: clamp(1rem, 2vw, 1.125rem);
    line-height: 1.6;
    max-width: 550px;
    margin-bottom: 2.5rem;
}

/* Social Links */
.hero-socials {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.social-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    border: 2px solid #334155;
    color: var(--text-muted);
    transition: all 0.3s ease;
    text-decoration: none;
}

.social-link:hover {
    color: var(--accent-cyan);
    border-color: var(--accent-cyan);
    box-shadow: 0 0 15px rgba(34, 211, 238, 0.4);
    transform: translateY(-3px);
}

/* Image Section Styling */
.hero-image-wrapper {
    position: relative;
    width: 520px;
    height: 520px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.image-frame {
    position: relative;
    z-index: 10;
    width: 480px;
    height: 480px;
    border-radius: 50%;
    border: 2px solid rgba(59, 130, 246, 0.4);
    overflow: hidden;
    background: rgba(5, 0, 20, 0.6);
    box-shadow: 0 0 50px rgba(0, 168, 255, 0.3);
}

.image-frame img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: grayscale(100%);
    transition: all 0.7s ease;
}

.image-frame:hover img {
    filter: grayscale(0%);
    transform: scale(1.05);
}

/* Animated Orbits */
.image-orbit {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
}

.orbit-1 {
    width: 100%;
    height: 100%;
    border: 2px dashed rgba(59, 130, 246, 0.4);
    animation: rotateClockwise 30s linear infinite;
}

.orbit-2 {
    width: 115%;
    height: 115%;
    border: 1px solid rgba(34, 211, 238, 0.2);
    animation: rotateCounterClockwise 20s linear infinite;
}

.image-glow {
    position: absolute;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, rgba(59, 130, 246, 0.2) 0%, transparent 70%);
    filter: blur(40px);
    z-index: 1;
}

/* Animations */
@keyframes rotateClockwise {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes rotateCounterClockwise {
    from { transform: rotate(360deg); }
    to { transform: rotate(0deg); }
}

/* RESPONSIVENESS */

/* Tablet (iPad/Small Laptops) */
@media (max-width: 1024px) {
    .hero-container {
        gap: 2rem;
    }
    .hero-image-wrapper {
        width: 320px;
        height: 320px;
    }
    .image-frame {
        width: 240px;
        height: 240px;
    }
}

/* Mobile & Small Tablet */
@media (max-width: 768px) {
    .hero-container {
        flex-direction: column-reverse; /* Image on top */
        text-align: center;
    }

    .hero-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 60%;
    }

    .hero-description {
        margin-left: auto;
        margin-right: auto;
    }

    .hero-socials {
        justify-content: center;
    }

    .hero-image-wrapper {
        width: 280px;
        height: 280px;
        margin-bottom: 2rem;
    }

    .image-frame {
        width: 200px;
        height: 200px;
    }
}
</style>