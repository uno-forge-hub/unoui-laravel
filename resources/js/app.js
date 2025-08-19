import offcanvasPlugin from "@flexilla/alpine-offcanvas";
import Collapse from "@flexilla/alpine-collapse"
import Modal from "@flexilla/alpine-modal";
import Dropdown from "@flexilla/alpine-dropdown";


Alpine.plugin(offcanvasPlugin);
Alpine.plugin(Collapse);
Alpine.plugin(Modal)
Alpine.plugin(Dropdown)

document.addEventListener('alpine:init', () => {
    Alpine.store('theme', {
        isDark: false,
        
        init() {
            // Get theme preference with priority:
            // 1. Session (server-side)
            // 2. localStorage
            // 3. System preference
            const sessionTheme = document.documentElement.dataset.theme;
            const localTheme = localStorage.getItem('theme');
            const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            // Set isDark based on priority
            if (sessionTheme) {
                this.isDark = sessionTheme === 'dark';
            } else if (localTheme) {
                this.isDark = localTheme === 'dark';
            } else {
                this.isDark = systemPrefersDark;
            }
            
            // Apply theme immediately
            this.updateTheme(false); // Don't update server on init
            
            // Listen for system preference changes
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
                if (!localStorage.getItem('theme')) {
                    this.isDark = e.matches;
                    this.updateTheme();
                }
            });

            // Listen for Livewire page navigations
            document.addEventListener('livewire:navigated', () => {
                document.documentElement.classList.toggle('dark', this.isDark);
            });
        },
        
        toggle() {
            this.isDark = !this.isDark;
            this.updateTheme();
        },
        
        setToDark() {
            this.isDark = true;
            this.updateTheme();
        },
        
        setToLight() {
            this.isDark = false;
            this.updateTheme();
        },
        
        updateTheme(updateServer = true) {
            document.documentElement.classList.toggle('dark', this.isDark);
            localStorage.setItem('theme', this.isDark ? 'dark' : 'light');
            
            // Sync with server-side session
            if (updateServer) {
                fetch('/update-theme', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                    },
                    body: JSON.stringify({ theme: this.isDark ? 'dark' : 'light' })
                });
            }
            
            // Dispatch custom event when theme changes
            window.dispatchEvent(new CustomEvent('theme-changed'));
        }
    });
});

// Add a global theme initialization for Livewire page transitions
document.addEventListener('livewire:navigated', () => {
    // Ensure theme is applied after navigation
    const theme = localStorage.getItem('theme') || 
                 (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
    document.documentElement.classList.toggle('dark', theme === 'dark');
});

// Theme toggle function
window.toggleTheme = function() {
    const currentTheme = localStorage.getItem('theme') || 
                        (document.documentElement.classList.contains('dark') ? 'dark' : 'light');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    
    // Update localStorage
    localStorage.setItem('theme', newTheme);
    
    // Update document class
    document.documentElement.classList.toggle('dark', newTheme === 'dark');
    
    // Dispatch theme change event
    window.dispatchEvent(new CustomEvent('theme-changed', { 
        detail: { theme: newTheme } 
    }));
};

