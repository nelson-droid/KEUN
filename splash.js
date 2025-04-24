// Create splash screen elements
const splashScreen = document.createElement('div');
splashScreen.className = 'splash-screen hidden';
splashScreen.innerHTML = `
    <div class="splash-logo">KEUN</div>
    <div class="futuristic-spinner"></div>
    <div class="splash-progress"></div>
    <div class="splash-message">Loading Environment Solutions...</div>
`;

// Add splash screen to body
document.body.appendChild(splashScreen);

// Function to show splash screen
function showSplash() {
    splashScreen.classList.remove('hidden');
    // Reset progress bar animation
    const progress = splashScreen.querySelector('.splash-progress');
    progress.style.animation = 'none';
    progress.offsetHeight; // Trigger reflow
    progress.style.animation = 'progress 2s ease-in-out forwards';
}

// Function to hide splash screen
function hideSplash() {
    splashScreen.classList.add('hidden');
}

// Handle navigation clicks
document.querySelectorAll('a').forEach(link => {
    if (link.href && !link.href.includes('#')) { // Exclude anchor links
        link.addEventListener('click', function(e) {
            // Don't prevent default for external links
            if (this.target === '_blank' || this.href.includes('wordpress.com')) {
                return;
            }
            
            e.preventDefault();
            const targetUrl = this.href;
            
            showSplash();
            
            // Simulate loading time
            setTimeout(() => {
                window.location.href = targetUrl;
            }, 1500);
        });
    }
});

// Show splash screen on initial page load
document.addEventListener('DOMContentLoaded', function() {
    showSplash();
    setTimeout(hideSplash, 2000);
});

// Handle browser back/forward buttons
window.addEventListener('popstate', function() {
    showSplash();
    setTimeout(hideSplash, 1500);
}); 