import './bootstrap';
import * as Turbo from '@hotwired/turbo';

document.addEventListener("turbo:load", function() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('sudah-muncul')

                const numberElements = entry.target.querySelectorAll('.stat-number');
                if (numberElements.length > 0) {
                    numberElements.forEach(el => {
                        if (el.dataset.animated) return;
                        el.dataset.animated = 'true';

                        const target = parseInt(el.dataset.target, 10);
                        const finalDisplay = el.dataset.finalDisplay;
                        animateCounter(el, target, finalDisplay);
                    });
                }
                
                observer.unobserve(entry.target);
            }
        });
    }, { 
        threshold: 0.1
    });

    const elementsToAnimate = document.querySelectorAll('.animasi-scroll');
    elementsToAnimate.forEach(el => {
        observer.observe(el);
    });
});

function animateCounter(element, target, finalDisplay) {
    const duration = 2000;
    let startTime = null;
    function animation(currentTime) {
        if (startTime === null) startTime = currentTime;
        const elapsedTime = currentTime - startTime;
        const progress = Math.min(elapsedTime / duration, 1);
        element.innerHTML = Math.floor(progress * target);
        if (progress < 1) {
            requestAnimationFrame(animation);
        } else {
            element.innerHTML = finalDisplay;
        }
    }
    requestAnimationFrame(animation);
}

document.addEventListener("turbo:load", function() {
    initializePageScripts();
})